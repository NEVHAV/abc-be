<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->delete();

    	$length = 10;
    	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$data=[];
    	for($i = 0; $i <5; $i ++) {
    		$data[]=[
    			'name' => substr(str_shuffle(str_repeat($pool, $length)), 0, $length),
    			'created_at' => Carbon::now()->toDateString(),  
    			'updated_at' => Carbon::now()->toDateString(),
    			];
    	}
    	DB::table('categories')->insert($data);
    }
}
