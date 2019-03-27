<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
  
    protected $table = 'schools';
    protected $fillable=['school','description'];
    protected $primaryKey='school_id';
    public $timestamps = true;
}
