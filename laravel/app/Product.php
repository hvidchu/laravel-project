<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'my_products';
    
    //預設為id
    protected $primarykey = 'my_id';
}
