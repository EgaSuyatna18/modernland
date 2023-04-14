<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_selesais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('barang_id')->constrained();
            $table->integer('jumlah');
            $table->integer('total');
            $table->text('catatan')->nullable();
            $table->enum('metode', ['gopay', 'ovo', 'transfer']);
            $table->date('waktu_pengambilan')->default(Carbon::now()->addDay());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_selesais');
    }
};
