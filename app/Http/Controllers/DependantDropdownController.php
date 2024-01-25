<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DependantDropdownController extends Controller
{
    //
    public function provinces() {
        $getProv = \Indonesia::allProvinces();
        return $getProv;
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, [ 'cities'])->cities->pluck('name', 'id');
        // return \Indonesia::findProvinceByName($request->name, ['cities'])->cities->pluck('name', 'id');
    }
}
