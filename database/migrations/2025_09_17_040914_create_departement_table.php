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
        Schema::create('departement', function (Blueprint $table) {
            $table->id('departement_id');
            $table->string('departement_name');
            $table->ForeignId('company_id')->constrained('company','company_id')->cascadeOnDelete();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departement');
    }
};
