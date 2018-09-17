<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //** customer information detail */
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('code',100);
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
        });

        //** common user for customers and merchant. */
        Schema::create('cus_authentication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loginname',50);
            $table->string('password',200);
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
            $table->unsignedInteger('cus_id');

            $table->foreign('cus_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
        });

        //** customer information profile */
        Schema::create('cus_informations', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('fullname',200)->nullable();
            $table->string('email',200)->nullable();
            $table->string('phonenumber',15);
            $table->string('address');
            $table->unsignedInteger('cus_id');
            $table->foreign('cus_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');
        });

        //cus_accounts
        Schema::create('cus_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance');
            $table->string('account_type',5);
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
            $table->unsignedInteger('cus_id');
            $table->foreign('cus_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');   
        });

        // cus_verify
        Schema::create('cus_verify', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('verify_type');
            $table->boolean('status')->nullable();
            $table->timestamps(); //created_at and updated_at
            $table->unsignedInteger('cus_id');
            $table->foreign('cus_id')
                ->references('id')->on('customers')
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
        Schema::drop('customers');
        Schema::drop('cus_authentication');
        Schema::drop('cus_informations');
        Schema::drop('cus_accounts');

    }
}
