<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    use Hasfactory;
    protected $fillable = [
        'category_name',
        'category_desc',
        'category_status',
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';
   
}
