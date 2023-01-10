<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maritals', function (Blueprint $table) {
            $ACTIVECODE = 1;
            $table->id();
            $table->string('name');
            $table->string('marital_code');
            $table->integer('status')->default($ACTIVECODE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maritals');
    }
}
