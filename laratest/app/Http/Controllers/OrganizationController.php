<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\GenerateRequest;
use App\Http\Requests\BookmarkRequest;
use Validator;
use App\Models\Login;
use App\Models\Campaign;
use App\Models\Report;
use App\Models\History;
use App\Models\Bookmark;
use App\Models\CampaignHistory;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Contract;
use Carbon\Carbon;
use GuzzleHttp\Client;

class OrganizationController extends Controller
{
    public function getFromNode()
    {
       
        $client = new Client();
        $response = $client->request('get', 'http://localhost:3000/api/getFromNode');
        $responsex = json_decode($response->getBody());
        return view('organization.showfromapi', compact('responsex'));
    }

    public function profile()
    {   $id = Session::get('userid');
        $data = Login::find($id)->first();;
        return view('organization.profile', $data);
    }

    public function create(){
        return view('organization.create');
    }

    public function createfb($id){
        $bookmark = DB::table('campaign_history')
            ->join('bookmarks', 'campaign_history.id', '=', 'bookmarks.cid')
            ->select('campaign_history.*')
            ->where('bookmarks.id', '=', $id)
            ->get();
                echo '<script>';
   echo 'console.log('. json_encode( $bookmark ) .')';
  echo '</script>';
        return view('organization.createFromBookmarks')->with('bookmark', $bookmark);
    }
    
    public function store(UserRequest $req){
        if($req->hasFile('myfile')){
            $file = $req->file('myfile');
            $imageName = date("h-i-sa").'.'.$file->getClientOriginalName();
            $path = $file->move('upload\image', $imageName);
        }
        $contract = new Contract($req->target_fund, $req->campaigntype, $req->description, $path, $req->title,$req->enddate);
    }

    public function show($id){
        //$user = $id
    	$campaign = Campaign::where('id', $id)->first();
        return view('organization.show', $campaign);
    }

    public function edit($id){
        $campaign = Campaign::find($id);       
        return view('organization.edit', $campaign);
    }

    public function update($id, EditRequest $req){

        $campaign = Campaign::find($id); 
        $campaign->target_fund     = $req->target_fund;
        $campaign->ctype     = $req->campaigntype;
        $campaign->description         = $req->description;
        $campaign->endDate         = $req->enddate;
        $campaign->title         = $req->title;
        $campaign->save();
        return redirect()->route('home.campaignlist');
    }

    public function delete($id){
        $campaign = Campaign::find($id)->first();       
        return view('organization.delete', $campaign);
    }
    public function dashboard(){
        $reports = DB::table('reports')
        ->join('campaigns', 'reports.cid', '=', 'campaigns.id')
        ->select('campaigns.title', 'reports.cid', 'reports.description', 'reports.id', 'reports.updatedDate')
        ->get();       
        return view('organization.dashboard', compact('reports'));
    }
    public function deletedash($id){
        $res=Report::where('id',$id)->delete();
        if($res){
            return redirect()->route('organization.dashboard');
        }else{
            echo "error";
        }
        
    }
    public function report($id){
        $campaign = Campaign::find($id);       
        return view('organization.report', $campaign);
    }
    public function reported(ReportRequest $req, $id){
        $report = new Report();
        $report->cid     = $id;
        $report->uid     = Session::get('userid');;
        $report->updatedDate     = Carbon::now();
        $report->description         = $req->Description;
        if($report->save()){
            return redirect()->route('home.campaignlist');
        }else{
            return back();
        }
        
    }

    public function bookmark($cid){
        $campaign = Campaign::where('id', $cid)->first();
        $campaignH = CampaignHistory::where('title', $campaign->title)->first();
        if((!empty($campaignH)) > 0){
            Session::flash('msg1', '**already Bookmarked!');
            return redirect()->route('home.campaignlist');
        }else{
            $campaignH = new CampaignHistory();
            $campaignH->target_fund     = $campaign->target_fund;
            $campaignH->ctype     = $campaign->ctype;
            $campaignH->discription         = $campaign->description;
            $campaignH->publisedDate         = $campaign->publisedDate;
            $campaignH->image         = $campaign->image;
            $campaignH->endDate         = $campaign->endDate;
            $campaignH->title         = $campaign->title;
            $campaignH->raised_fund         = $campaign->raised_fund;
            $campaignH->uid         = $campaign->uid;
            $campaignH->save();
            $bookmark = new Bookmark();
            $bookmark->cid     = $campaignH->id;
            $bookmark->uid     = Session::get('userid');
            $bookmark->updatedDate     = date("Y-m-d");
            if($bookmark->save()){
                Session::flash('msg', '**Bookmarked successfully!');
                return redirect()->route('home.bookmarkslist');
            }else{
                return back();
            }
        }
        
    }

    public function destroy($id){
        $res=Campaign::where('id',$id)->delete();
        if($res){
            return redirect()->route('home.campaignlist');
        }else{
            echo "error";
        }
        
    }

    public function generateReport(){
        return view('organization.generateReport');
    }


public function displayReport(Request $request)
{
    $userReports = null;
    $CampaignReports = null;
    if($request->inlineRadioOptions === 'User_Report'){
    $request->session()->flash('repo1');
    $fromDate = strtotime($request->input('from_date'));
    $newfromDate = date('Y-m-d',$fromDate);
    $toDate = strtotime($request->input('to_date'));
    $newtoDate = date('Y-m-d',$toDate);
    $userReports = DB::table('users')
            ->join('donation', 'donation.uid', '=', 'users.id')
            ->whereBetween('donation.date', [$newfromDate, $newtoDate])
            ->orderBy('amount', 'DESC')
            ->get();  
    }elseif($request->inlineRadioOptions === 'donations_Report'){
        $request->session()->flash('repo2');
        $CampaignReports = DB::table('users')
                ->join('donation', 'donation.uid', '=', 'users.id')
                ->orderBy('amount', 'DESC')
                ->get()
                ->take(10);  
    }
    $pdf = PDF::loadView('organization.reportView',compact('userReports','CampaignReports'));
    return $pdf->download('reports.pdf');
}
}

