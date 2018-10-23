<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public static $auth_rules = [
                        
        'email' => 'required|exists:users,email',
        'password' => 'required',      
    ];
    public static $password_rules = [
                        
        'newpassword' => 'required|min:8',
        'confirmnewpassword' => 'required|same:newpassword',      
    ];

    public static $update_rules = [
                        
        'fullname' => 'min:3',
        'country' => 'min:3',      
        'state' => 'min:3',      
        'city' => 'min:3',      

    ];

    public static $profileimg_rules = [
                        
        'profileimg' => 'image',
        
    ];

    public static $verifydoc_rules = [
                        
        'docimg' => 'image',
        
    ];

    public static $socialmedia = [
                        
        'facebook' => 'min:5',
        'twitter' => 'min:5',
        'instagram' => 'min:5',
        'linkedin' => 'min:5',
        
    ];
    protected $fillable = [
        'full_name', 'username', 'email', 'telephone', 'country', 'state', 'city', 'password', 'active_seller', 'verify_doc', 'image_path', 'facebook', 'twitter', 'instagram', 'linkendin', 'seller_confirm', 'profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
