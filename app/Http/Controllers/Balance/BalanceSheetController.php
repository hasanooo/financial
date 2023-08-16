<?php

namespace App\Http\Controllers\Balance;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\Http\Request;

class BalanceSheetController extends Controller
{
    public function AssetIndex()
    {
        $assets = Asset::all();
        return view('Admin.asset.index',compact('assets'));
    }
    public function AssetAddPage()
    {
        return view ('Admin.asset.addpage');
    }
    public function AssetSubmit(Request $request)
    {
        $asset = new Asset();
        $asset->date = $request->date;
        $asset->category = $request->category;
        $asset->name = $request->name;
        $asset->amount = $request->amount;
        $asset->details = $request->details;
        $asset->save();
        return redirect()->route('assets.index');
    }
}
