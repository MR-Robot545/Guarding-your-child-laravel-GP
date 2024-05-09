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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string("SSN_father");
            $table->string("father_name",50);
            $table->string("SSN_mother");
            $table->string("mother_name",50);
            $table->string("address",200);
            $table->string('phone')->unique();
            $table->foreignId('kid_id')->constrained('kids','id')->cascadeOnDelete(); //one to one
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
