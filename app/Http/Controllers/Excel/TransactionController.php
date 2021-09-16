<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Exports\TransactionsExport;
use App\Imports\TransactionsImport;
use Excel;

class TransactionController extends Controller
{
    public function ImportExportView()
    {
        $transactions = Transaction::orderBy('id','DESC')->get();
        return view('admin.excel.index',compact('transactions'));
    }
    public function ExportExcel($type) 
    {
        return Excel::download(new TransactionsExport, 'transactions.'.$type);
    }
    public function ImportExcel(Request $request) 
    {
        Excel::import(new TransactionsImport,$request->import_file);

        $notification = array(
            'message' => 'Data Imported Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
