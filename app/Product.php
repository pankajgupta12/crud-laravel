<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

     protected $table = 'products';
    
     protected $fillable = [

        'name', 'title','city','description','img'
        
        ];
        public $timestamps = false;

    //  protected $hidden = [
    //     'created_at', 'updated_at',
    //     ];
}
