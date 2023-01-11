<?php

use App\Models\Petugas;
use App\Models\SLS;
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
        Schema::create('penunjuk_jalans', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("petugas_id",5);
            $table->string("sls_id",16);
            $table->mediumText("link");
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
        Schema::dropIfExists('penunjuk_jalans');
    }
};
