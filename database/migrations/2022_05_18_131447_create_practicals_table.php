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
        Schema::create('practicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centre_id')->nullable();
            $table->string('name');
            $table->string('license');
            $table->text('address');
            $table->integer('postcode');
            $table->string('email');
            $table->string('mobile');
            $table->string('tcertificate_num')->nullable();
            $table->string('theory_expdate')->nullable();
            $table->string('transmission')->nullable();
            $table->string('pre_bookingdate')->nullable();
            $table->string('photo')->nullable();
            $table->string('is_theory')->nullable();
            $table->string('theorytest_no')->nullable();
            $table->string('track_id')->nullable();
            $table->string('is_booked')->nullable();
            $table->string('is_revoked')->nullable();
            $table->string('need_instructor')->nullable();

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
        Schema::dropIfExists('practicals');
    }
};
