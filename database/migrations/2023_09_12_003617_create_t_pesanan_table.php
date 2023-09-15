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
        Schema::create('t_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan', 20);
            $table->timestamp('tanggal');
            $table->string('nm_supllier', 50);
            $table->string('nm_produk', 50);
            $table->float('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pesanan');
    }
};
