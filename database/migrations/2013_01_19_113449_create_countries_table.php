<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(false);
            $table->string('name')->unique()->nullable(false);
            $table->string('iso_3166_2')->nullable(false);
            $table->string('iso_3166_3')->nullable(false);
            $table->string('currency')->nullable(false);
            $table->string('currency_code')->nullable(false);
            $table->string('currency_sub_unit')->nullable(false);
            $table->string('currency_symbol')->nullable(false);
            $table->integer('currency_decimals')->default(0);
            $table->decimal('currency_rate', 4, 2);
            $table->string('flag')->nullable(false);
            $table->string('calling_code')->nullable(false);
            $table->string('region_code')->nullable(false);
            $table->string('sub_region_code')->nullable(false);
            $table->boolean('eea');
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
        Schema::dropIfExists('countries');
    }
}
