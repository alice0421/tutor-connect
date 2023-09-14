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
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->boolean('is_name_public')->default(0); // 本名の公開 / 非公開（非公開ならnicknameが表示）
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('gender'); // 0: 男 / 1: 女
            $table->integer('grade'); // 0: 中学1年生〜5: 高校3年生
            $table->integer('preferred_daily_class')->nullable(); // 希望コマ数 / 日
            $table->integer('preferred_weekly_day')->nullable(); // 授業日数 / 週
            $table->integer('goal')->default(0); // 0: 学習フォロー / 1: 受験
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
