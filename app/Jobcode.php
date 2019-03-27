<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobcode extends Model
{
    protected $table = 'jobcodes';
    protected $fillable=['jobcode_name','description','school_id'];
    protected $primaryKey='jobcode_id';
    public $timestamps = true;
}
