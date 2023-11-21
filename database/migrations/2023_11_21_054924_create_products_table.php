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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->bigInteger('category_id')->unsigned()->nullable();  
            $table->bigInteger('subcategory_id')->unsigned()->nullable();  
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('model_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('address');
            $table->string('zipcode');
            $table->string('lat');
            $table->string('lang');
            $table->string('prices');
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('owner_name');
            $table->string('contact_number');
            $table->string('email_id');
            $table->string('featimage');
            $table->string('thumbimage');
            $table->text('images');
            $table->string('exchange_for');
            $table->boolean('is_exchange');
            $table->boolean('is_rent');
            $table->boolean('is_sell');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('model_numbers')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
