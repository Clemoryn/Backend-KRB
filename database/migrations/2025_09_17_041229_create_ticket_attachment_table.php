<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_attachment', function (Blueprint $table) {
            $table->id('attachment_id');
            $table->string('file_type');
            $table->string('file_url');
            $table->ForeignId('user_id')->constrained('user', 'user_id')->cascadeOnDelete();
            $table->ForeignId('ticket_id')->constrained('ticket', 'ticket_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_attachment');
    }
};
