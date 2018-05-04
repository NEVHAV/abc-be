<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subcategories')->delete();
        $idCate = DB::select('select id_cate from categories');
       	$idSub = 0;
        $length = 10;
    	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$data=[];
    	for($i = 0; $i <5; $i ++) {
    		$idSub++;
    		$data[]=[
    			'id_sub' => $idSub,
    			'id_cate' =>rand($idCate[0]->id_cate, $idCate[4]->id_cate),
    			'name' => substr(str_shuffle(str_repeat($pool, $length)), 0, $length),
    			'created_at' => Carbon::now()->toDateString(),  
    			'updated_at' => Carbon::now()->toDateString(),
    			];
    	}
    	DB::table('subcategories')->insert($data);
    }
}
