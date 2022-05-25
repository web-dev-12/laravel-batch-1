<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Bank;
use App\Models\MobileBanking;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('isWallet')->except(['create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::orderBy('id', 'DESC')->get();
        return view('wallets.list',compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wallet             = Wallet::select('wallet_type')->where('user_id','=',request()->session()->get('user'))->pluck('wallet_type');
        $bank_wallet        = Wallet::select('bank_id')->where(['wallet_type' => 2,'user_id'=> request()->session()->get('user')])->get();
        $mbk_wallet         = Wallet::select('mobile_bank_id')->where(['wallet_type' => 3,'user_id'=> request()->session()->get('user')])->get();
        

        $banks              = Bank::where('status','=', 1)->whereNotIn('id',$bank_wallet)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->whereNotIn('id',$mbk_wallet)->get();
        if(!$wallet)
        $wallet = null;
        return view('wallets.add',compact('banks','mobile_bankings','wallet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->toArray());die;
        $request->validate([
            'wallet_name'       => 'required',
            'amount'            => 'required',
            'wallet_type'       => 'required',
            'mobile_bank_id'    => 'required|unique:wallets,mobile_bank_id',
            'bank_id'           => 'required|unique:wallets,bank_id',  
        ]);
        $wallet                 = new Wallet();
        $wallet->wallet_name    = $request->wallet_name;
        $wallet->wallet_type    = $request->wallet_type;
        $wallet->amount         = $request->amount;
        $wallet->mobile_bank_id = $request->mobile_bank_id?$request->mobile_bank_id:null;
        $wallet->bank_id        = $request->bank_id?$request->bank_id:null;
        $wallet->user_id        = request()->session()->get('user');
        $wallet->save(); 
        return redirect()->route(currentUser().'.wallet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banks              = Bank::where('status','=', 1)->get();
        $mobile_bankings    = MobileBanking::where('status','=',1)->get();
        $wallet = Wallet::find($id);
        return view('wallets.edit',compact('wallet','banks','mobile_bankings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wallet = Wallet::find($id);
        $request->validate([
            'wallet_name'       => 'required',
            'amount'            => 'required',
            'mobile_bank_id'    => 'required|unique:wallets,mobile_bank_id,'.$wallet->id,
            'bank_id'           => 'required|unique:wallets,bank_id,'.$wallet->id,  
        ]);
        $wallet->wallet_name    = $request->wallet_name;
        $wallet->wallet_type    = $wallet->wallet_type;
        $wallet->amount         = $request->amount;
        $wallet->mobile_bank_id = $request->mobile_bank_id?$request->mobile_bank_id:null;
        $wallet->bank_id        = $request->bank_id?$request->bank_id:null;
        $wallet->user_id        = request()->session()->get('user');
        $wallet->save();
        return redirect()->route(currentUser().'.wallet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
