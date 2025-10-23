<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateborrowsTable extends Migration {
    public function up(): void {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->dateTime('borrowed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('due_date')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('borrows');
    }
}
