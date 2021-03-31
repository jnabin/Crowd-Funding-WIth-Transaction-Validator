<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use App\Models\Bookmark;
use App\Models\CampaignHistory;
use Session;

class HomeController extends Controller
{
    public function index(Request $req){
        $id = 123;
        $name = $req->session()->get('username');
        return view('home.index', compact('id', 'name'));
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


    public function campaignlist(){
        $campaigns  = Campaign::all();
        return view('home.campaignlist')->with('campaigns', $campaigns);
    }

    public function bookmarkslist(){
        $campaigns  = Campaign::all();
        $bookmark = DB::table('campaign_history')
            ->join('bookmarks', 'campaign_history.id', '=', 'bookmarks.cid')
            ->select('campaign_history.title', 'campaign_history.discription', 'campaign_history.raised_fund', 'campaign_history.ctype', 'bookmarks.UpdatedDate', 'bookmarks.id')
            ->get();
        return view('home.bookmarkslist', compact('bookmark'));
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

