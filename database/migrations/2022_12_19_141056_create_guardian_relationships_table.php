<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardianRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_relationships', function (Blueprint $table) {
            $ACTIVECODE = 1;
            $table->id();
            $table->string('name');
            $table->string('relationship_code');
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
        Schema::dropIfExists('guardian_relationships');
    }
}
