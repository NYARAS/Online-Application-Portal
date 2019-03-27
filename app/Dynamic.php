<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
  protected $table = 'dynamics';
  protected $fillable=['name_of_institution','job_category','start_date','end_date'];
  protected $primaryKey='id';
  public $timestamps = true;
}
