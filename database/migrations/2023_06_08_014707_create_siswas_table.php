<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->nullable();
            $table->integer("nis")->nullable();
            $table->integer("kelas_id")->nullable();
            $table->integer("jurusan_id")->nullable();
            $table->string("nama_siswa")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("jenis_kelamin")->nullable();
            $table->string("agama")->nullable();
            $table->string("alamat")->nullable();
            $table->string("email")->nullable();
            $table->string("no_hp")->nullable();
            $table->string("foto")->nullable();
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
        Schema::dropIfExists('siswas');
    }
}