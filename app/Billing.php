<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    public static $rules = [
                                
        'fullname' => 'required',                   
        'telephone' => 'required',                   
        'state' => 'required',                   
        'city' => 'required',                   
        'address' => 'required',                   
    ];

    protected $table = 'billing';
	protected $fillable = ['user_id', 'full_name', 'telephone', 'state', 'city', 'address'];
}
