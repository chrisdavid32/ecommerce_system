<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('state_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('post_code')->nullable();
            $table->text('notes')->nullable();
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency');
            $table->float('amount', 8, 2);
            $table->string('order_number')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('order_date')->nullable();
            $table->string('comfirmed_date')->nullable();
            $table->string('processded_date')->nullable();
            $table->string('pick_date')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('cancel_date')->nullable();
            $table->string('returned_date')->nullable();
            $table->string('returned_reason')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
