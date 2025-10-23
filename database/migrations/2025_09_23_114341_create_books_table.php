<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration {
    public function up(): void {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 50)->nullable();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('published_year')->nullable();
            $table->integer('copies')->default(1); // total copies
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('books');
    }
}
