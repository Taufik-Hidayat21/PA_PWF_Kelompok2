<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // database/migrations/2024_11_11_063021_update_role_column_in_users_table.php

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Hanya tambahkan role_id jika belum ada
        if (!Schema::hasColumn('users', 'role_id')) {
            $table->foreignId('role_id')
                  ->nullable()
                  ->constrained('roles')
                  ->onDelete('set null');
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Hapus foreign key dan kolom role_id jika ada
        if (Schema::hasColumn('users', 'role_id')) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        }
    });
}
};
