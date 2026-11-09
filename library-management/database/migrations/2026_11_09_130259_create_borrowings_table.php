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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id('borrowing_id');
            $table->foreignId('member_id')->constrained('members', 'member_id')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books', 'book_id')->onDelete('cascade');
            $table->timestamp('borrow_date')->useCurrent();
            $table->timestamp('due_date');
            $table->timestamp('return_date')->nullable();
            $table->string('status')->default('borrowed');
            $table->decimal('fine_amount', 8, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
