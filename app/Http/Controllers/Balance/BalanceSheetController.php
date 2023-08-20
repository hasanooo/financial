<?php

namespace App\Http\Controllers\Balance;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Liability;
use App\Models\Share;
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
        $notification = array(
            'message' => "Asset Added successfully",
            'alert-type' => 'success'
         );
        return redirect()->route('assets.index')->with($notification);
    }

    public function AssetDelete($id)
    {
        $asset = Asset::findOrFail($id);
        $asset->delete();
        $notification = array(
            'message' => "Asset Deleted successfully",
            'alert-type' => 'warning'
         );
        return back()->with($notification);
    }

    public function AssetEditPage($id)
    {
        $asset = Asset::findOrFail($id);
        return view('Admin.asset.editpage',compact('asset'));
    }

    public function AssetEditSubmit(Request $request, $id)
    {

        $asset = Asset::findOrFail($id);
        $asset->date = $request->date;
        $asset->category = $request->category;
        $asset->name = $request->name;
        $asset->amount = $request->amount;
        $asset->details = $request->details;
        $asset->update();
        $notification = array(
            'message' => "Asset Edited successfully",
            'alert-type' => 'success'
         );
         return redirect()->route('assets.index')->with($notification);
    }

    public function LiabilityIndex()
    {
        $liabilities = Liability::all();
        return view('Admin.liability.index',compact('liabilities'));
    }
    public function LiabilityAddPage()
    {
        return view ('Admin.liability.addpage');
    }

    public function LiabilitySubmit(Request $request){
        $liability = new Liability();
        $liability->date = $request->date;
        $liability->category = $request->category;
        $liability->name = $request->name;
        $liability->amount = $request->amount;
        $liability->details = $request->details;
        $liability->save();
        $notification = array(
            'message' => "Liability Added successfully",
            'alert-type' => 'success'
         );
        return redirect()->route('liability.index')->with($notification);
    }
    public function LiabilityDelete($id)
    {
        $liability = Liability::findOrFail($id);
        $liability->delete();
        $notification = array(
            'message' => "Liability Deleted successfully",
            'alert-type' => 'warning'
         );
        return back()->with($notification);
    }

    public function LiabilityEditPage($id)
    {
        $liability = Liability::findOrFail($id);
        return view('Admin.liability.editpage',compact('liability'));
    }
    public function LiabilityEditSubmit(Request $request, $id)
    {

        $liability = Liability::findOrFail($id);
        $liability->date = $request->date;
        $liability->category = $request->category;
        $liability->name = $request->name;
        $liability->amount = $request->amount;
        $liability->details = $request->details;
        $liability->update();
        $notification = array(
            'message' => "Liability Edited successfully",
            'alert-type' => 'success'
         );
         return redirect()->route('liability.index')->with($notification);
    }

    public function BalanceSheet()
    {
        $asset = Asset::where('status','active')->pluck('amount')->sum();
        $liability = Liability::where('status','active')->pluck('amount')->sum();
        $share = Share::where('status','active')->pluck('amount')->sum();
        return view('Admin.asset.report',compact('asset','liability','share'));
    }

    public function ShareIndex()
    {
        $shares = Share::all();
        return view('Admin.share.index',compact('shares'));
    }
    public function ShareAddPage()
    {
        return view ('Admin.share.addpage');
    }

    public function ShareSubmit(Request $request){
        $share = new Share();
        $share->date = $request->date;
        $share->category = $request->category;
        $share->name = $request->name;
        $share->phone = $request->phone;
        $share->address = $request->address;
        $share->amount = $request->amount;
        $share->terms = $request->term;
        $share->save();
        $notification = array(
            'message' => "Share Added successfully",
            'alert-type' => 'success'
         );
        return redirect()->route('share.index')->with($notification);
    }

}
