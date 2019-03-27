<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
  protected $table = 'qualifications';

    protected $fillable=['institution_name','academic_level','year_of_completion','file_attachment','name_of_institution','job_category','start_date','end_date','user_id'];


  protected $primaryKey='id';
  public $timestamps = true;
}
