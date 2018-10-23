<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public static $rules = [ 
                        
        'message' => 'required',             
    ];
    public static $search_rules = [
                        
        'search' => 'required',          
    ];
    protected $table = 'thread_table';
	protected $fillable = ['msg_from', 'msg_to', 'message_id', 'reference', 'ref_id'];
}
