<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
  protected $table = 'terms';
  protected $fillable=['transaction_code','transaction_copy','user_id','paid','email','first_name','second_name','last_name'];
  protected $primaryKey='id';
  public $timestamps = true;
}
