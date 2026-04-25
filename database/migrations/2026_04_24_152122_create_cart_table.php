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
    Schema::create('cart', function (Blueprint $table) {
        $table->id();
        // user_id sebagai foreign key (Relasi ke tabel users)
        $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
        // produk_id sebagai foreign key (Relasi ke tabel produks)
        $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
        $table->integer('qty');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
