<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
        $table->enum('priority', ['low', 'medium', 'high']);
        $table->foreignId('user_id')->constrained();
        $table->foreignId('assigned_to')->nullable()->constrained('users');
        $table->foreignId('assigned_by')->nullable()->constrained('users');
        $table->timestamp('assigned_at')->nullable();
        $table->foreignId('software_id')->constrained();
        $table->string('operating_system');
        $table->timestamps();
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
