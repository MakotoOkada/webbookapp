<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Member;
use App\Rental;
use App\Document;
use App\Catalog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentalReturnController extends Controller
{
    public function circulation(Request $request)
    {
        return view('circulation');
    }

    public function rental(Request $request)
    {
        if($_POST['next']){
            $member = Member::find($request->user_id);
            if(empty($member)) {
                return view('circulation');
            } else {
                $rental = Rental::find($request->user_id);
                if(empty($rental)) {
                    $total = 5;
                } else {
                    $total_document = DB::table('rentals')->select('catalog_id')->where('user_id',$request->user_id)->count();
                    $total_return = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate','!=',NULL)->count();
                    $total_rental = intval($total_document) - intval($total_return);
                    $total = 5 - $total_rental;
                }
                return view('circulation', ['total' => $total,'user_id' => $request->user_id]);
            }
        } else if($_POST['next_last']) {
            $catalog = DB::table('documents')->select('catalog_number')->where('catalog_id',$request->catalog_id)->first();
            $publication = DB::table('catalogs')->select('catalog_publication')->where('catalog_number',$catalog)->first();
            $dt_p = new Carbon($publication);
            $dt_now = Carbon::today();
            $dt_after3 = $dt_now->subMonth(3);
            if($dt_after3->lte($dt_p)) {
                $publication_day = 10;
            } else {
                $publication_day = 15;
            }
            $rental_limitdate = $dt_now->addDays($publication_day);

            $rental = new Rental;
            $rental->user_id = $request->user_id;
            $rental->catalog_id = $request->catalog_id;
            $rental->rental_loandate = $request->rental_loandate;
            $rental->rental_limitdate = $rental_limitdate;
            unset($rental['_token']);
            $rental->save();
            $items = DB::table('documents')->select('catalogs.catalog_name','rentals.rental_returndate')->join('catalogs','documents.catalog_number','=','catalogs.catalog_number')->join('rentals','documents.catalog_id','=','rentals.catalog_id')->where('catalog_id',$request->catalog_id)->get();
            return view('circulation_complete',['items' => $items]);
            return redirect('circulation_complete',['user_id' => $user_id,'data' => $data]);
        }
        
    }
}
