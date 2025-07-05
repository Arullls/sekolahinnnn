<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdAndKelasIdToSiswasTable extends Migration
{
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->after('user_id')->constrained('kelas')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropForeign(['kelas_id']);
            $table->dropColumn('kelas_id');
        });
    }
}
