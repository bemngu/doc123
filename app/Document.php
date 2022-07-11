<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
            'document_name',
            'document_slug',
            'category_id',
            'document_desc',
            'product_image',
            'file',
            'document_title',
            'document_views',
    ];
    protected $primaryKey = 'document_id';
 	protected $table = 'tbl_document';
    
}
