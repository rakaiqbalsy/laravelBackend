<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544498948TestDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_drives', function (Blueprint $table) {
            if(Schema::hasColumn('test_drives', 'merk_id')) {
                $table->dropForeign('239323_5c0f2eaec0255');
                $table->dropIndex('239323_5c0f2eaec0255');
                $table->dropColumn('merk_id');
            }
            if(Schema::hasColumn('test_drives', 'nama_mobil_id')) {
                $table->dropForeign('239323_5c0f2eaed1cf2');
                $table->dropIndex('239323_5c0f2eaed1cf2');
                $table->dropColumn('nama_mobil_id');
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
        Schema::table('test_drives', function (Blueprint $table) {
                        
        });

    }
}
