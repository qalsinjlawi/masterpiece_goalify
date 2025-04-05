<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stadium_id')->constrained('stadiums')->onDelete('cascade');
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->decimal('value', 8, 2);
            $table->string('code')->nullable()->unique(); // كوبون يدوي (اختياري)
            $table->boolean('is_active')->default(true);  // toggle التفعيل
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('min_hours')->nullable(); // أقل عدد ساعات لتطبيق الخصم
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
