<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $expenses = ExpenseCategory::orderBy('id','DESC')->get();
        return view('expense/list_expense',compact('expenses'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        return view('expense/add_expense');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense_cat = new ExpenseCategory();
        $expense_cat->expense_cat = $request->expense_cat;
        $expense_cat->status = 1;
        $expense_cat->save();
        return redirect(route(currentUser().'.expense.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $edit_expense = ExpenseCategory::find($id);
         return view ('expense/edit_expense',compact('edit_expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_expense = ExpenseCategory::find($id);
        $update_expense->expense_cat = $request->expense_cat;
        $update_expense->save();
        return redirect(route(currentUser().'.expense.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inactive = ExpenseCategory::find($id);
        $inactive->status = 2;
        $inactive->save();
        return redirect(route(currentUser().'.expense.index'));
    }
}