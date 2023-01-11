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
        Schema::create('sls', function (Blueprint $table) {
            $table->string("id",16)->primary();
            $table->string("nama");
            $table->string("kdsubsls",2);
            $table->string("kdsls",4);
            $table->string("kddesa",3);
            $table->string("desa");
            $table->string("kdkec",3);
            $table->string("kec");
            $table->string("kdkab",3);
            $table->string("kab");
            $table->string("kdprov",2);
            $table->string("prov");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sls');
    }
};
