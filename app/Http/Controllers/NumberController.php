<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumberRequest;
use App\Models\Number;
use App\Http\Requests\UpdateNumberRequest;
use Illuminate\Support\Facades\DB;


class NumberController extends Controller
{
    /**
     * Count last estraction
     */
    public function count($column)
    {
        $lastNumber = Number::all()->orderBy('created_at', 'DESC')->first();
        $lastColumn = Number::find()->where('column', $column)->take(1);
        $count = $lastNumber - $lastColumn;
        return $count;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = $this->count(1);
        //
        $numbers =  Number::all();

        return view('index', ['numbers' => $numbers, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNumberRequest $request)
    {
        $validated = $request->validated();


        if ($validated) {

            $lastNumber = $request->input('lastNumber');
            $column1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            $column2 = [13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
            $column3 = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36];
            $row1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
            $row2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
            $row3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];


            if (in_array($lastNumber, $column1) && in_array($lastNumber, $row1)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 1,
                    'row' => 1,
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column1) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 1,
                    'row' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column1) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 1,
                    'row' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row1)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 2,
                    'row' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 2,
                    'row' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 2,
                    'row' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row1)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 3,
                    'row' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 3,
                    'row' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 3,
                    'row' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif ($lastNumber === 0) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'column' => 0,
                    'row' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();

                return view('index', ['numbers' => $numbers]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Number $number)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Number $number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNumberRequest $request, Number $number)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

        DB::table("numbers")->orderBy("created_at", "DESC")->take(1)->delete();

        $numbers = Number::all();
        return view('index', ['numbers' => $numbers]);
    }
}
