<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Create table here
    public function up()
    {
        /***
         *  CREATE TABLE categories(
         * id bigint unsigned not null AUTO_INCREMENT PRIMARY KEY,
         * title varchar(100) not null,
         * slug varchar(100) not null,
         * status enum('active','inactive') default 'inactive',
         * created_by int,
         * created_at datetime default CURRENT_TIMESTAMP,
         * updated_at datetime ON UPDATE CURRENT_TIMESTAMP
         * )
         *
         */

    //Parent Category
        //CHILD CATEGORY
        //CHILD CATEGORY

        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('title',100);

            $table->foreignId('parent_id')->nullable()->constrained('categories','id')->nullOnDelete()->cascadeOnUpdate();

            $table->string('slug', 100)->unique();

            $table->enum('status',['active','inactive'])->default('inactive');

            $table->string('image',100)->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users','id')->nullOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //Delete table here
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
