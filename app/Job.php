<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	public static $rules = [
                                
        'description' => 'required',      
        'category' => 'required',      
        'duration' => 'required',      
        'price' => 'required',      
        'requirement' => 'required',      
    ];

    protected $table = 'jobs';
	protected $fillable = ['email', 'user_id', 'description', 'category', 'duration', 'price', 'requirement', 'image_path', 'verification'];
}
