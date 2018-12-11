<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1544496669TestDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('test_drives')) {
            Schema::create('test_drives', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama');
                $table->integer('no_ktp')->nullable();
                $table->string('email');
                $table->string('alamat')->nullable();
                $table->date('tanggal_test_drive')->nullable();
                $table->string('jenis_sim');
                $table->string('merk');
                $table->string('nama_mobil');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_drives');
    }
}
