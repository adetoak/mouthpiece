<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Mail;
use Validator;
use DB;
use App\Services;
use App\Products;
use App\Cart;
use App\Feedback;
use App\Billing;
use App\ServiceOrders;
use App\ProductOrders;
use App\Invoice;

class TransactionsController extends Controller
{
    public function myorders(){

        $user = Auth::user();

        $orders = DB::table('orders as o')
                    ->join('products as p', 'p.product_id', '=', 'o.ref_id')
                    ->join('users as u', 'p.user_id', '=', 'u.id')
                    ->select('*','o.id as oid', 'p.product_id as pid', 'u.id as uid', 'p.price as pprice')
                    ->where('o.user_id', $user->id)
                    ->paginate(10);
    	return view('myorders', compact('orders'));

    } 
    public function productOrders(){

        $user = Auth::user();

        $orders = DB::table('product_orders as o')
                    ->join('products as p', 'p.product_id', '=', 'o.product_id')
                    ->join('users as u', 'p.user_id', '=', 'u.id')
                    ->select('*','o.id as oid', 'p.product_id as pid', 'u.id as uid', 'p.price as pprice')
                    ->where('o.user_id', $user->id)
                    ->paginate(10);
        return view('products/product-orders', compact('orders'));

    } 
    public function serviceOrders(){

        $user = Auth::user();

        $orders = DB::table('service_orders as o')
                    ->join('services as s', 's.service_id', '=', 'o.service_id')
                    ->join('users as u', 's.user_id', '=', 'u.id')
                    ->select('*','o.id as oid', 's.service_id as sid', 'u.id as uid', 's.price as sprice')
                    ->where('o.user_id', $user->id)
                    ->paginate(10);
        return view('services/service-orders', compact('orders'));

    } 

    public function deleteOrder($orderid, $product_id){
        $user = Auth::user();
        $order = Order::where('order_id', $orderid)
                    ->where('ref_id', $product_id)                    
                    ->delete();
        if ($order) {
            return redirect('myorders')->with('success_msg', 'Order deleted successfully');
        }else{
            return redirect('myorders')->with('error_msg', 'Order could not be deleted');
        }

    }
    public function billing(){
        $user = Auth::user();

        $billing = Billing::where('user_id', $user->id)->get();
        return view('billing', compact('user', 'billing'));

    }
    public function postbilling(Request $request){
        
        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Billing::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{          


            $billing = new Billing();       
            $billing->user_id = $user->id;   
            $billing->full_name = $request->Input('fullname');                       
            $billing->telephone = $request->Input('telephone');        
            $billing->state = $request->Input('state');   
            $billing->city = $request->Input('city');        
            $billing->address = $request->Input('address');     
            
            if ($billing->save()){
                                
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('billing');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('billing');   
            }

        }

    } 
    /*public function checkout(){
        $user = Auth::user();       
        $billing = Billing::where('user_id', $user->id)->get(); 
        return view('checkout', compact('user', 'billing'));

    }*/
    public function checkout($billingid){
        $user = Auth::user();
     
        $bill = Billing::where('id', $billingid)->first();
        $txn_ref = strtotime(date('Y-m-d H:i:s'));
        return view('checkout', compact('user', 'bill', 'txn_ref'));

    }    

    public function serviceInvoice($serviceid){

        $user = Auth::user();
        if (!empty($serviceid)) {            

            $invoicedetails = Invoice::where('reference', 'services')
                                       ->where('ref_id', $serviceid)
                                       ->where('remark', 'unpaid')
                                       ->first();

            if (!empty($invoicedetails)) {

                return view('invoice', compact('invoicedetails'));

            }else{                
                $service = DB::table('services as s')
                                ->where('s.id', $serviceid)
                                ->select('s.service_id as sid', 's.price as sprice')
                                ->first();      

                $orderid = strtotime(date('Y-m-d H:i:s'));                

                $order = new ServiceOrders();       
                $order->user_id = $user->id;   
                $order->order_id = $orderid;                                               
                $order->service_id = $service->sid;
                $order->price = $service->sprice; 
                $order->vat = 0;
                $order->delivery_price = 0;
                $order->total = $service->sprice;
                $order->remark = 'unpaid';               
                $order->rating = 0; 
                $order->comment = ''; 

                if ($order->save()) {                   
                    return redirect('invoice/service/'.$orderid);         
                }
            }

        }else{
            return redirect('/');
        }

    }

