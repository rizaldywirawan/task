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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('title');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->enum('status', ['To-do', 'On Progress', 'In Review', 'Done', 'Canceled'])->default('To-do');
            $table->enum('priority', ['#1', '#2', '#3', '#4'])->nullable();
            $table->integer('order')->nullable();
            $table->foreignUuid('project_id')->nullable()->references('id')->on('projects');
            $table->foreignUuid('created_by')->references('id')->on('users');
            $table->foreignUuid('updated_by')->nullable()->references('id')->on('users');
            $table->foreignUuid('deleted_by')->nullable()->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
