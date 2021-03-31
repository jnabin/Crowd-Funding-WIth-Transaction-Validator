<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
Use Illuminate\Http\Response;

use Validator;

use App\Models\Campaign;

use App\Models\History;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Contract;
use Carbon\Carbon;
use GuzzleHttp\Client;

class NodeController extends Controller
{
   
    
    public function store(Request $req){
        echo $req->getContent();
                 echo '<script>';
          echo 'console.log('. json_encode( 'mssssssssss' ) .')';
          echo '</script>';
        return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
        // $value = 0;
        // $campaign = new Campaign();
        // $campaign->target_fund     = $req->target_fund;
        // $campaign->ctype     = $req->campaigntype;
        // $campaign->description         = $req->description;
        // $campaign->image         = $path;
        // $campaign->publisedDate         = $req->publisedDate;
        // $campaign->endDate         = $req->enddate;
        // $campaign->title         = $req->title;
        // $campaign->status         = $value;
        // $campaign->raised_fund         = 0;
        // $campaign->uid         = Session::get('userid');
        
        // $campaign1 = new History();
        // $campaign1->target_fund     = $req->target_fund;
        // $campaign1->ctype     = $req->campaigntype;
        // $campaign1->description         = $req->description;
        // $campaign1->publisedDate         = $req->publisedDate;
        // $campaign1->endDate         = $req->enddate;
        // $campaign1->title         = $req->title;
        // $campaign1->raised_fund         = 0;
        // $campaign1->uid         = Session::get('userid');
        // $campaign1->save();
        // if($campaign->save()){
        //     return redirect()->route('home.campaignlist');
        // }else{
        //     return back();
        // }
    }

    
}



















