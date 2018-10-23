<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public static $rules = [ 
                        
        'message' => 'required',             
    ];
    public static $search_rules = [
                        
        'search' => 'required',          
    ];
    protected $table = 'conversations';
	protected $fillable = ['msg_from', 'message_id', 'body', 'image_path'];
}
