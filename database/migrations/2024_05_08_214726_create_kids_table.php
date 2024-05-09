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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('index');
            $table->string('SSN')->unique();
            $table->string("first_name",50);
            $table->string("last_name",50);
            $table->enum('gender',['male','female'])->nullable();
            $table->date('birthDate')->nullable();
            $table->foreignId('doctor_id')->nullable()->constrained('users','id')->nullOnDelete(); //one to many
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kids');
    }
};
