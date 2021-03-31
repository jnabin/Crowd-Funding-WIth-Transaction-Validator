<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
   protected $table = "donation";
   protected $primaryKey = "id";
   public $timestamps = false;
}
