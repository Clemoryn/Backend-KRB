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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['PENDING', 'PROCESS', 'COMPLETE']);
            $table->enum('priority', ['LOW', 'MEDIUM', 'HIGH', 'CRITICAL']);
            $table->foreignId('company_id')->constrained('company','company_id')->cascadeOnDelete();
            $table->foreignId('departement_id')->constrained('departement','departement_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('user','user_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
