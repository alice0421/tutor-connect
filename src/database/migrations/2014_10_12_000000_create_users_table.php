<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('family_name');
            $table->string('nickname')->nullable();
            $table->boolean('is_name_public')->default(0); // 本名の公開 / 非公開（非公開ならnicknameが表示）
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('gender'); // 0: 男 / 1: 女
            $table->integer('grade'); // 0: 中学1年生〜5: 高校3年生
            $table->integer('preferred_class_per_day')->nullable(); // 希望コマ数 / 日
            $table->integer('preferred_studying_day_per_week')->nullable(); // 授業日数 / 週
            $table->integer('purpose')->default(0); // 0: 学習フォロー / 1: 高校受験 / 2: 大学受験
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
