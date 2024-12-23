<?php
  
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
  
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         $table->enum('role',['admin','agent','user'])->default('user');
    //     });
    // }
  
    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         //
    //     });
    // }

//     public function up()
// {
//     Schema::table('users', function (Blueprint $table) {
//         $table->string('role')->default('user'); // Default role set to 'user'
//     });
// }

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->enum('role',['admin','engineer','operator'])->default('operator'); // Default role set to 'user'
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}

};
