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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id('printer_id');
            $table->timestamps();
            $table->dateTime('entrydate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('BOL')->nullable();
            $table->string('serial');
            $table->string('slp');
            $table->string('sku');
            $table->string('condition');
            $table->string('location')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->dateTime('reserved_at')->nullable();
            $table->dateTime('sold_at')->nullable();
            $table->foreignId('grade_id')->nullable()->constrained('grade')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
