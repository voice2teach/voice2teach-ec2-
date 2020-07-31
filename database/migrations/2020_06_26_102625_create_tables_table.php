<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tables', function (Blueprint $table) {
            // $table->id();
            $table->string("ID");
            $table->integer('Table_Owner')->nullable();
            $table->string('Table_Name')->nullable();
            $table->datetime('Time')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tables');
    }
}
