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
        DB::table('subcategories')->delete();

        $data = [
            [
                'id_cate' => 1,
                'name_vn' => 'Thông tin chung',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 1,
                'name_vn' => 'Thông điệp Tổng giám đốc',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 1,
                'name_vn' => 'Văn bản pháp lý',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 1,
                'name_vn' => 'Cơ cấu tổ chức',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 2,
                'name_vn' => 'Tin công ty',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 2,
                'name_vn' => 'Tin khác',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 3,
                'name_vn' => 'Nhật Bản',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
            [
                'id_cate' => 3,
                'name_vn' => 'Đài Loan',
                'name_jp' => '',
                'created_at' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now()->toDateString(),
            ],
        ];

        DB::table('subcategories')->insert($data);
    }
}
