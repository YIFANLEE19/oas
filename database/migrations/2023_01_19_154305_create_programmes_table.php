<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $ACTIVECODE = 1; 
            $table->id();
            $table->string('en_name');
            $table->foreignId('programme_level_id')->constrained()->onUpdate('cascade');
            $table->foreignId('programme_type_id')->constrained()->onUpdate('cascade');
            $table->integer('status')->default($ACTIVECODE);
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
        Schema::dropIfExists('programmes');
    }
}
