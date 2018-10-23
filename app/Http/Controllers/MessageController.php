<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Auth;
use Validator;
use DB;
use App\Services;
use App\Job;
use App\Products;
use App\Messages;
use App\Thread;

class MessageController extends Controller
{
    public function index($msgid=""){
        $user = Auth::user();
        //$msgid = $msgid;
        $msgtos = DB::table('thread_table')                            
                            ->where('msg_to', $user->id)                                
                            ->join('users', 'users.id', '=', 'thread_table.msg_from')                             
                            ->get(); 
        $msgfroms = DB::table('thread_table')                            
                            ->where('msg_from', $user->id)                                
                            ->join('users', 'users.id', '=', 'thread_table.msg_to')                             
                            ->get();                
        if ($msgid == "") {
            /*$conversations = DB::table('conversations as c')
                                ->join('users as u', 'c.msg_from', '=', 'u.id')                                
                               // ->select('c.id','au.username as from','cu.username as to_user_name')    
                                ->get(); */      
            return view('messages', compact('user', 'msgtos', 'msgfroms', 'conversations', 'msgid'));            
        }else{
           // $msgid = $msgid;
            $conversations = DB::table('conversations')                            
                                ->where('message_id', $msgid)                                
                                ->join('users', 'users.id', '=', 'conversations.msg_from')                             
                                ->paginate(15);                            
            return view('messages', compact('user', 'conversations', 'msgtos', 'msgfroms', 'user', 'msgid'));            
        }
    }
    public function messages($ref, $id){  

        $user = Auth::user();
        /*$conversations = DB::table('conversations')
                            //->select("id", DB::raw("COUNT(*) as count"))
                            ->join('users', 'users.id', '=', 'conversations.recipent_id')
                            ->join('services', 'services.id', '=', 'conversations.id')
                            ->join('products', 'products.id', '=', 'conversations.id')
                            ->distinct('subject')
                            ->where('sender_id', $user->id)
                            ->orWhere('recipent_id', $user->id)
                            //->count('message_id');
                            //->groupBy('message_id')
                            ->get();*/
        $conversations = DB::table('conversations')                            
                            ->where('sender_id', $user->id)
                            ->orWhere('recipent_id', $user->id)
                            ->groupBy('recipent_id')
                            ->join('users', 'users.id', '=', 'conversations.recipent_id')
                            /*->join('users', function ($join){
                                $join->on('users.id', '=', 'conversations.sender_id')
                                     ->orOn('users.id', '=', 'conversations.recipent_id');
                            }) */              
                            ->get();                            
                                    
        if ($ref == "services"){
            
            $reference = Services::where('id', $id)->first();
    	    return view('messages', compact('ref', 'id', 'reference', 'conversations', 'count'));

        }
        if ($ref == "products"){
            
            $reference = Products::where('id', $id)->first();
            return view('messages', compact('ref', 'id', 'reference', 'conversations', 'count'));
            
        }


    }
    public function messagepost(Request $request){        

        $user = Auth::user();
        $data = $request->all();

        $validator = Validator::make($data, Messages::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $pic = $request->file('messageimg');   
            if (!empty($pic)) {
                $filename = $pic->getClientOriginalName();                       
             }                 
            
            $rand =rand(1,100);            
            $recipentid = $request->Input('recipent');
            $messageid = $rand.$request->Input('messageid'); 

            if ($recipentid == $user->id) {
                $request->session()->flash('error_msg', 'Error: You cannot send message to yourself');           
                    return redirect()->back(); 
            }else{

                $msgdetails = DB::table('thread_table')                            
                                    ->where('msg_from', $user->id)
                                    ->Where('msg_to', $recipentid) 
                                    ->join('users', 'thread_table.msg_to', '=', 'users.id')                         
                                    ->first();    
                if ((count($msgdetails) != 0) ){
                    $messageid = $msgdetails->message_id;
                    $data = [];                   
                    $data['username'] = $user->username;
                    $data['email'] = $msgdetails->email;
                    $data['recipentusername'] = $msgdetails->username;
                    $data['subject'] = "You have a new message"; 
                    $data['bodymessage'] = $request->Input('message');

                    $messages = new Messages();       
                    $messages->msg_from = $user->id;
                    $messages->message_id = $messageid;
                    $messages->body = $request->Input('message');
                    $messages->image_path = empty($filename)? '' : $filename;
                    if (!empty($pic)) {
                        $pic->move('public/img/messages/message-'.$messageid.'/', $filename);
                    }
                    if ($messages->save()){  
                        /*Mail::send('emails.newmessage', $data, function($message) use ($data){
                            $message->to($data['email']);
                            $message->subject($data['subject']);
                        }); */                              
                        $request->session()->flash('success_msg', 'Message Sent successfuly.');          
                        return redirect()->back();          
                    }else{
                        $request->session()->flash('error_msg', 'Error: Try Again');           
                        return redirect()->back();   
                    }
                }elseif (empty($recipentid)){
                    $messageid = $request->Input('messageid');

                    $threaddetails = DB::table('thread_table')                            
                                    ->where('message_id', $messageid)                                               
                                    ->first();
                    if ($threaddetails->msg_to == $user->id) {
                        $maildetails = DB::table('users')                            
                                        ->where('id', $threaddetails->msg_from)                                    
                                        ->first();
                    }
                    if ($threaddetails->msg_from == $user->id) {
                        $maildetails = DB::table('users')                            
                                        ->where('id', $threaddetails->msg_to)                                    
                                        ->first();
                    }

                    $data = [];                   
                    $data['username'] = $user->username;
                    $data['email'] = $maildetails->email;
                    $data['recipentusername'] = $maildetails->username;
                    $data['subject'] = "You have a new message"; 
                    $data['bodymessage'] = $request->Input('message');

                    $messages = new Messages();       
                    $messages->msg_from = $user->id;
                    $messages->message_id = $messageid;
                    $messages->body = $request->Input('message');
                    $messages->image_path = empty($filename)? '' : $filename;
                    if (!empty($pic)) {
                        $pic->move('public/img/messages/message-'.$messageid.'/', $filename);
                    }
                    if ($messages->save()){ 
                        Mail::send('emails.newmessage', $data, function($message) use ($data){
                            $message->to($data['email']);
                            $message->subject($data['subject']);
                        });                                
                        $request->session()->flash('success_msg', 'Message Sent successfuly.');          
                        return redirect()->back();          
                    }else{
                        $request->session()->flash('error_msg', 'Error: Try Again');           
                        return redirect()->back();   
                    }
                }else{
                    $messageid = $rand.$request->Input('messageid');
                    $thread = new Thread();       
                    $thread->msg_from = $user->id;
                    $thread->msg_to = $recipentid;
                    $thread->message_id = $messageid;
                    $thread->reference = $request->Input('ref');                              
                    $thread->ref_id = $request->Input('id');                                       
                    
                    $messages = new Messages();       
                    $messages->msg_from = $user->id;
                    $messages->message_id = $messageid;
                    $messages->body = $request->Input('message');
                    $messages->image_path = empty($filename)? '' : $filename;
                    if (!empty($pic)) {
                        $pic->move('public/img/messages/message-'.$messageid.'/', $filename);
                    }
                    if (($messages->save()) && ($thread->save())){                                
                        $request->session()->flash('success_msg', 'Message Sent successfuly.');          
                        return redirect()->back();          
                    }else{
                        $request->session()->flash('error_msg', 'Error: Try Again');           
                        return redirect()->back();   
                    }
                }                        
            }



        }

    } 
}
