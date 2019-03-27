<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    
    protected $table = 'jobtitles';
    protected $fillable=['job_title','description'];
    protected $primaryKey='jobtitle_id';
    public $timestamps = true;
}
