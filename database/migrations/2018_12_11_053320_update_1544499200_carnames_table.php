<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544499200CarnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carnames', function (Blueprint $table) {
            
if (!Schema::hasColumn('carnames', 'carname')) {
                $table->string('carname')->nullable();
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
        Schema::table('carnames', function (Blueprint $table) {
            $table->dropColumn('carname');
            
        });

    }
}
