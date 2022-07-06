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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('practical_id')->nullable();
            $table->foreign('practical_id')->references('id')->on('practicals')->onDelete('cascade');
            $table->unsignedBigInteger('theory_id')->nullable();
            $table->foreign('theory_id')->references('id')->on('theories')->onDelete('cascade');
            $table->unsignedBigInteger('adi_id')->nullable();
            $table->foreign('adi_id')->references('id')->on('adis')->onDelete('cascade');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('amount');
            $table->integer('refund')->nullable();
            $table->string('card_name');
            $table->string('card_number');
            $table->string('card_cvc');
            $table->string('card_exp_month');
            $table->string('card_exp_year');
            $table->string('charge_id')->unique();
            $table->string('pay_method');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('payments');
    }
};
