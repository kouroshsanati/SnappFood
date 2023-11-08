<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('restaurant_category_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->string('name');
            $table->string('telephone');
            $table->string('bank_account_number');
            $table->double('latitude')->nullable()->default(null);
            $table->double('longitude')->nullable()->default(null);
            $table->decimal('cost_of_sending_order', 10, 2)->nullable()->default(null);
            $table->boolean('is_open')->default(1);
            $table->string('score')->nullable()->default(null);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
