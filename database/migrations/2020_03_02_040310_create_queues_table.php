<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emp_id');
            $table->timestamp('check_in');
            $table->timestamp('check_out');
            $table->string('d1');
            $table->string('d2');
            $table->string('d3');
            $table->string('d4');
            $table->string('d5');
            $table->string('d6');
            $table->string('d7');
            $table->string('d8');
            $table->string('d9');
            $table->string('d10');
            $table->string('d11');
            $table->string('d12');
            $table->string('d13');
            $table->string('d14');
            $table->string('d15');
            $table->string('d16');
            $table->string('d17');
            $table->string('d18');
            $table->string('d19');
            $table->string('d20');
            $table->string('d21');
            $table->string('d22');
            $table->string('d23');
            $table->string('d24');
            $table->string('d25');
            $table->string('d26');
            $table->string('d27');
            $table->string('d28');
            $table->string('d29');
            $table->string('d30');
            $table->string('d31');
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
        Schema::dropIfExists('queues');
    }
}
