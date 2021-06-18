<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReorderCategoriesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('depth');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedInteger('lft')->nullable();
            $table->unsignedInteger('rgt')->nullable();
            $table->unsignedInteger('depth')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('depth');
            $table->dropColumn('lft');
            $table->dropColumn('rgt');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedInteger('depth')->nullable();
        });
    }
}
