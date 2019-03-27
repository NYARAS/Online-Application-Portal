<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personals';
    protected $fillable=['qualified_candidate'];
    protected $primaryKey='applicant_id';
    public $timestamps = true;
}
