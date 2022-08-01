<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function divisionView()
    {
        $division = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.view_devision', compact('division'));
    }

    public function divisionStore(Request $request)
    {
        $request->validate([
            'division_name' => 'required',
            ]);

        ShipDivision::create([
            'division_name' => $request->division_name

        ]);
        $notification = [
            'message' => 'Division created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function divisionEdit($id)
    {
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.edit_division', compact('divisions'));
    }

    public function divisionUpdate(Request $request, $id)
    {
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name

        ]);
        $notification = [
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-division')->with($notification);
    }

    public function divisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();
        $notification = [
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function districtView()
    {
        $district = ShipDistrict::orderBy('id', 'DESC')->get();
        $divisions = ShipDivision::orderBy('id', 'ASC')->get();
        return view('backend.district.view_district', compact('divisions', 'district'));
    }

    public function districtStore(Request $request)
    {
        $request->validate([
            'district_name' => 'required',
            'division_id'  => 'required'
            ]);

        ShipDistrict::create([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name

        ]);
        $notification = [
            'message' => 'District created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function districtEdit($id)
    {
        $divisions = ShipDivision::orderBy('id', 'ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.district.edit_district', compact('divisions', 'district'));
    }

    public function districtUpdate(Request $request, $id)
    {
        ShipDistrict::findOrFail($id)->update([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id
        ]);
        $notification = [
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-district')->with($notification);
    }

    public function districtDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();
        $notification = [
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function stateView()
    {
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $states = ShipState::orderBy('id', 'DESC')->get();
        return view('backend.state.view_state', compact('divisions', 'district', 'states'));
    }

    public function getdivision($division_id)
    {
        $data = ShipDistrict::where('division_id', $division_id)->get();

        return json_encode($data);
    }

    public function stateStore(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required'
        ]);

        ShipState::create([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name'  => $request->state_name
        ]);

        $notification = [
            'message' => 'State Created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function stateEdit($id)
    {
        $district = ShipDistrict::orderBy('district_name', 'ASC')->get();
        $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
        $states = ShipState::findOrFail($id);
        return view('backend.state.edit_state', compact('district', 'divisions', 'states'));
    }
}
