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
        Schema::create('book_reviews', function (Blueprint $table) {
            $table->bigIncrements('id'); // PK

            // FKs con CASCADE on delete
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');

            $table->unsignedTinyInteger('rating'); // Requerido (1-5)
            $table->text('comment')->nullable();

            $table->timestamps(); // Auto (created_at y updated_at)

            // Restricción única: Un miembro solo puede dejar una reseña por libro
            $table->unique(['book_id', 'member_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_reviews');
    }
};