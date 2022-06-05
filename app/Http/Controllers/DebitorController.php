<?php

namespace App\Http\Controllers;

use App\Models\Debitor;
use Illuminate\Http\Request;
use App\Models\People;
use Session;

class DebitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples            = People::where(['user_id' => Session::get('user'), 'type' => 1,])->orderBy('id', 'DESC')->get();
        return view('debitor.list',compact('peoples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // where([
        //     'user_id' => Session::get('user'),
        //     'type' => 1,
        // ])
        $peoples            = People::where(['user_id' => Session::get('user'), 'type' => 1,])->orderBy('id', 'DESC')->get();
        return view('debitor.show',compact('peoples'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debitor  $debitor
     * @return \Illuminate\Http\Response
     */
    public function show(Debitor $debitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debitor  $debitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::find($id);
        return view('debitor.edit',compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debitor  $debitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $people                     = People::find($id);
        $people->last_installment       = $request->last_installment;
        $people->current_due            = $request->current_due - $request->last_installment;
        $people->save(); 
        return redirect()->route(currentUser().'.debitor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debitor  $debitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debitor $debitor)
    {
        //
    }
}
