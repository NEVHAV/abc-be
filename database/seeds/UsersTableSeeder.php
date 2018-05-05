<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'mode' => 0,
            'created_at' => Carbon::now()->toDateString(),
            'updated_at' => Carbon::now()->toDateString(),
        ]);
    }
}
