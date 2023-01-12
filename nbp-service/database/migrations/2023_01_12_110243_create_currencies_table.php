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
        Schema::create('currencies', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name')->comment('nbp api: currency');
            $table->string('currency_code', 3)->unique()->comment('nbpApi: code');
            $table->float('exchange_rate', total:10, places: 6)->comment('nbpApi: mid');
            $table->integer('exchange_rate_int')->nullable()->comment('nbpApi: mid');
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
        Schema::dropIfExists('currencies');
    }
};
