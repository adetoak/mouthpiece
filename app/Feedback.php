<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public static $rules = [
		
        'rating' 	=> 'required',                   
		'comment'	=> 'min:3|max:100',
    ];

    protected $table = 'feedback';
	protected $fillable = ['user_id', 'order_id', 'rating', 'comment'];
}
