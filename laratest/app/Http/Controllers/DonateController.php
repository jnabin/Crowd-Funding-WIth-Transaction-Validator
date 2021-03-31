<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DonateRequest;
use Validator;
use App\Models\Report;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Login;
use App\Models\history;
use Illuminate\Support\Facades\DB;
use App\Models\Bookmark;
use App\Models\CampaignHistory;
use Session;
use App\Http\Requests\ReportRequest;

class DonateController extends Controller
{
    public function index(Request $req){
        $campaigns  = Campaign::all();
        return view('donate.index')->with('campaigns', $campaigns);
    }

    public function search(Request $request)
    {
        if(strlen($request->search)>0){
        
        if($request->ajax())
        {
            $output="";
            $campaigns=DB::table('campaigns')->where('title','LIKE','%'.$request->search."%")->get();
            if($campaigns)
            {
            foreach ($campaigns as $key => $campaign) {
            $output.='<tr>'.
            '<td>'.$campaign->id.'</td>'.
            '<td>'.$campaign->title.'</td>'.
            '<td>'.$campaign->ctype.'</td>'.
            '<td>'.$campaign->description.'</td>'.
            '<td>'.$campaign->raised_fund.'</td>'.
            '</tr>';
            }
            return Response($output);
            }
        }
    }
    }
    public function donation($id){
        $campaigns  = Campaign::find($id);
        return view('donate.donation', $campaigns);
    }

    public function storedonation(DonateRequest $req, $id){
        $value = DB::table('campaigns')->where('id', $id)->first();
        $value1 = DB::table('history')->where('title', $value->title)->first();
        $w = (int)$req->donation;
        $w1 = (int)$value->raised_fund;
        $sum = $w+$w1;
        
            $affected = DB::table('campaigns')
        ->where('id', $id)
        ->update(['raised_fund' => $sum]);
        if($affected){
            $value23 = DB::table('users')->where('id', Session::get('userid'))->first();
            $tamount = $w + (int)$value23->donateAmount;
            $userDonateAmount = DB::table('users')
            ->where('id', Session::get('userid'))
            ->update(['donateAmount' => $tamount]);
            
            $donation = new Donation();
            
            $donation->cid     = $value1->id;
            $donation->uid     = Session::get('userid');;
            $donation->amount     = $req->donation;
            $donation->date         = date("Y-m-d");
            $donation->save();
            return redirect()->route('donate.index');
        }
        
    }

    public function report($id){
        $campaign = Campaign::find($id);       
        return view('donate.report', $campaign);
    }
    public function reported(ReportRequest $req, $id){
        $report = new Report();
        $report->cid     = $id;
        $report->uid     = Session::get('userid');;
        $report->updatedDate     = date("Y-m-d");
        $report->description         = $req->Description;
        if($report->save()){
            return redirect()->route('donate.index');
        }else{
            return back();
        }
        
    }

    public function bookmarkslist(){
        $campaigns  = Campaign::all();
        $bookmark = DB::table('campaign_history')
            ->join('bookmarks', 'campaign_history.id', '=', 'bookmarks.cid')
            ->select('campaign_history.title', 'campaign_history.discription', 'campaign_history.raised_fund', 'campaign_history.ctype', 'bookmarks.UpdatedDate', 'bookmarks.id')
            ->get();
        return view('home.bookmarkslist')->with('bookmark', $bookmark);
    }

    public function delete($id){
        $camHis = DB::table('bookmarks')
                    ->where('id', $id)
                    ->first();
        $res=CampaignHistory::where('id',$camHis->cid)->delete();
        if($res){
            Session::flash('msg2', '**deleted successfully!');
            return redirect()->route('home.bookmarkslist');
        }else{
            echo "$res2";
        }
        
    }

}

