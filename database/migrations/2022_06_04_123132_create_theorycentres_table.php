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
        Schema::create('theorycentres', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id')->nullable();
            $table->string('date');
            $table->string('centre_name');
            $table->string('buy_cost')->nullable();
            $table->string('sell_cost')->nullable();
            $table->string('account_no')->nullable();
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
        Schema::dropIfExists('theorycentres');
    }
};
