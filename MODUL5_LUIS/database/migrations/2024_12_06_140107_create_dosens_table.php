<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id(); // id sebagai primary key
            $table->string('kode_dosen', 3)->unique();
            $table->string('nama_dosen');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('no_telepon')->nullable(); // tidak wajib unik
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosens');
    }
}
