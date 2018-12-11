<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0f2eb054a1fRelationshipsToTestDriveTable extends Migration
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
                $table->foreign('merk_id', '239323_5c0f2eaec0255')->references('id')->on('data_mobils')->onDelete('cascade');
                }
                if (!Schema::hasColumn('test_drives', 'nama_mobil_id')) {
                $table->integer('nama_mobil_id')->unsigned()->nullable();
                $table->foreign('nama_mobil_id', '239323_5c0f2eaed1cf2')->references('id')->on('data_mobils')->onDelete('cascade');
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
