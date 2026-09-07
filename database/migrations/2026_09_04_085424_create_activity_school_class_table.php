<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activitiesToClasses', function (Blueprint $table) {
            $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
            $table->foreignId('class_id')->constrained('schoolClasses')->cascadeOnDelete();

            $table->primary(['activity_id', 'class_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activitiesToClasses');
    }
};
