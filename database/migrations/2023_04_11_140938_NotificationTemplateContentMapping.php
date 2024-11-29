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
        Schema::create('notification_template_content_mapping', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('language')->nullable();
            $table->longText('template_detail')->nullable();
            $table->string('subject')->nullable();
            $table->string('notification_message')->nullable();
            $table->string('notification_link')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_template_content_mapping');
    }
};
