<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0f30850c0fcRelationshipsToTestDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_drives', function(Blueprint $table) {
            if (!Schema::hasColumn('test_drives', 'merk_id')) {
                $table->integer('merk_id')->unsigned()->nullable();
                $table->foreign('merk_id', '239323_5c0f2eaec0255')->references('id')->on('merks')->onDelete('cascade');
                }
                if (!Schema::hasColumn('test_drives', 'carname_id')) {
                $table->integer('carname_id')->unsigned()->nullable();
                $table->foreign('carname_id', '239323_5c0f3083037b5')->references('id')->on('carnames')->onDelete('cascade');
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
        Schema::table('test_drives', function(Blueprint $table) {
            
        });
    }
}
