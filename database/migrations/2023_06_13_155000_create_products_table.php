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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            /* Add additional fields */
            $table->string('title');  // product title
            $table->longText('description');   // description
            $table->string('department');   // short notes
            $table->decimal('price', 10, 2); // price
            $table->string('location'); // product image
            $table->string('manufacture'); // product slug
            $table->string('tags');
            $table->string('logo')->nullable();
            $table->timestamps();
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
