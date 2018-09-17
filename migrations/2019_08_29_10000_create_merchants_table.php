<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //** customer information detail */
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('mccode',100);
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
        });

        //** common user for customers and merchant. */
        Schema::create('mc_authentication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loginname');
            $table->string('password');
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
            $table->unsignedInteger('mc_id');

            $table->foreign('mc_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');
        });

        //** customer information profile */
        Schema::create('mc_informations', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('phonenumber',15);
            $table->string('address');
            $table->unsignedInteger('mc_id');
            $table->foreign('mc_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');
        });

        //cus_accounts
        Schema::create('mc_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance');
            $table->string('account_type',5);
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
            $table->unsignedInteger('mc_id');
            $table->foreign('mc_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::drop('merchants');
        Schema::drop('mc_authentication');
        Schema::drop('mc_informations');
        Schema::drop('mc_accounts');

    }
}