    public function invoice($reference="", $invoiceid=""){
        $user = Auth::user();

        if (($invoiceid != "") && ($reference != "")) {           

            if ($reference == 'product') {   
                $invoice = DB::table('product_orders as i')
                                ->join('users as u', 'u.id', '=', 'i.user_id')
                                ->join('products as p', 'p.product_id', '=', 'i.product_id')
                                ->where('i.order_id', $invoiceid)    
                                ->select('*', 'u.id as uid', 'i.id as iid', 'i.remark as remark', 'i.created_at as icreatedat')
                                ->first();                          
                $orders = DB::table('product_orders as o')
                    ->join('products as p', 'p.product_id', '=', 'o.product_id')
                    ->join('users as u', 'p.user_id', '=', 'u.id')                                  
                    ->select('*','o.id as oid', 'u.username as susername', 'p.product_id as pid', 'p.title as ptitle', 'u.id as uid', 'p.price as pprice', 'p.image_path as image_path', 'o.quantity as quantity')
                    ->where('o.order_id', $invoiceid)
                    ->get();
                $reference = 'products';
                $sumorders = DB::table('product_orders')->where('order_id', $invoiceid)->sum('total');                
                return view('invoice', compact('user', 'invoice', 'orders', 'sumorders', 'reference'));

             }else{
                $invoice = DB::table('service_orders as i')
                                ->join('users as u', 'u.id', '=', 'i.user_id')
                                ->join('services as s', 's.service_id', '=', 'i.service_id')
                                ->where('i.order_id', $invoiceid)    
                                ->select('*', 'u.id as uid', 'i.id as iid', 'i.created_at as icreatedat')              
                                ->first(); 

                $orders = DB::table('service_orders as o')
                    ->join('services as s', 's.service_id', '=', 'o.service_id')
                    ->join('users as u', 's.user_id', '=', 'u.id')                   
                    ->select('*','o.id as oid', 's.service_id as sid', 'u.id as uid', 's.price as sprice', 's.image_path as image_path')
                    ->where('o.order_id', $invoice->order_id)
                    ->get();
                $reference = "services";
                $sumorders = DB::table('service_orders')->where('order_id', $invoiceid)->sum('total');
                return view('invoice', compact('user', 'invoice', 'orders', 'reference', 'sumorders'));
             } 

            
        }else{

            return redirect('/');

        }


    }

    public function productInvoice(Request $request){ 
        $user = Auth::user();
        $orderid = $request->Input('orderid');
        $reference = 'product';
        $pid = $request->Input('productid');
        $qty = $request->Input('qty');
        $amount = $request->Input('amount');
        $total = $request->Input('total');        

        $order = new ProductOrders();       
        $order->user_id = $user->id;   
        $order->order_id = $orderid;                                     
        $order->product_id = $pid;
        $order->price = $amount;                     
        $order->quantity = $qty;
        $order->vat = 0;
        $order->delivery_price = 0;                                   
        $order->total = $amount; 
        $order->remark = 'unpaid';     
        $order->rating = 0; 
        $order->comment = ''; 
        
        if ($order->save()) {
            return "true";
        }else{
            return "false";
        }
    }
    public function feedback(Request $request){
        
        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Feedback::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{          

            $order_id = $request->Input('orderid');                       

            $feedback = Order::find($order_id);                 
            $feedback->rating = $request->Input('rating');        
            $feedback->comment = $request->Input('comment');   
            
            if ($feedback->save()){                                
                $request->session()->flash('success_msg', 'Success.');          
                return redirect('myorders');          
            }else{
                $request->session()->flash('error_msg', 'Error: Try Again');           
                return redirect('myorders');   
            }

        }

    }
    public function redirectToGateway()
    {
        $user = Auth::user();
        if (!empty($user)) {        
            return Paystack::getAuthorizationUrl()->redirectNow();
        }else{
            return back()->with('payment_error', "You have to login first");
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $user = Auth::user();
        $result = Paystack::getPaymentData();     

        //dd($result);
        
        if($result['status'] == true)
        {
            //Transaction reference was valid from Paystack
            $data = $result['data'];
            
            //Update Database
            if ($data['metadata']['reference'] == 'services') {
                if (DB::table('service_orders')
                        ->where('order_id', $data['metadata']['ref_id'])
                        ->update(['remark' => 'Paid', 'reference' => $data['reference']])){

                    $service = Services::where('service_id', $data['metadata']['ref_id'])
                          ->join('users', 'services.user_id', '=', 'users.id')
                          ->first();
                    $data['email'] = $service->email;
                    Mail::send('emails.orders', $data, function($message) use ($data){
                        $message->to($data['email']);
                        $message->subject('Serivce Ordered');
                    });                   
                    return back()->with('payment_success', "Payment made successfully");

                }else {
                    return back()->with('payment_error', "Try again: Could not make payment");
                }
            }
            if ($data['metadata']['reference'] == 'products') {
                if (DB::table('product_orders')
                    ->where('order_id', $data['metadata']['ref_id'])
                    ->update(['remark' => 'Paid', 'reference' => $data['reference']])){
                    $product = Products::where('product_id', $data['metadata']['ref_id'])
                          ->join('users', 'products.user_id', '=', 'users.id')
                          ->first();

                    $data['email'] = $product->email;

                    Mail::send('emails.orders', $data, function($message) use ($data){
                        $message->to($data['email']);
                        $message->subject('Product Ordered');
                    });                   
                    return back()->with('payment_success', "Payment made successfully");
                }else {
                    return back()->with('payment_error', "Try again: Could not make payment");
                }
            }

        } else {

            return back()->with('payment_error', "Payment Failed: Try again");

        }
    }
}
