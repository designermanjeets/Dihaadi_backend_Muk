<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterServiceVisitType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('services', function (Blueprint $table) {
            //
            if (!Schema::hasColumn('services', 'visit_type')) {
            $table->string('visit_type')->nullable()->default('on_site');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('services', function (Blueprint $table) {
            //
            $table->dropColumn('visit_type');
        });
    }
}
