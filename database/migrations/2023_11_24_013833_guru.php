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
            Schema::create('gurus',function (Blueprint $table){
                $table->id();
                $table->string('nama_guru');
                $table->string('nip');
                $table->string('alamat');
                $table->string('jenis_kelamin');
                $table->string('email');
                $table->string('password');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
