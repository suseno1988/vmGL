<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('code',20);
            $table->date('transaction_date');
            $table->string('description',180);
            $table->decimal('total',18,2)->default(0);
            $table->integer('status')->default(0)->comment('0: Post, 1: Void/Suspend');
            $table->unsignedBigInteger('created_by');
            $table->bigInteger('updated_by')->default(0);
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
        Schema::dropIfExists('jurnals');
    }
}
