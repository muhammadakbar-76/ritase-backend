<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ritases', function (Blueprint $table) {
            $table->id('ritase_id');
            $table->date('ritase_date');
            $table->time('ritase_time');
            $table->string('ritase_material');
            $table->string('ritase_kategori');
            $table->text('ritase_keterangan');
            $table->foreignId('kode_unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ritases');
    }
};
