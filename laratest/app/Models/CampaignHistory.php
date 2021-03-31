<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignHistory extends Model
{
   protected $table = "campaign_history";
   protected $primaryKey = "id";
   public $timestamps = false;
}
