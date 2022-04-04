<?php

namespace App\Http\Controllers;

use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /** Show a listing of resoures 
     *@return json 
     */
    public function index() {
        $cars = Car::all();
        return response($cars);
    }

    /** Create a new resource
     * @param Request $request
     */
    public function store(Request $request) {
        // dd($request);
        $arr = ['message' => 'ok'];
        return response($arr,200);

    }


}
