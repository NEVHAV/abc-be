<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone_number');
            $table->string('hotline');
            $table->string('logo_url');
            $table->string('company_name_vn');
            $table->string('company_slogan_vn');
            $table->string('company_name_jp')->nullable();
            $table->string('company_slogan_jp')->nullable();
            $table->text('footer_vn');
            $table->text('footer_jp')->nullable();
            $table->string('supporter_name');
            $table->string('supporter_phone_number');
            $table->string('supporter_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}
