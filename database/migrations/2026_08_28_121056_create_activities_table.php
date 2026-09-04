<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->dateTime('dt_stamp');
            $table->dateTime('dt_start');
            $table->dateTime('dt_end');
            $table->text('summary');
            $table->string('description');
            $table->string('location');
            $table->string('status');
            $table->string('text');
            $table->float('version');
            $table->string('attendee');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
