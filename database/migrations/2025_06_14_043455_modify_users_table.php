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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nisn')->nullable()->unique()->after('email');
            $table->enum('role', ['admin', 'guru', 'siswa', 'ortu'])->default('siswa')->after('nisn');
            $table->unsignedBigInteger('kelas_id')->nullable()->after('role');

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
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
