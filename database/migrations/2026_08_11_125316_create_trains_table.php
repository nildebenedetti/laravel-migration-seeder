<?php

use App\Enums\TrainStatus;
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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', length: 40);
            $table->string('departure_station', length: 40);
            $table->string('arrival_station', length: 30);
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('train_code', length: 20);
            $table->string('status')->default('scheduled');
            $table->integer('delay_minutes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
