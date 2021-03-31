<?php

namespace App;
use Illuminate\Http\Request;
use App\Models\TransactionLog;
use Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
class Contract

{
   private $target_fund;
   private $ctype;
   private $description;
   private $image;
   private $title;
   private $user_id;
   private $endDate;
   private $issueDate;
   private $identity;
   
   function __construct($target_fund, $ctype, $description, $image, $title, $endDate) {
    $this->target_fund = $target_fund;
    $this->ctype = $ctype;
    $this->description = $description;
    $this->image = $image;
    $this->title = $title;
    $this->user_id = Session()->get('userid');
    $this->endDate = $endDate;
    $this->issueDate = date("Y-m-d");
    $this->indentity = hash('md5', 'advance validation system.');
    $this->store();
  }

  private function store(){
        $transactionLog = new TransactionLog();
        $transactionLog->target_fund     = $this->target_fund;
        $transactionLog->ctype     = $this->ctype;
        $transactionLog->description         = $this->description;
        $transactionLog->image         = $this->image;
        $transactionLog->issueDate         = $this->issueDate;
        $transactionLog->EndDate         = $this->endDate;
        $transactionLog->title         = $this->title;
        $transactionLog->userid         = $this->user_id;
        $transactionLog->identity         = $this->indentity;
        if($transactionLog->save()){
            $client = new Client();
            $response = $client->request('post', 'http://localhost:3000/api/postFromNode', [
                'form_params' => [
                    'id' =>  $transactionLog->id,
                    'target_fund' => $this->target_fund,
                    'ctype' => $this->ctype,
                    'imagew' => $this->image,
                    'description' => $this->description,
                    'issueDate' => $this->issueDate,
                    'EndDate' => $this->endDate,
                    'title' => $this->title,
                    'userid' => $this->user_id,
                    'identity' => $this->indentity
                ]
            ]);
            //$responsex = json_decode($response->getBody());
            return view('home.campaignlist');
        }else{
            return back();
        }
    }


}