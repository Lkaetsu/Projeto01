<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_users',function (Blueprint $table){
            $table->foreignId('user_id')->onDelete('cascade');
            $table->foreignId('curso_id')->onDelete('cascade');
            $table->float('Nota')->default(0);
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
        {
            Schema::dropIfExists('curso_users');
        }
    }
};
