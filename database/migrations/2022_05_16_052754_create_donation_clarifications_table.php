<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationClarificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_clarifications', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('user_id');
            $table->string('anumber')->nullable();
            $table->string('tid')->nullable();
            $table->string('amount')->nullable();
            $table->string('paytype')->nullable();
            $table->string('paydate')->nullable();
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
        Schema::dropIfExists('donation_clarifications');
    }
}
