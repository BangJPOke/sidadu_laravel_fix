
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengurus', function (Blueprint $table) {
            $table->date('tanggal_pencairan')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('pengurus', function (Blueprint $table) {
            $table->dropColumn('tanggal_pencairan');
        });
    }
};
