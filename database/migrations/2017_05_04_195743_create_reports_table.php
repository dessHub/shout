<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          Schema::create('reports', function (Blueprint $table) {
              $table->increments('id');
              $table->string('fname');
              $table->string('lname');
              $table->string('guardian_fname');
              $table->string('guardian_lname');
              $table->string('guardian_phone');
              $table->string('user_id');
              $table->string('admNo');
              $table->string('school');
              $table->string('complaint');
              $table->string('status');
              $table->timestamps('created_at');
          });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
