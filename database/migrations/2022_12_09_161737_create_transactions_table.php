<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('item_id')->references('item_id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->string('receiver_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
