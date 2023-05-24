<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('statistic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statistic_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
            $table->unique(['statistic_id', 'locale']);
            $table->foreign('statistic_id')->references('id')->on('statistics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistic_translations');
    }
};
