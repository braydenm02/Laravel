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
        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('printer_id')->constrained('inventory')->cascadeOnDelete();
            $table->timestamps();
            $table->string('visualCondition');
            $table->string('functionalCondition');
            $table->string('packagingCondition');
            $table->string('TonerK');
            $table->string('TonerC');
            $table->string('TonerM');
            $table->string('TonerY');
            $table->text('comments')->nullable();
            $table->string('gradeID')->unique();
            $table->string('graded_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade');
    }
};
