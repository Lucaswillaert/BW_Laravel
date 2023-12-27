<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {

            //data voor de FAQ pagina 
            $table->id();
            $table->string('question');
            $table->text('answer')->nullable();
            $table->timestamp('date');
            $table->boolean('published')->default(false);
            $table->timestamps();

            //FK naar de user 
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
};
