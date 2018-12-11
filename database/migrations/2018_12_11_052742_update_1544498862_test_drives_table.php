<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544498862TestDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_drives', function (Blueprint $table) {
            if(Schema::hasColumn('test_drives', 'merk')) {
                $table->dropColumn('merk');
            }
            if(Schema::hasColumn('test_drives', 'nama_mobil')) {
                $table->dropColumn('nama_mobil');
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
                        $table->string('merk');
                $table->string('nama_mobil');
                
        });

    }
}
