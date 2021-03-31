<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
   protected $table = "pending_transaction_log";
   protected $primaryKey = "id";
   public $timestamps = false;
}
