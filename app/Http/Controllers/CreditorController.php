<?php

namespace App\Http\Controllers;

use App\Models\Creditor;
use App\Models\People;
use Illuminate\Http\Request;
use Session;

class CreditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_creditors = Creditor::all();
        return view('creditors/list',compact('list_creditors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $creditors = People::where(['status' => 1 , 'type' => 2])->get();
       return view('creditors/add',compact('creditors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $creditor = People::where(['user_id'=> Session::get('user'),'id' => $request->creditor_id])->orderBy('id', 'DESC')->first();

        /* ==== old  amount */
        $old_creditor_amount = $creditor->due_amount;
        /* ==== new  amount */
        $new_creditor_amount =  $old_creditor_amount + $request->amount;

        /*====Updated peaple list due amount==== */

        $update_people_amount = People::find($creditor->id);
        $update_people_amount->due_amount = $new_creditor_amount;
        $update_people_amount->save();


        $add_creditor = new Creditor();
        $add_creditor->creditor_id = $request->creditor_id;
        $add_creditor->old_amount =  $old_creditor_amount;
        $add_creditor->amount = $request->amount;
        $add_creditor->new_amount =  $new_creditor_amount;
        $add_creditor->status = 1;
        $add_creditor->save();
        return redirect(route(currentUser().'.creditor.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Creditor  $creditor
     * @return \Illuminate\Http\Response
     */
    public function show(Creditor $creditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Creditor  $creditor
     * @return \Illuminate\Http\Response
     */
    public function edit(Creditor $creditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Creditor  $creditor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creditor $creditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Creditor  $creditor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creditor $creditor)
    {
        //
    }
}
