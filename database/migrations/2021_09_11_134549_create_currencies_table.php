<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code',8);
            $table->string('name',30);
            $table->decimal('rate',18,2)->default(0);
            $table->string('symbol',4)->nullable();
            $table->integer('status')->default(0)->comment('0: Active, 1: Suspend');
            $table->unsignedBigInteger('created_by');
            $table->integer('updated_by')->default(0);
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
}
