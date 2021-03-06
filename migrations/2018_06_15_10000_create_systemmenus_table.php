<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->nullable();
            $table->integer('menu_type')->default(1);
            $table->string('icon')->nullable();
            $table->string('name')->unique();
            $table->string('title');
            $table->string('urladress')->nullable();
            $table->integer('parent_id')->nullable();            
            $table->boolean('status')->nullable();
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
        Schema::drop('system_menus');
    }
}
