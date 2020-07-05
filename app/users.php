<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class users extends Model
{
    public static function get_by_id($id){
        $data = DB::table('users')->where('id',$id)->get();

        return $data;
    }
}
