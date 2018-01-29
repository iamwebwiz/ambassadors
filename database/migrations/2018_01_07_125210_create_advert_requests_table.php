<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body')->default('Lorem ipsum dolor sit amet, consectetur adipisicing.');
            $table->integer('company_id')->unsigned();
            $table->enum('status', ['Pending', 'Matched', 'Processing', 'Finished'])
                  ->default('Pending');
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('advert_requests');
    }
}
