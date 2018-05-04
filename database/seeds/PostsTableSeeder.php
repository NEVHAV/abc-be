<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->delete();
        $idSub = DB::select('select id_sub from subcategories');
       	$idPost=0; 
        $titleLength = 10;
        $coverLength = 30;
        $contentLength = 200;
    	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$data=[];
    	for($i = 0; $i <5; $i ++) {
    		$idPost++;
    		$data[]=[
    			'id_post' => $idPost,
    			'id_sub' =>rand($idSub[0]->id_sub, $idSub[4]->id_sub),
    			'title' => substr(str_shuffle(str_repeat($pool, $titleLength)), 0, $titleLength),
    			'cover' => substr(str_shuffle(str_repeat($pool, $coverLength)), 0, $coverLength),
    			'content' => substr(str_shuffle(str_repeat($pool, $contentLength)), 0, $contentLength),
    			'created_at' => Carbon::now()->toDateString(),  
    			'updated_at' => Carbon::now()->toDateString(),
    			];
    	}
    	DB::table('posts')->insert($data);
    }
}
