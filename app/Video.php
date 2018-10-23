<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public static $rules = [
                        
        'title' => 'required',
        'jvideo' => 'required|max:10240',                   
    ];
    public static $search_rules = [
                        
        'search' => 'required',          
    ];
    protected $table = 'service-video';
	protected $fillable = ['user_id', 'service_id', 'title', 'video_path', 'verification'];
}
