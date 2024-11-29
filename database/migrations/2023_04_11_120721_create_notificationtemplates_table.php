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
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('label')->nullable();
            $table->longText('description')->nullable();
            $table->string('type')->nullable();
            $table->longText('to')->nullable();
            $table->longText('bcc')->nullable();
            $table->longText('cc')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('channels')->nullable();
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
        Schema::dropIfExists('notification_templates');
    }
};
