<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stadiums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // علاقة بمالك الملعب
            $table->string('name');
            $table->string('location');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('capacity')->nullable();
            $table->string('size')->nullable(); // مثال: 5x5 أو 7x7
            $table->enum('stadium_type', ['natural_grass', 'artificial_turf', 'sand', 'indoor', 'other'])->default('other');
            $table->time('opening_hours')->nullable();
            $table->time('closing_hours')->nullable();
            $table->text('rules')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price_per_hour', 8, 2);
            $table->enum('status', ['active', 'booked', 'under_maintenance', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stadiums');
    }
};
