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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code')->unique();
            $table->string('project_name');
            $table->string('client');
            $table->string('project_location');
            $table->decimal('contract_value', 15, 2);
            $table->date('start_date');
            $table->date('target_completion_date');
            $table->enum('status', [
                'Perencanaan',
                'Berjalan',
                'Selesai',
                'Ditunda'
            ])->default('Perencanaan');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
