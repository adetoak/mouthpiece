<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{

	public static $rules = [
                        
        'title' => 'required',
        'category' => 'required',      
        'description' => 'required',      
        'duration' => 'required',      
        'price' => 'required',      
        'requirement' => 'required',      
    ];
    public static $search_rules = [
                        
        'search' => 'required',          
    ];
    protected $table = 'services';
	protected $fillable = ['user_id', 'service_id', 'title', 'description', 'category', 'duration', 'price', 'requirement', 'image_path', 'verification'];
}
