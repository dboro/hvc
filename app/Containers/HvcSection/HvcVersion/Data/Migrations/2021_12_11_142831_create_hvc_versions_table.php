<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHvcVersionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hvc_versions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('tag');
            $table->boolean('is_published')->default(false);

            $table->foreignId('hvc_object_id');
            $table->foreign('hvc_object_id')
                ->on('hvc_objects')->references('id')
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->unique(['tag', 'hvc_object_id']);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hvc_versions');
    }
}
