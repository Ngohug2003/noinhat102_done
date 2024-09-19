<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Get provinces
    public function getProvinces()
    {
        $provinces = Province::all(); // Adjust this if you have a different way to get provinces
        return response()->json($provinces);
    }

    // Get districts by province ID
    public function getDistricts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get(); // Adjust if needed
        return response()->json($districts);
    }

    // Get wards by district ID
    public function getWards($districtId)
    {
        $wards = Ward::where('district_id', $districtId)->get(); // Adjust if needed
        return response()->json($wards);
    }
}
