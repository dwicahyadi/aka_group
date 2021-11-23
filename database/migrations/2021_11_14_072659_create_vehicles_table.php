<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('code',15)->unique();
            $table->string('license_number',15)->comment('stnk/nomor polisi');
            $table->string('brand',191);
            $table->string('model',191);
            $table->integer('year');
            $table->string('vin',17)->comment('vehicle identification number / nomor rangka');
            $table->string('image',191);
            $table->foreignId('driver_id')->nullable()->constrained();
            $table->foreignId('tax_officer_id')->nullable()->constrained();
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
        Schema::dropIfExists('vehicles');
    }
}
