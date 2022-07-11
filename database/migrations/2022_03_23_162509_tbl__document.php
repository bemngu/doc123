<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_document', function (Blueprint $table) {
            $table->Increments('document_id');
            $table->string('document_name');
            $table->string('document_slug');
            $table->integer('category_id');
            $table->text('document_desc');
            $table->string('file');
            $table->string('document_views');
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
        //
    }
}
