<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    //Table Name
    protected $table = 'vacancies';

    // Primary Key
   public  $primaryKey = 'id';

   // Timestamps
   public $timestamps = 'true';



   public function user(){

    return $this->belongsTo('App\User');
   }
}
