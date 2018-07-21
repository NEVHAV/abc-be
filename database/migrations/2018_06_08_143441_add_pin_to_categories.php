<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPinToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function($table) {
        $table->integer('pin_vn');
        $table->integer('pin_jp');
        $table->dropColumn('pin');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
}
