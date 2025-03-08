<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('motorcycles', function (Blueprint $table) {
            $table->id();
            $table->string("brand", 20)->n;
            $table->string("type", 100);
            $table->string("licencePlate", 7)->unique();
            $table->unsignedSmallInteger("year");
            $table->string("gearbox", 25);
            $table->string("fuel", 1);
            $table->float("powerLe");
            $table->float("powerkW");
            $table->float( "engineSize");
            $table->string("drivingLicence", 4);
            $table->unsignedTinyInteger("places");
            $table->unsignedInteger("price");
            $table->unsignedInteger("deposit");
            $table->date("trafficDate");
            $table->string("location")->nullable();
            $table->string('image')->default("placeholder.png");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycles');
    }
};
