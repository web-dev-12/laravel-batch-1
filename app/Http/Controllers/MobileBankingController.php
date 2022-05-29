<?php

namespace App\Http\Controllers;

use App\Models\MobileBanking;
use Illuminate\Http\Request;

class MobileBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mbks = MobileBanking::all();   
        return view('mobiles.list_mbl',compact('mbks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobiles.add_mbl');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mbk_name'          => 'required',

        ]);
        $mobileBanking                   = new mobileBanking();
        $mobileBanking->mbk_name             = $request->mbk_name;
       
        $mobileBanking->status           = 1; 
        $mobileBanking->save(); 
        
        return redirect(route(currentUser().'.mobilebanking.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function show(MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileBanking $mobileBanking)
    {
        //
    }
}
