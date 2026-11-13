<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('title', 255);
            $table->decimal('price', 12, 2);
            $table->string('location', 255);
            $table->text('message');
        });
    }

    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'price',
                'location',
                'message'
            ]);
        });
    }
};
