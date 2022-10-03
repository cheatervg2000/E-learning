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
        Schema::table('courses', function (Blueprint $table) {
            //
            $table->string('video', 20)->nullable()->after('name');
            $table->text('requirements')->nullable()->after('description');
            $table->text('outcomes')->nullable()->after('requirements');  
            $table->string('des_image',255)->nullable()->after('outcomes');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('video');
            $table->dropColumn('requirements');
            $table->dropColumn('des_image');
            $table->dropColumn('outcomes');
        });
    }
};
