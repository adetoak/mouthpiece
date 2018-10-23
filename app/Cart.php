<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static $rules = [
                                
        'quantity' => 'required',                   
    ];

    protected $table = 'cart';
	protected $fillable = ['user_id', 'product_id', 'quantity'];
}
