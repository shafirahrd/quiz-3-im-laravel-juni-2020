<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class articles extends Model
{
    public static function get_all(){
    	$data = DB::table('articles')->get();

    	return $data;
    }

    public static function get_by_id($id){
    	$data = DB::table('articles')->where('id',$id)->get();

    	return $data;
    }

    public static function get_with_user($id){
        $data = DB::table('articles')->join('users', 'articles.users_id', '=', 'users.id')->where('articles.id',$id)->get();

        return $data;
    }

    public static function insertinto($data){
    	$data['tag'] = json_encode(explode(',', $data['tag']));
    	$data['slug'] = strtolower(str_replace(' ', '-', $data['judul']));
    	$data['created_at'] = Carbon::now();
    	$data['updated_at'] = Carbon::now();
    	$data['users_id'] = 1;
    	unset($data['_token']);

    	$new_data = DB::table('articles')->insert($data);
    	return $new_data;
    }

    public static function updateinto($data, $id){
    	$data['slug'] = strtolower(str_replace(' ', '-', $data['judul']));
        $data['tag'] = json_encode(explode(',', $data['tag']));
    	$data = DB::table('articles')
    				->where('id',$id)
    				->update([
    					'isi' => $data['isi'],
    					'judul' => $data['judul'],
    					'slug' => $data['slug'],
    					'tag' => $data['tag']
    				]);
    	return $data;
    }

    public static function deleteinto($id){
    	$data = DB::table('articles')->where('id',$id)->delete();
    	return $data;
    }
}
