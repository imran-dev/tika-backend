<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function divisions()
    {
        $divisions = Division::all();
        return response()->json($divisions);
    }

    public function districts(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->where('enabled', 1)->get();
        return response()->json($districts);
    }

    public function upazilas(Request $request)
    {
        $upazilas = Upazila::where('district_id', $request->district_id)->where('enabled', 1)->get();
        return response()->json($upazilas);
    }
}
