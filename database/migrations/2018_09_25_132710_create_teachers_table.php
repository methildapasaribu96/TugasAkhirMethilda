<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->string('nama');
            $table->string('golongan');
            $table->string('pangkat');
            $table->string('alamat');
            $table->date('tmt');
            $table->enum('gender', ['l', 'p']);
            $table->enum('pendidikan',['s3', 's2', 's1', 'd3', 'sma']);
            $table->integer('jam_mengajar');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('masa_kerja');
            $table->timestamps();
        });

        DB::table('teachers')->insert([
          [
            'nip' => '197907202003121002',
            'nama' => 'Khurnia widhi arini S.Pd',
            'golongan' => 'IVA',
            'pangkat' => 'Pembina',
            'alamat' => 'jl.bulusan selatan 1, no.22 tembalang',
            'tmt' => date('2015-09-01'),
            'gender' => 'p',
            'pendidikan' => 's1',
            'jam_mengajar' => 24,
            'tempat_lahir' => 'semarang',
            'tanggal_lahir' => date('1996-06-01'),
            'masa_kerja' => '2 tahun 3 bulan',
          ]
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
