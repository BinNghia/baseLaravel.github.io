<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bills;
use Illuminate\Support\Facades\Auth;

class BillsController extends Controller
{
    //
    public function getIndex()
    {
        $bills = Bills::all();
        return view('admin.bills.list', ['bills' => $bills]);
    }

    public function getDetail($id)
    {
        $bills = Bills::Find($id);
        return view('admin.bills.bill_detail', ['bills' => $bills]);
    }
}
