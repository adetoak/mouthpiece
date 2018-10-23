<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'telephone' => 'required',
            'username' => 'required|max:255',            
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name' => '',
            'telephone' => $data['telephone'],
            'username' => $data['username'],
            'country' => '',
            'state' => '',
            'city' => '',            
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmed' => 1,
            'active_seller' => 0,
            'verify_doc' => '',
            'seller_confirm' => 0,
            'profile_image' => '',
            'image_path' => '',
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'linkendin' => '',
        ]);
    }
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = $this->validator($input);

        if ($validator->passes()){
            $data = $this->create($input)->toArray();

            $data['token'] = str_random(25);

            $user = User::find($data['id']);
            $user->token = $data['token'];

            Mail::send('emails.activation', $data, function($message) use ($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation');
            });
            
            $user->save();

            return redirect(route('login'))->with('status', 'Confirmation email has been sent. Please check your email');
            //return redirect(route('login'))->with('status', 'Please Login to access your account');
        }
        return redirect(route('register'))->withErrors($validator);
    }
    
    public function confirmation($token)
    {
        $user = User::where('token', $token)->first();

        if (!is_null($user)){
            $user->confirmed = 1;
            $user->token = '';
            $user->save();
            return redirect(route('login'))->with('status', 'Your activation is completed.');
        }
        return redirect(route('login'))->with('status', 'Try again: Something went wrong');
    }
    
}
