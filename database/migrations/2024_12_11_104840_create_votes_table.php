<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // References the users table
            $table->foreignId('election_id')->constrained('elections')->onDelete('cascade'); // References the elections table
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade'); // References the candidates table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
