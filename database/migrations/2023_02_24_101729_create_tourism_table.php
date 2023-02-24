<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourismTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourism', function (Blueprint $table) {
            $table->id();
            $table->string("tourism_place_name");
            $table->text("address");
            $table->integer("ticket_price");
            $table->string("open_time");
            $table->string("latitude");
            $table->string("longitude");
            $table->softDeletes();
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
        Schema::dropIfExists('tourism');
    }
}
