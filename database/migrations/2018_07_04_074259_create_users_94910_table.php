<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers94910Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_94910', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_photo')->nullable()->default('https://qph.fs.quoracdn.net/main-qimg-7ca600a4562ef6a81f4dc2bd5c99fee9-c');
            $table->string('preferred_location')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->string('target_weight')->nullable();
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
        Schema::dropIfExists('users_94910');
    }
}
