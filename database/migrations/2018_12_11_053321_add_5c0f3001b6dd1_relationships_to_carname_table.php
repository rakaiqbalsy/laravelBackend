<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0f3001b6dd1RelationshipsToCarnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carnames', function(Blueprint $table) {
            if (!Schema::hasColumn('carnames', 'nama_mobil_id')) {
                $table->integer('nama_mobil_id')->unsigned()->nullable();
                $table->foreign('nama_mobil_id', '239336_5c0f2f8ea5a1c')->references('id')->on('merks')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carnames', function(Blueprint $table) {
            
        });
    }
}
