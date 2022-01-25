<?php

namespace App\Http\Controllers;

use App\Models\ProductionSupplierItem;
use Illuminate\Http\Request;

class ProductionSupplierItemController extends Controller
{
    public function destroy($id)
    {
        ProductionSupplierItem::find($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
