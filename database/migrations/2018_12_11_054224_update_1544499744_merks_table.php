<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1544499744MerksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merks', function (Blueprint $table) {
            
if (!Schema::hasColumn('merks', 'carname')) {
                $table->string('carname');
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
        Schema::table('merks', function (Blueprint $table) {
            $table->dropColumn('carname');
            
        });

    }
}
