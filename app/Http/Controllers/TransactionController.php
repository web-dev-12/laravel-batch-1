<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Wallet;
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
    /*For Expense */
    public function expTransaction(){
        $banks              = Bank::where('status','=', 1)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->get();
        $peoples            = People::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        $all_exp_cat        = ExpenseCategory::where('status','=', 1)->get();
        return view('transaction.add_exp',compact('banks','mobile_bankings','peoples','all_exp_cat'));
    }
    /*For Income */
    public function create()
    {
        $banks              = Bank::where('status','=', 1)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->get();
        $peoples            = People::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        $all_income_cat     = IncomeCategory::where('status','=', 1)->get();
        return view('transaction.add',compact('banks','mobile_bankings','peoples','all_income_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->toArray());
        if($request->source_id == 1)
        $wallet = Wallet::where(['user_id'=> Session::get('user'),'wallet_type' => $request->source_id])->orderBy('id', 'DESC')->first();
        elseif($request->source_id == 2)
        $wallet = Wallet::where(['user_id'=> Session::get('user'),'bank_id' => $request->source_cat_id])->orderBy('id', 'DESC')->first();
        else
        $wallet = Wallet::where(['user_id'=> Session::get('user'),'mobile_bank_id' => $request->source_cat_id])->orderBy('id', 'DESC')->first();

        /*Old balance */
        $wallet_new_bal = $wallet->amount;
        /*New Balance */
        $wallet_new_bal += $request->amount;

        /*Add To Wallet Table With Update Query */
        $update_wallet = Wallet::find($wallet->id);
        $update_wallet->amount = $wallet_new_bal;
        $update_wallet->save();

        //dd($wallet_bal);
        $transaction                    = new Transaction();
        $transaction->trans_date        = date('Y-m-d',strtotime($request->trans_date));
        $transaction->in_cat            = $request->in_cat;
        $transaction->source_id         = $request->source_id?$request->source_id:null;
        $transaction->source_cat_id     = $request->source_cat_id?$request->source_cat_id:null;
        $transaction->people_id         = $request->people_id?$request->people_id:null;
        $transaction->old_bal           = $wallet->amount;
        $transaction->amount            = $request->amount;
        $transaction->new_bal           = $wallet_new_bal;
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
    /*Income Edit */
    public function edit($id)
    {
        $banks              = Bank::where('status','=', 1)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->get();
        $peoples            = People::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        $all_income_cat     = IncomeCategory::where('status','=', 1)->get();
        $transaction = Transaction::find($id);
        return view('transaction.edit',compact('transaction','banks','mobile_bankings','peoples','all_income_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->toArray());
        $transaction = Transaction::find($id);
        if($transaction->source_id != $request->source_id)//check parent Wallet
        {
            if($request->source_bank_cat_id)
            $source_back_mbk_cat_id = $request->source_bank_cat_id;
            else
            $source_back_mbk_cat_id = $request->source_mbk_cat_id;
            
        
            /*Old Wallet Amunt Deduct */
            if($transaction->source_id == 2 ){
                $old_wall_bal = $this->get_wallet_balance($transaction->source_id,$transaction->bank_id);
            }elseif($transaction->source_id == 3){
                $old_wall_bal = $this->get_wallet_balance($transaction->source_id,$transaction->mobile_bank_id);
            }else
            $old_wal_bal = $this->get_wallet_balance($transaction->source_id,null);
            //echo $old_wal_bal->amount;

            /*New Wallet Amount Add */
            if($request->source_id){
                $new_wal_bal = $this->get_wallet_balance($request->source_id,$source_back_mbk_cat_id);
            }else
            $new_wal_bal = $this->get_wallet_balance($request->source_id,null);
            if(!empty($new_wal_bal))
            $new_wal_bal = $new_wal_bal->amount;
            else
            $new_wal_bal = 0;
            //echo  $new_wal_bal;


           

            /*Add To Wallet Table With Update Query */
            if($request->source_id == 1)
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'wallet_type' => $request->source_id])->orderBy('id', 'DESC')->first();
            elseif($request->source_id == 2)
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'bank_id' => $request->source_bank_cat_id])->orderBy('id', 'DESC')->first();
            else
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'mobile_bank_id' => $request->source_mbk_cat_id])->orderBy('id', 'DESC')->first();
dd($wallet);die;
            $update_wallet = Wallet::find($wallet->id);
            $update_wallet->amount = $wallet_new_bal;
            $update_wallet->save();

        }
        //dd($transaction);
        $transaction->trans_date        = date('Y-m-d',strtotime($request->trans_date));
        $transaction->in_cat            = $request->in_cat;
        $transaction->source_id         = $request->source_id?$request->source_id:null;
        $transaction->source_bank_cat_id    = $request->source_bank_cat_id?$request->source_bank_cat_id:null;
        $transaction->source_cat_id         = $request->source_mbk_cat_id?$request->source_mbk_cat_id:null;
        $transaction->people_id         = $request->people_id?$request->people_id:null;
        /*$transaction->old_bal           = $wallet->amount;
        $transaction->amount            = $request->amount;
        $transaction->new_bal           = $wallet_new_bal;*/
        $transaction->note              = $request->note;
        $transaction->user_id           = request()->session()->get('user');
        $transaction->save(); 
        //return redirect()->route(currentUser().'.transaction.index');
    }
    public function get_wallet_balance($wallet_type,$wallet_cat_type){
        /*echo $wallet_type;
        echo $wallet_cat_type;die();*/
        if($wallet_type == 1)
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'wallet_type' => $wallet_type])->orderBy('id', 'DESC')->first();
        elseif($wallet_type == 2)
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'bank_id' => $wallet_cat_type])->orderBy('id', 'DESC')->first();
        else
            $wallet = Wallet::where(['user_id'=> Session::get('user'),'mobile_bank_id' => $wallet_cat_type])->orderBy('id', 'DESC')->first();
        if($wallet)
        return  $wallet;
        
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
