<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username',25)->unique();
            $table->integer('nivelacesso');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        factory(User::class)->create([
            'name' => 'Adminstrador',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => md5('admin'),
            'nivelacesso' => 1,
            ]);
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
