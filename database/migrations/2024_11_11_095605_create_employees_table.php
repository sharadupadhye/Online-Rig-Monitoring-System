<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('options2')->nullable();
            $table->string('STATUS1')->nullable();
            $table->string('MODE1')->nullable();
            $table->string('SAMPLE1')->nullable();
            $table->string('CYCLES1')->nullable();
            $table->string('RPM1')->nullable();
            $table->string('GBTEMP1')->nullable();
            $table->string('MBTEMP1')->nullable();
            $table->string('OBTEMP1')->nullable();
            $table->string('PRESSURE1')->nullable();
            $table->string('REMARK1')->nullable();
            $table->string('PERSON1')->nullable();


            $table->string('STATUS2')->nullable();
            $table->string('MODE2')->nullable();
            $table->string('SAMPLE2')->nullable();
            $table->string('CYCLES2')->nullable();
            $table->string('RPM2')->nullable();
            $table->string('GBTEMP2')->nullable();
            $table->string('MBTEMP2')->nullable();
            $table->string('OBTEMP2')->nullable();
            $table->string('PRESSURE2')->nullable();
            $table->string('REMARK2')->nullable();
            $table->string('PERSON2')->nullable();

            $table->string('STATUS3')->nullable();
            $table->string('MODE3')->nullable();
            $table->string('GEAR3')->nullable();
            $table->string('SAMPLE3')->nullable();
            $table->string('HRS3')->nullable();
            $table->string('CYCLES3')->nullable();
            $table->string('RPM3')->nullable();
            $table->string('MMTORQ3')->nullable();
            $table->string('G1RPM3')->nullable();
            $table->string('G1TORQ3')->nullable();
            $table->string('G2RPM3')->nullable();
            $table->string('G2TORQ3')->nullable();
            $table->string('MMTEMP3')->nullable();
            $table->string('G1TEMP3')->nullable();
            $table->string('G2TEMP3')->nullable();
            $table->string('OILTEMP3')->nullable();
            $table->string('PRESSURE3')->nullable();
            $table->string('REMARK3')->nullable();
            $table->string('PERSON3')->nullable();

            $table->date('date')->nullable();

            // Ensure created_at and updated_at are TIMESTAMP
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
