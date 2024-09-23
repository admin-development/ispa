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
        Schema::create('group', function (Blueprint $table) {
            $table->id();
            $table->string('nama_group', length: 20);
            $table->timestamps();
        });
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama', length: 50);
            $table->string('username', length: 20);
            $table->string('password', length: 80);
            $table->string('no_hp', length: 15);
            $table->foreignId('id_group')->constrained(
                table: 'group', indexName: 'users_id_group'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit', length: 5);
            $table->string('nama_penyakit', length: 50);
            $table->text('solusi');
            $table->timestamps();
        });
        Schema::create('gejala', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala', length: 5);
            $table->text('nama_gejala');
            $table->timestamps();
        });
        Schema::create('basis_pengetahuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_penyakit")->constrained(
                table: 'penyakit', indexName: 'basis_pengetahuan_id_penyakit'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId("id_gejala")->constrained(
                table: 'gejala', indexName: 'basis_pengetahuan_id_gejala'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->double('mb');
            $table->double('md');
            $table->timestamps();
        });
        Schema::create('hasil_diagnosa', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId("id_nilai_cf")->constrained(
                table: 'basis_pengetahuan', indexName: 'hasil_diagnosa_id_nilai_cf'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->double('hasil_nilai');
            $table->foreignId('id_user')->constrained(
                table: 'user', indexName: 'hasil_diagnosa_id_user'
            )->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', length: 100);
            $table->string('image', length: 100);
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edukasi');
        Schema::dropIfExists('hasil_diagnosa');
        Schema::dropIfExists('basis_pengetahuan');
        Schema::dropIfExists('gejala');
        Schema::dropIfExists('penyakit');
        Schema::dropIfExists('user');
        Schema::dropIfExists('group');
    }
};
