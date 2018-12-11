<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544499501TestDrivesTable extends Migration
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
            if(Schema::hasColumn('test_drives', 'carname_id')) {
                $table->dropForeign('239323_5c0f3083037b5');
                $table->dropIndex('239323_5c0f3083037b5');
                $table->dropColumn('carname_id');
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
