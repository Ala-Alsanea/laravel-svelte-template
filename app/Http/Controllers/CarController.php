<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //

    protected  function view()
    {

        $cars = Car::with('color:id,data', 'brand:id,data')->select('model', 'color_id', 'brand_id')->paginate(5);
        // dd($cars);


        return inertia::render(
            'pages/CRUD/View',
            [
                'cars' => $cars
            ]
        );
    }

    protected function create()
    {

        $colors = Color::select('id', 'data')->get();
        $brands = Brand::select('id', 'data')->get();
        // dd($brands);

        return inertia::render(
            'pages/CRUD/Create',
            [
                'colors' => $colors,
                'brands' => $brands
            ]
        );
    }

    protected function test()
    {

        // $car = Car::with('color', 'brand')->paginate(4);
        // dd(gettype(Car::class));
        $color = Color::get();

        dd($color);
    }
}