<?php

namespace App\Http\Controllers\resource;

use App\Models\Car;
use App\Models\Role;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    //

    protected  function index(Request $request)
    {
        if (Auth::user()->activated) {
            Gate::authorize('view', Car::class);
            // dd(Auth::user()->roles->first()->data == Role::where("data", "=", "admin")->first()->data);



            $per_page = $request->per_page != null ? $request->per_page : 10;

            $cars = Car::with('color:id,data', 'brand:id,data')->select('id', 'model', 'color_id', 'brand_id')->orderby('id', 'desc')->paginate($per_page);
            // dd(auth()->user());

            unset($cars['color_id']);
            unset($cars['brand_id']);

            // dd(Auth::user()->can('create', Car::class));

            return inertia::render(
                'pages/CRUD/View',
                [
                    'cars' => $cars,
                    // 'can' => [
                    //     'create' => Auth::user()->can('create', Car::class),
                    //     'delete' => Auth::user()->can('delete', $cars),
                    // ]
                ]
            );
        } else {
            Auth::logout();
            abort(403, 'deactivated');
        }
    }

    protected function create()
    {
        if (Auth::user()->activated) {
            Gate::authorize('create', Car::class);

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
        } else {
            Auth::logout();
            abort(403, 'deactivated');
        }
    }

    protected function store(Request $request)
    {
        if (Auth::user()->activated) {
            Gate::authorize('create', Car::class);

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


            return redirect("/cars")->with('alerts', [
                'success' => true,
                'msg' => "$car->model was added successfully"
            ]);
        } else {
            Auth::logout();
            abort(403, 'deactivate');
        }
    }


    protected function edit($id)
    {
        if (Auth::user()->activated) {
            //
            $car = Car::findOrFail($id);
            $colors = Color::select('id', 'data')->get();
            $brands = Brand::select('id', 'data')->get();
            // dd($car);


            $color = Color::where('id', '=', $car['color_id'])->first();
            $brand = Brand::where('id', '=', $car['brand_id'])->first();
            // dd($color->data);

            $car['color'] = $color->data;
            unset($car['color_id']);

            $car['brand'] = $brand->data;
            unset($car['brand_id']);

            // dd($car);

            return inertia::render(
                'pages/CRUD/Update',
                [
                    'colors' => $colors,
                    'brands' => $brands,
                    'car' => $car
                ]
            );
        } else {
            Auth::logout();
            abort(403, 'deactivated');
        }
    }

    protected function update(Request $request, $id)
    {
        if (Auth::user()->activated) {
            //
            // dd($request->car);
            $car = Car::findOrFail($id)->first();

            $newCar = $request->validate(
                [
                    'model' => ['required', 'min:3'],
                    'price' => ['required', 'numeric'],
                    'year' => ['required', 'date'],
                    'description' => 'required',
                    'color' => ['required', Rule::exists('colors', 'data')],
                    'brand' => ['required', Rule::exists('brands', 'data')],
                ]
            );

            $color = Color::where('data', '=', $newCar['color'])->first();
            $brand = Brand::where('data', '=', $newCar['brand'])->first();




            $newCar['color_id'] = $color->id;
            unset($newCar['color']);

            $newCar['brand_id'] = $brand->id;
            unset($newCar['brand']);

            $newCar = new Car($newCar);
            // dd($newCar);

            // if ($car === $newCar) {
            //     return redirect("/view")->with('alerts', [
            //         'error' => true,
            //         'msg' => "$car->model was NOT updated "
            //     ]);
            // }


            $car->where('id', $id)->update($newCar->toArray());
            // dd($car);
            // $car->save();

            return redirect()->back()->with('alerts', [
                'info' => true,
                'msg' => "$newCar->model was updated successfully"
            ]);
        } else {
            Auth::logout();
            abort(403, 'deactivated');
        }
    }


    protected function destroy($id)
    {

        if (Auth::user()->activated) {
            $car = Car::findOrFail($id);
            Gate::authorize('delete', $car);
            // dd($car->model);
            $car_ = $car;


            if ($car->deleteOrFail() === false) {
                return response(
                    "Couldn't delete the car with id {id}",
                    Response::HTTP_BAD_REQUEST
                );
            }

            return redirect()->back()->with('alerts', [
                'warning' => true,
                'msg' => "$car->model with No. $car->id was deleted successfully"
            ]);
        } else {
            Auth::logout();
            abort(403, 'deactivated');
        }
    }
    //
    protected function test()
    {

        // $car = Car::with('color', 'brand')->paginate(4);
        // dd(gettype(Car::class));
        abort(404);
    }
}