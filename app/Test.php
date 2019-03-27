<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable=['institution_name','academic_level','year_of_completion','file_attachment','name_of_institution','job_category','start_date','end_date','user_id'];
}
