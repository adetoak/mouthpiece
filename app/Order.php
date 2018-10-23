<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $rules = [
                         
        'title' => 'required',
        'category' => 'required',      
        'description' => 'required',      
        'duration' => 'required',      
        'price' => 'required',      
        'available' => 'required',      
    ];
    public static $search_rules = [
                        
        'search' => 'required',          
    ];
    protected $table = 'orders';
	protected $fillable = ['user_id', 'order_id', 'reference', 'ref_id', 'price', 'quantity', 'vat', 'deliver_price', 'total', 'remark', 'rating', 'comment'];
}
