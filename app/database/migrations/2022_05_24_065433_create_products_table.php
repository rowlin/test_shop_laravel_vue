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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 90);
            $table->string('code', 10);
            $table->string('slug' , 100 );
            $table->double('price')->default(0.0);
            $table->text('description');
            $table->unsignedInteger('discount_id')->nullable();
            $table->boolean('status')->default(true);//active
            $table->integer('available_count')->default(1);
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
        Schema::dropIfExists('products');
    }
};
