<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->id();
            $table->string('password');
            $table->foreignId('team_id')->nullable()->constrained('projectteams')->restrictOnDelete();
            $table->string('designation')->nullable();
            $table->string('Department')->nullable();
            $table->text('image');
            $table->string('role')->default('employee');

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
        Schema::dropIfExists('admins');
    }
}
