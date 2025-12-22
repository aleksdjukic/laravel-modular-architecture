<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')
                ->constrained('companies')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->string('location')->nullable();

            $table->string('employment_type');

            $table->decimal('salary_from', 12, 2)->nullable();
            $table->decimal('salary_to', 12, 2)->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['company_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
