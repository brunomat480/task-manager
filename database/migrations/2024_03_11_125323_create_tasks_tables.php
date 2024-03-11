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
      $table->id();
      $table->text('description');
      $table->boolean('completed')->default(false);

      $table->unsignedBigInteger('id_user');
      $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

      $table->unsignedBigInteger('id_categorie');
      $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tasks_tables');
  }
};
