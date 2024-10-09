<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('protfolios', function (Blueprint $table) {
            $table->id();
            $table->string('protfolio_name');
            $table->string('protfolio_link');
            $table->string('image')->nullable();
            $table->string('bg_image')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('protfolios');
    }
};
