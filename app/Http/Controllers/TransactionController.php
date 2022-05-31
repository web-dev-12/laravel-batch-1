<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\MobileBanking;
use App\Models\People;
use App\Models\IncomeCategory;
use App\Models\ExpenseCategory;
use Session;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('isWallet');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        //dd($transactions);
        return view('transaction.list',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks              = Bank::where('status','=', 1)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->get();
        $peoples            = People::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        $all_income_cat     = IncomeCategory::where('status','=', 1)->get();
        $all_exp_cat        = ExpenseCategory::where('status','=', 1)->get();
        return view('transaction.add',compact('banks','mobile_bankings','peoples','all_income_cat','all_exp_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction                    = new Transaction();
        $transaction->trans_date        = $request->trans_date;
        $transaction->trans_type        = $request->trans_type;
        $transaction->exp_cat           = $request->exp_cat?$request->exp_cat:null;
        $transaction->in_cat            = $request->in_cat?$request->in_cat:null;
        $transaction->source_id         = $request->source_id?$request->source_id:null;
        $transaction->source_cat_id     = $request->source_cat_id?$request->source_cat_id:null;
        $transaction->people_id         = $request->people_id?$request->people_id:null;
        $transaction->amount            = $request->amount;
        $transaction->note              = $request->note;
        $transaction->user_id           = request()->session()->get('user');
        $transaction->save(); 
        return redirect()->route(currentUser().'.transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
