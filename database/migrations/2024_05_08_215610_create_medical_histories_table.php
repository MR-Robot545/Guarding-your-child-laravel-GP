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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->text("specialNeeds")->nullable();
            $table->text("chronicConditions")->nullable();
            $table->string("bloodType",5)->nullable();
            $table->text("previousSurgeries")->nullable();
            $table->text("allergies")->nullable();
            $table->foreignId('kid_id')->constrained('kids','id')->cascadeOnDelete(); //one to one
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
