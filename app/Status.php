<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable=['applicant_id','post_id'];
    protected $primaryKey='status_id';
    public $timestamps = true;
}
