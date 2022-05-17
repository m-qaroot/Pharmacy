<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type' , ['a' , 'b' , 'c', 'd', 'e', 'f']);
            $table->bigInteger('quantity');
            $table->date('prod_date');
            $table->date('exp_date');
            $table->integer('cost_price');
            $table->integer('sell_price');
            $table->integer('discount_price')->nullable();
            $table->foreignId('employee_id');
            $table->foreign('employee_id')->on('employees')->references('id');
            $table->foreignId('invoice_id');
            $table->foreign('invoice_id')->on('invoices')->references('id');           
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
        Schema::dropIfExists('medicins');
    }
}
