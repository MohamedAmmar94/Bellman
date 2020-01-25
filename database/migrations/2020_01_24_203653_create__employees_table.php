<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique()->nullable();
			$table->string('phone')->unique()->nullable();
			$table->unsignedBigInteger('company')->nullable();
			//$table->foreign('company')->references('id')->on('companies');
            $table->timestamps();
			$table->softDeletes();
        });
		Schema::table('employees', function($table) {
            $table->foreign('company')->references('id')->on('companies');
            // Other Constraints 
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
