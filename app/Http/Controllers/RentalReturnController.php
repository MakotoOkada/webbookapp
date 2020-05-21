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

    public function rental_check(Request $request)
    {
        $this->validate($request, Member::$rules_rental, Member::$message_rental);
        $member = Member::find($request->user_id);
        $rental = Rental::find($request->user_id);
        if(empty($rental)) {
            $total = 5;
        } else {
            $total_document = DB::table('rentals')->select('catalog_id')->where('user_id',$request->user_id)->count();
            $total_return = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate','!=',NULL)->count();
            $total_rental = intval($total_document) - intval($total_return);
            $total = 5 - $total_rental;
        }
        $data = $request->all();
        $request->session()->put($data);
        return view('circulation_check', ['total' => $total,'user_id' => $request->user_id,'data' => $data]);
    }

    public function rental(Request $request)
    {
        $action = $request->get('action','next');
        $input = $request->except('action');
        $data = $request->all();
        $request->session()->put($data);
        if($action === 'next') {
            return redirect('/circulation',['user_id' => $request->user_id,'data' => $data]);
        } else if($action === 'next_last'){
            $this->validate($request, Document::$rules_rental, Document::$message_rental);
            $catalog_id_value = DB::table('rentals')->select('catalog_id')->where('catalog_id',$request->catalog_id);
            $rental_returndate_value = DB::table('rentals')->select('rental_returndate')->where('catalog_id',$request->catalog_id);
            if(isset($catalog_id_value) && empty($rental_returndate_value)){
                $this->validate($request, Rental::$rules_rental, Rental::$message_rental);
            }
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
            $dt_now = Carbon::today();
            $rental_limitdate = $dt_now->addDays($publication_day)->toDateString();

            $rental = new Rental;
            $rental->user_id = $request->user_id;
            $rental->catalog_id = $request->catalog_id;
            $rental->rental_loandate = $request->rental_loandate;
            $rental->rental_limitdate = $rental_limitdate;
            unset($rental['_token']);
            $rental->save();
            $items = DB::table('documents')->select('catalogs.catalog_name','rentals.rental_limitdate')->join('catalogs','documents.catalog_number','=','catalogs.catalog_number')->join('rentals','documents.catalog_id','=','rentals.catalog_id')->where('documents.catalog_id',$request->catalog_id)->get();
            return view('circulation_complete',['items' => $items]);
        }
    }
}
