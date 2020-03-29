<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('workdate')->nullable();
            $table->time('workin')->nullable();
            $table->time('workout')->nullable();
            $table->string('status_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workios');
    }
}
