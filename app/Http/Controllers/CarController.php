<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CarController extends Controller
{
    //

    protected  function view()
    {

        $cars = Car::with('color:id,data', 'brand:id,data')->select('id', 'model', 'color_id', 'brand_id')->orderby('id', 'desc')->paginate(5);
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

    protected function store(Request $request)
    {
        $field = $request->validate(
            [
                'model' => ['required', 'min:3'],
                'price' => ['required', 'numeric'],
                'year' => ['required', 'date'],
                'description' => 'required',
                'color' => ['required', Rule::exists('colors', 'data')],
                'brand' => ['required', Rule::exists('brands', 'data')],
            ]
        );


        $color = Color::where('data', '=', $field['color'])->first();
        $brand = Brand::where('data', '=', $field['brand'])->first();



        // dd($brand->id);

        $field['color_id'] = $color->id;
        unset($field['color']);

        $field['brand_id'] = $brand->id;
        unset($field['brand']);


        // dd($field);

        $car = Car::create($field);
        // dd($car);


        return redirect("/view")->with('alerts', [
            'success' => true,
            'msg' => 'item was added successfully'
        ]);
    }


    protected function delete($id)
    {

        $car = Car::findOrFail($id);
        // dd($car);

        if ($car->deleteOrFail() === false) {
            return response(
                "Couldn't delete the car with id {id}",
                Response::HTTP_BAD_REQUEST
            );
        }
        // return response(["id" => $id, "deleted" => true]);
        return redirect()->back()->with('alerts', [
            'warning' => true,
            'msg' => 'item was deleted successfully'
        ]);
    }

    protected function test()
    {

        // $car = Car::with('color', 'brand')->paginate(4);
        // dd(gettype(Car::class));
        $color = Color::get();

        dd($color);
    }
}