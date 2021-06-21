<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialAndLivetvOnUkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ukms', function (Blueprint $table) {
            $table->string('twitter')->after('description')->nullable();
            $table->string('instagram')->after('twitter')->nullable();
            $table->string('facebook')->after('instagram')->nullable();
            $table->string('youtube')->after('facebook')->nullable();
            $table->text('livetv')->after('youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ukms', function (Blueprint $table) {
            $table->dropColumn('twitter');
            $table->dropColumn('instagram');
            $table->dropColumn('facebook');
            $table->dropColumn('youtube');
            $table->dropColumn('livetv');
        });
    }
}
