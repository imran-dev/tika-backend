<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request){
        $pepole = Person::where('id_no', $request->id)->first();
        return $pepole;
    }
}
