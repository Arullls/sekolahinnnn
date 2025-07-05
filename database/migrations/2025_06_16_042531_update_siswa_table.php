<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {

            $table->enum('jenis_kelamin', ['L', 'P'])->nullable()->after('user_id');
            $table->date('tanggal_lahir')->nullable()->after('jenis_kelamin');
            $table->string('no_hp')->nullable()->after('tanggal_lahir');
            $table->text('alamat')->nullable()->after('no_hp');
            $table->string('foto')->nullable()->after('alamat');
            $table->year('tahun_masuk')->nullable()->after('foto');

            $table->dropColumn('kelas'); // hapus kolom lama kalau udah pakai kelas_id
        });
    }

    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_kelamin',
                'tanggal_lahir',
                'no_hp',
                'alamat',
                'foto',
                'tahun_masuk',
            ]);
            $table->string('kelas')->nullable(); // kembalikan kalau rollback
        });
    }
};
