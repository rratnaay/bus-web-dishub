<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('route_stop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stop_id')->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('sequence');
            $table->unsignedSmallInteger('estimated_minutes')->nullable();
            $table->unique(['route_id', 'stop_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('route_stop'); }
};
