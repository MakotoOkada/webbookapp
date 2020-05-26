<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Member;
use App\Rental;
use App\Document;
use App\Catalog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\RentalReturnRequest;
use Validator;

class RentalReturnController extends Controller
{
    //岡田
    public function circulation(Request $request)
    {
        return view('circulation');
    }

    public function validate_check(Request $request)
    {
        $action = $request->get('action','next');
        $input = $request->except('action');
        if($action === 'next') {
            $rules_rental = [
                'user_id' => 'required|exists:members,user_id|integer',
            ];
        
            $message_rental = [
                'user_id.required' => '会員IDは必須です。',
                'user_id.exists' => 'この会員IDは登録されていません。',
                'user_id.integer' => '会員IDは整数で入力してください。',
            ];
            $validator = Validator::make($request->all(), $rules_rental, $message_rental);
    
            if ($validator->fails()) {
                return redirect('/circulation')
                ->withErrors($validator)
                ->withInput();
            }

            $no_member = DB::table('members')->select('user_deleteday')->where('user_id', $request->user_id)->first();
            if($no_member->user_deleteday !== NULL) {
                $validator->errors()->add('no_member', 'この会員IDは登録されていません。');
                    return redirect('/circulation')
                    ->withErrors($validator)
                    ->withInput();
            }
            $total_rental = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate',NULL)->count();
            $total = 5 - $total_rental;
            $data = $request->all();
            $request->session()->put($data);
            return view('/circulation_check', ['total' => $total,'user_id' => $request->user_id,'data' => $data]);
        } else if($action === 'next_last'){
            $rules_rental = [
                'catalog_id' => 'required|exists:documents,catalog_id|integer',
            ];
        
            $message_rental = [
                'catalog_id.required' => '資料IDを入力してください。',
                'catalog_id.exists' => 'この資料IDは登録されていません。',
                'catalog_id.integer' => '資料IDは整数で入力してください。',
            ];
            $validator = Validator::make($request->all(), $rules_rental,
            $message_rental);
    
            if ($validator->fails()) {
                return redirect('/circulation_check?user_id=' . $request->user_id)
                ->withErrors($validator)
                ->withInput();
            }

            $catalog = Document::find($request->catalog_id);
            //貸出中のもを借りないようにする処理
            $rental_returndate_value = DB::table('rentals')->select('rental_id')->where('catalog_id',$request->catalog_id)->orderBy('rental_id', 'desc')->first();
            //テーブルに何かしらデータがあるときの処理
            if($rental_returndate_value !== NULL) {
                $rental_returndate = DB::table('rentals')->select('rental_returndate')->where('rental_id', $rental_returndate_value->rental_id)->first();
                if(($rental_returndate->rental_returndate) === NULL) {
                    $validator->errors()->add('no_return', 'この資料IDはすでに借りられています。');
                        return redirect('/circulation_check?user_id=' . $request->user_id)
                        ->withErrors($validator)
                        ->withInput();
                }    
            }
            
            //借りる本が新刊本かそれ以外かを調べる処理
            $publication = DB::table('catalogs')->select('catalog_publication')->where('catalog_number', $catalog->catalog_number)->first();
            $dt_p = new Carbon($publication->catalog_publication);
            $dt_before3 = Carbon::today()->subMonth(3);
            if($dt_before3->lte($dt_p)) {
                $publication_day = 10;
            } else {
                $publication_day = 15;
            }
            $dt_now = Carbon::today();
            $rental_limitdate = $dt_now->addDays($publication_day)->toDateString();

            //借りる本をretalsテーブルに登録
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
            $total_rental = DB::table('rentals')->select('rental_returndate')->where('user_id',$request->user_id)->where('rental_returndate',NULL)->count();
            $total = 5 - $total_rental;
            $data = $request->all();
            $request->session()->put($data);
            return view('circulation_check', ['total' => $total,'user_id' => $request->user_id,'data' => $data]);
        } else if($action === 'next_last'){
            $catalog = Document::find($request->catalog_id);
            $publication = DB::table('catalogs')->select('catalog_publication')->where('catalog_number', $catalog->catalog_number)->first();
            $dt_p = new Carbon($publication->catalog_publication);
            $dt_before3 = Carbon::today()->subMonth(3);
            if($dt_before3->lte($dt_p)) {
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


    //吉川さん
    public function index(Request $request)
    {
        return view('returns.returns', ['msg'=>'資料IDを入力下さい。']);
    }
    public function post(Request $request)
    {
        //カタログIDが入力されているかチェック
        $rules = [
            'catalog_id' => 'required',
        ];

        $messages = [
            'catalog_id.required' => '資料IDを入力して下さい。',
        ];
        $validator = Validator::make($request->all(), $rules,
        $messages);

        if ($validator->fails()) {
            return redirect('/returns')
            ->withErrors($validator)
            ->withInput();
        }
        //資料テーブルにカタログIDが存在するかチェック
        $item = Document::where('catalog_id', $request->catalog_id)->first();
        if ($item === NULL) {
            $validator->errors()->add('no_catalog', 'この資料は存在しません。');
            return redirect('/returns')
            ->withErrors($validator)
            ->withInput();
        }
        //貸出台帳にカタログIDが存在するかチェック
        $item = Rental::where('catalog_id', $request->catalog_id)->whereNull('rental_returndate')->first();
        if ($item === NULL) {
            $validator->errors()->add('no_rental', 'この資料は貸し出されていません。');
            return redirect('/returns')
            ->withErrors($validator)
            ->withInput();
        }

        $rentals = DB::table('rentals')->select('rental_id')->where('catalog_id',$request->catalog_id)->orderBy('rental_id', 'desc')->first();
        DB::table('rentals')->where('rental_id',$rentals->rental_id)->update(['rental_returndate' => $request->rental_returndate]);

        //処理完了
        return view('returns.return_complete');
    }
}