<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
            $table->text('excerpt')->nullable()->after('content');
            $table->string('image')->nullable()->after('excerpt');
            $table->foreignId('category_id')->nullable()->after('image')
                ->constrained()->nullOnDelete();
            $table->unsignedBigInteger('views')->default(0)->after('category_id');
            $table->boolean('is_featured')->default(false)->after('views');
            $table->string('author')->default('Redaksi')->after('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn([
                'slug', 'excerpt', 'image', 'category_id',
                'views', 'is_featured', 'author',
            ]);
        });
    }
};