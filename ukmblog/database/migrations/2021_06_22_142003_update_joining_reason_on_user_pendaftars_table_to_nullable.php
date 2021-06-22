<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJoiningReasonOnUserPendaftarsTableToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_pendaftars', function (Blueprint $table) {
            $table->text('reason_joining')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_pendaftars', function (Blueprint $table) {
            $table->text('reason_joining');
        });
    }
}
