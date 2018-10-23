<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
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
    protected $table = 'products';
	protected $fillable = ['user_id', 'product_id', 'title', 'description', 'category', 'duration', 'price', 'available', 'image_path', 'verification'];
}
