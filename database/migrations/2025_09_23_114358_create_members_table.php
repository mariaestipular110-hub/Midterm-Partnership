<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration {
    public function up(): void {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_number')->unique();
            $table->string('lname');
            $table->string('fname');
            $table->string('mi', 3)->nullable();
            $table->string('email')->nullable();
            $table->string('contactNumber')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('members');
    }
}
