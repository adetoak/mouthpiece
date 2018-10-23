<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public static $rules = [
		
    ];

    protected $table = 'invoice';
	protected $fillable = ['user_id', 'order_id', 'reference', 'ref_id', 'amount', 'vat', 'delivery_price', 'total', 'remark'];
}
