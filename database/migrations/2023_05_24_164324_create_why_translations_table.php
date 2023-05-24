<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('why_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('why')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->longText('description');
            $table->unique(['why_id', 'locale']);
            $table->foreign('why_id')->references('id')->on('whies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('why_translations');
    }
};
