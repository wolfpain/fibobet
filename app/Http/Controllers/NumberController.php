<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNumberRequest;
use App\Models\Number;
use App\Http\Requests\UpdateNumberRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Fecades\Request;


class NumberController extends Controller
{
    /**
     * Count last column estraction
     */
    public function countColumn($column)
    {
        $lastNumber = Number::all()->sortByDesc('created_at')->first();
        $lastColumn = Number::all()->where('colonna', '=', $column)->sortByDesc('created_at')->first();
        $count = $lastNumber->id - $lastColumn->id;
        return $count;
    }

    /**
     * Count last row estraction
     */
    public function countRow($row)
    {
        $lastNumber = Number::all()->sortByDesc('created_at')->first();
        $lastRow = Number::all()->where('riga', '=', $row)->sortByDesc('created_at')->first();
        $count = $lastNumber->id - $lastRow->id;
        return $count;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $column1count = $this->countColumn(1);
        $column2count = $this->countColumn(2);
        $column3count = $this->countColumn(3);

        $row1count = $this->countRow(1);
        $row2count = $this->countRow(2);
        $row3count = $this->countRow(3);

        $columnCounts = [['column' => 1, 'count' => $column1count], ['column' => 2, 'count' => $column2count], ['column' => 3, 'count' => $column3count]];
        $rowCounts = [['row' => 1, 'count' => $row1count], ['row' => 2, 'count' => $row2count], ['row' => 3, 'count' => $row3count]];
        $numbers =  Number::all();
        return view('index', ['numbers' => $numbers, 'columnCounts' => $columnCounts, 'rowCounts' => $rowCounts]);
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
                    'colonna' => 1,
                    'riga' => 1,
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column1) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 1,
                    'riga' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column1) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 1,
                    'riga' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row1)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 2,
                    'riga' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 2,
                    'riga' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column2) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 2,
                    'riga' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row1)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 3,
                    'riga' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row2)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 3,
                    'riga' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif (in_array($lastNumber, $column3) && in_array($lastNumber, $row3)) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 3,
                    'riga' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);
                $numbers =  Number::all();
                return view('index', ['numbers' => $numbers]);
            } elseif ($lastNumber === 0) {
                $number = [
                    'number' => $request->input('lastNumber'),
                    'colonna' => 0,
                    'riga' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                Number::create($number);

                return $this->index();
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

        return $this->index();
    }
}
