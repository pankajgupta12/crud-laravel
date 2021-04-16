<?php

namespace App;
//use post;
use Illuminate\Database\Eloquent\Model;

class userdata extends Model
{
    //

    protected $table = 'userdata';
    protected $timestamp = false;


     function getpost(){
   
          // $this->hasOne(post::Class, 'userid','id');
          return $this->hasOne(Post::class  , 'userid');  
         //  return $this->hasMeny(Post::class , 'userid');
   
     }   
}
