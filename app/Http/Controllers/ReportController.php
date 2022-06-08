<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use PDF;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transaction_report(){
        $transaction = Transaction::orderBy('id','desc')->get();
        return view('report.index');
        //dd($transaction);
    }
    public function transaction_report_by_search(Request $request){
 
            $convert_date = explode("-",$request->date_range);
            $from =  date("Y-m-d",strtotime($convert_date[0]));
            $to =  date("Y-m-d",strtotime($convert_date[1]));
            $search_data = Transaction::whereBetween('trans_date', [$from, $to])->get();
    //return view('pdf_view',compact('search_data'));
    $pdf = PDF::loadView('pdf_view',compact('search_data'));
	 $pdf->download('document.pdf');
     return view('pdf_view',compact('search_data'));
    
        }
       
        
        
}
