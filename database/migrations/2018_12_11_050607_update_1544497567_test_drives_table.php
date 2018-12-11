<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544497567TestDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_drives', function (Blueprint $table) {
            if(Schema::hasColumn('test_drives', 'no_ktp')) {
                $table->dropColumn('no_ktp');
            }
            
        });
Schema::table('test_drives', function (Blueprint $table) {
            
if (!Schema::hasColumn('test_drives', 'ktp')) {
                $table->string('ktp');
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
            $table->dropColumn('ktp');
            
        });
Schema::table('test_drives', function (Blueprint $table) {
                        $table->integer('no_ktp')->nullable()->unsigned();
                
        });

    }
}
