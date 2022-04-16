<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->string('name')->unique()->index();
            $table->string('alias')->unique();
            $table->string('article')->unique();
            $table->unsignedBigInteger('description_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->unsignedBigInteger('stock_status_id');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('manufacturer_id');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('tax_rate_id');
            $table->integer('reward_points')->nullable();
            $table->integer('minimum')->default(1);
            $table->integer('maximum')->default(1);
            $table->boolean('is_active')->default(true);
            $table->uuid('employee_id');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('description_id')->references('id')
                ->on('product_descriptions');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('stock_status_id')->references('id')
                ->on('stock_statuses');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('manufacturer_id')->references('id')
                ->on('manufacturers');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('tax_rate_id')->references('id')
                ->on('tax_rates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
