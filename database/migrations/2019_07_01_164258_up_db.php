<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar');
            $table->integer('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });

       /* Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });*/

        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->string('password',191);
            $table->integer('status')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            /*$table->bigInteger('level')->unsigned();
            $table
                ->foreign('level')
                ->references('id')
                ->on('role');
            $table->timestamps();*/
        });

         //slider
         Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('logo')->nullable();
            $table->timestamps();
        });


       /* Schema::create('product_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->tinyInteger('active')->default(1)->index();
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('cate_products')->onDelete('cascade');
            $table->timestamps();
        });*/

        //gioi thieu
        Schema::create('introduce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('summary');
            $table->text('content');
            $table->text('video')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();

        });
        Schema::create('showrom', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
        });

        // lien he
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->string('content');
            $table->integer('status')->default('0');
            $table->timestamps();
        });
        //cau hoi thuong gap
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('content');
            $table->timestamps();
        });

        //tin tuc
        Schema::create('cate_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('summary');
            $table->text('content');
            $table->string('image');
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_news')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('tagnews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');
            $table->timestamps();
        });

        /*
         * product
         * */

        // bo suu tap

        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
        //san pham
        Schema::create('cate_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('total_product')->default(0);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->text('describe');
            $table->integer('pay')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('price');
            $table->string('image');
            $table->tinyInteger('active')->default(1);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('cate_products')->onDelete('cascade');
          /*  $table->bigInteger('producttype_id')->unsigned();
            $table->foreign('producttype_id')->references('id')->on('product_type')->onDelete('cascade');*/
            $table->bigInteger('collections_id')->unsigned();
            $table->foreign('collections_id')->references('id')->on('collections')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('color',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('status')->default(1);
        });

        //
        Schema::create('size',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('status')->default(1);
        });



        Schema::create('product_details',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->bigInteger('color_id')->unsigned();
            $table->foreign('color_id')
                ->references('id')
                ->on('color')
                ->onDelete('cascade');
            $table->string('image');
        });
        Schema::create('color_size',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('detail_id')->unsigned();
            $table->foreign('detail_id')
                ->references('id')
                ->on('product_details')
                ->onDelete('cascade');
            $table->bigInteger('size_id')->unsigned();
            $table->foreign('size_id')
                ->references('id')
                ->on('size')
                ->onDelete('cascade');
            $table->integer('quantity')->default(1);
        });
        Schema::create('product_likes',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });


        Schema::create('payment_methods',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('carts',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->bigInteger('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade');
            $table->bigInteger('total');
            $table->date('day');
            $table->integer('status')->default(0);
        });
        Schema::create('cart_details',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger('cart_id')->unsigned();
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');
            $table->string('name');
            $table->bigInteger('color');
            $table->bigInteger('size');
           $table->integer('price');
           $table->integer('quantity');
           $table->integer('money');
        });
        /*
         * tuyển dụng
         * */
        Schema::create('recruitments',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('code');
            $table->date('begin_time');
            $table->date('end_time');
            $table->string('image');
            $table->text('content');
            $table->bigInteger('salary');
            $table->string('position');
            $table->integer('work_time');
            $table->integer('status')->default(0);
        });
        Schema::create('tag_recruitment',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('recruitment_id')->unsigned();
            $table->foreign('recruitment_id')
                ->references('id')
                ->on('recruitments')
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
       //
    }
}
