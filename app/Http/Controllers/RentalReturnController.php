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

    public function validate_check1(Request $request)
    {
        $total_rental = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate',NULL)->count();
        $total = 5 - $total_rental;
        $this->validate($request, Member::$rules_rental, Member::$message_rental);
        $data = $request->all();
        $request->session()->put($data);
        return view('/circulation_check', ['total' => $total,'user_id' => $request->user_id,'data' => $data]);
    }

    public function rental_check(Request $request)
    {
        $total_rental = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate',NULL)->count();
        $total = 5 - $total_rental;
        $data = $request->all();
        $request->session()->put($data);
        return view('circulation_check', ['total' => $total,'user_id' => $request->user_id,'data' => $data]);
    }

    public function validate_check2(Request $request)
    {
        $action = $request->get('action','next');
        $input = $request->except('action');
        if($action === 'next') {
            return redirect()->action('RentalReturnController@validate_check1')->withInput($input);
        } else if($action === 'next_last'){
            $this->validate($request, Document::$rules_rental, Document::$message_rental);
            $catalog = Document::find($request->catalog_id);
            $rental_returndate_value = DB::table('rentals')->select('rental_id')->where('catalog_id',$request->catalog_id)->get();
            $max_rental_id = $rental_returndate_value->max('rental_id');
            $rental_returndate = DB::table('rentals')->select('rental_returndate')->where('rental_id', $max_rental_id)->first();
            if(($rental_returndate->rental_returndate) === NULL) {
                $this->validate($request, Rental::$rules_rental, Rental::$message_rental);
            }
            $publication = DB::table('catalogs')->select('catalog_publication')->where('catalog_number', $catalog->catalog_number)->first();
            $dt_p = new Carbon($publication->catalog_publication);
            $dt_after3 = Carbon::today()->subMonth(3);
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
            $item = DB::table('rentals')->select('rental_limitdate')->where('rental_id',$rental->rental_id)->first();
            return view('circulation_complete',['item' => $item]);
        }
    }

    public function rental(Request $request)
    {
        $action = $request->get('action','next');
        $input = $request->except('action');
        if($action === 'next') {
            return redirect()->action('RentalReturnController@circulation')->withInput($input);
        } else if($action === 'next_last'){
            $catalog = Document::find($request->catalog_id);
            $publication = DB::table('catalogs')->select('catalog_publication')->where('catalog_number', $catalog->catalog_number)->first();
            $dt_p = new Carbon($publication->catalog_publication);
            $dt_after3 = Carbon::today()->subMonth(3);
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
            $item = DB::table('rentals')->select('rental_limitdate')->where('rental_id',$rental->rental_id)->first();
            return view('circulation_complete',['item' => $item]);
        }
    }
}