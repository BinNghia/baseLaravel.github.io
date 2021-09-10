<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\BillDetail;
use App\Bills;
use App\Products;

class BillDetailController extends Controller
{
    //
    public function getIndex($id, $id_bill, $id_product) {
        $bill_detail = BillDetail::find($id);

        return redirect('admin/bills/bill_detail/'.$id_bill);
    }
}
