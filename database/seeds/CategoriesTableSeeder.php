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

        $data = [
            [
                'name_vn' => 'GIỚI THIỆU CHUNG',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'name_vn' => 'TIN TỨC - SỰ KIỆN',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'name_vn' => 'XUẤT KHẨU LAO ĐỘNG',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'name_vn' => 'DU HỌC',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'name_vn' => 'CẨM NANG',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
