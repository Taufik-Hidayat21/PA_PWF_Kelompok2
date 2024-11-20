<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/2024_11_11_062148_update_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Hapus kolom role lama jika ada
        if (Schema::hasColumn('users', 'role')) {
            $table->dropColumn('role');
        }

        // Tambah kolom-kolom baru
        if (!Schema::hasColumn('users', 'phone')) {
            $table->string('phone')->nullable();
        }
        if (!Schema::hasColumn('users', 'nim')) {
            $table->string('nim')->unique()->nullable();
        }
        if (!Schema::hasColumn('users', 'jurusan')) {
            $table->string('jurusan')->nullable();
        }
        if (!Schema::hasColumn('users', 'fakultas')) {
            $table->string('fakultas')->nullable();
        }
        if (!Schema::hasColumn('users', 'foto')) {
            $table->string('foto')->nullable();
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'phone',
            'nim',
            'jurusan',
            'fakultas',
            'foto'
        ]);
        
        // Kembalikan kolom role lama jika diperlukan
        $table->string('role')->nullable();
    });
}
};
