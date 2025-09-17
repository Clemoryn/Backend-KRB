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
        Schema::create('ticket_comment', function (Blueprint $table) {
            $table->id('comment_id');
            $table->text('comment_text');
            $table->foreignId('ticket_id')->constrained('ticket','ticket_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('user','user_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_comment');
    }
};
