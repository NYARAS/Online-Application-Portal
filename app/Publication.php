<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
  protected $table = 'publications';
  protected $fillable=['number_of_journals','list_of_journals','number_of_books','list_of_books','name_of_referee','recommendation_letter','user_id'];
  protected $primaryKey='id';
  public $timestamps = true;
}
