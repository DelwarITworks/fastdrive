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
        Schema::create('theories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theorycentre_id')->nullable();
            $table->string('name');
            $table->string('license');
            $table->text('address');
            $table->integer('postcode');
            $table->string('email');
            $table->string('mobile');
            $table->string('photo')->nullable();
            $table->string('track_id')->nullable();

            $table->string('ref_id')->nullable();
            $table->string('date');
            $table->string('centre_name');

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
        Schema::dropIfExists('theories');
    }
};
