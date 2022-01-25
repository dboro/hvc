<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHvcLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hvc_logs', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->foreignId('hvc_object_id');
            $table->foreign('hvc_object_id')
                ->on('hvc_objects')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('user_id');
            $table->foreign('user_id')->on('users')->references('id')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hvc_logs');
    }
}
