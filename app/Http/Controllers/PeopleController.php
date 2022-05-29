<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Session;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peoples = People::where('user_id','=',Session::get('user'))->orderBy('id', 'DESC')->get();
        return view('peoples.list',compact('peoples'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('peoples.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$request->validate([
            
        ]);*/
        $people                 = new People();
        $people->p_name         = $request->p_name;
        $people->phone          = $request->phone;
        $people->due_amount     = $request->due_amount;
        $people->type           = $request->type;
        $people->note           = $request->note;
        $people->user_id        = request()->session()->get('user');
        $people->save(); 
        return redirect()->route(currentUser().'.people.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $people = People::find($id);
        return view('peoples.edit',compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $people                 = People::find($id);
        $people->p_name         = $request->p_name;
        $people->phone          = $request->phone;
        $people->due_amount     = $request->due_amount;
        $people->type           = $request->type;
        $people->note           = $request->note;
        $people->user_id        = request()->session()->get('user');
        $people->save(); 
        return redirect()->route(currentUser().'.people.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = People::find($id);
        $people->status = 2;
        $people->save();
        return redirect()->route(currentUser().'.people.index');
    }
}
