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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');          // quien crea
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); // agente
            $table->string('subject');
            $table->text('description');
            $table->foreignId('status_id')->constrained('status');
            $table->foreignId('priority_id')->constrained('priority');
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
            $table->timestamp('closed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
