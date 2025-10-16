<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // ubah enum role, tambahkan owner
        DB::statement("ALTER TABLE users MODIFY role ENUM('root','admin','owner','user') DEFAULT 'user'");
    }

    public function down(): void
    {
        // kembalikan enum role tanpa owner
        DB::statement("ALTER TABLE users MODIFY role ENUM('root','admin','user') DEFAULT 'user'");
    }
};
