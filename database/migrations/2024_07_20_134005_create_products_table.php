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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 2);
            $table->integer('quantity');
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_new')->default(false);
            $table->text("description")->default('');
            $table->text("short_description")->default('');
            $table->timestamps();
            $table->text('thumb')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
