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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('slug', 150);
            $table->text('description');
            $table->date('date_online');
            $table->date('date_offline');
            $table->string('price');
            $table->string('currency');
            $table->decimal('bedrooms', 3, 1)->nullable();
            $table->decimal('bathrooms', 3, 1)->nullable();
            $table->string('contact_details_mobile');
            $table->string('contact_details_email');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
