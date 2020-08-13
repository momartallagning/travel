<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('name');
            $table->enum('civility', ['Mme', 'M.']);
            $table->string('email')->unique();
            $table->string('phone',9)->unique();
            $table->string('password');
            $table->string('avatar')->default('user.jpg');
            $table->boolean('is_active')->default(true);
            $table->boolean('staff')->default(false);
            $table->boolean('admin')->default(false);
            $table->timestamp('last_seen')->nullable();
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
}
