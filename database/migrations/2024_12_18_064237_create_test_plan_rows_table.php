<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestPlanRowsTable extends Migration
{
    public function up()
    {
        Schema::create('test_plan_rows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_plan_id')->constrained()->onDelete('cascade');
            $table->string('shift_mode')->nullable();
            $table->integer('rpm')->nullable();
            $table->integer('target')->nullable();
            $table->integer('block_target')->nullable();
            $table->integer('block_1')->nullable();
            $table->integer('block_2')->nullable();
            $table->integer('block_3')->nullable();
            $table->integer('block_4')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('test_plan_rows');
    }
}

