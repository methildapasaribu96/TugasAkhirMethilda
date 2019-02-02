<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('grade');
            $table->timestamps();
        });

        DB::table('criterias')->insert([
          [
            'name' => 'Menguasai Karakteristik Peserta Didik',
            'grade' => 5,
          ],
          [
            'name' => 'Menguasai Teori Belajar',
            'grade' => 5,
          ],
          [
            'name' => 'Pengembangan Kurikulum',
            'grade' => 5,
          ],
          [
            'name' => 'Kegiatan Pembelajaran Yang Mendidik',
            'grade' => 5,
          ],
          [
            'name' => 'Pengembangan Potensi Peserta Didik',
            'grade' => 5,
          ],
          [
            'name' => 'Komunikasi Dengan Peserta Didik',
            'grade' => 5,
          ],
          [
            'name' => 'Evaluasi',
            'grade' => 5,
          ],
          [
            'name' => 'Bertindak Sesuai Norma Yang Berlaku',
            'grade' => 4,
          ],
          [
            'name' => 'Menunjukan Pribadi Yang Dewasa Dan Teladan',
            'grade' => 4,
          ],
          [
            'name' => 'Etos Kerja, Tanggung Jawab Tinggi, Rasa Bangga Menjadi Guru',
            'grade' => 4,
          ],
          [
            'name' => 'Bersikap Inklusif, Bertindak Obyektif, Serta Tidak Diskriminatif',
            'grade' => 3,
          ],
          [
            'name' => 'Komunikasi Dengan Sesama Guru, Tenaga Kependidikan, Orang Tua, Peserta Didik, dan Masyarakat',
            'grade' => 3,
          ],
          [
          'name' => 'Penguasaan Materi dan Konsep Terhadap Mata Kuliah Yang Diampu',
          'grade' => 4,
          ],
          [
          'name' => 'Mengembangkan Keprofesionalan Melalui Tindakan Yang Reflektif',
          'grade' => 4,
          ],
          ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criterias');
    }
}
