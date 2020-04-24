<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('your_name', 100);
            $table->string('email', 255);
            $table->tinyInteger('age');
            $table->boolean('gender');
            $table->string('contact', 200);
            //氏名、メールアドレス、年齢、性別、お問い合わせ内容
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
        Schema::dropIfExists('contact_forms');
    }
}
