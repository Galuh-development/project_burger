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
        Schema::table('produk', function (Blueprint $table) {
            Schema::table('produk', function (Blueprint $table) {
        // Tambahkan kolom uuid setelah id
        $table->uuid('uuid')->after('id')->unique()->nullable();
    });

    // Isi data UUID untuk produk yang sudah terlanjur Anda input manual
    DB::table('produk')->whereNull('uuid')->cursor()->each(function ($item) {
        DB::table('produk')->where('id', $item->id)->update(['uuid' => (string) str()->uuid()]);
    });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //
        });
    }
};
