<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\LineCar;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['data'] = Car::select('cars.*','line_cars.lc_num')
        ->join('line_cars','line_cars.id','cars.line_id')
        ->get();
        // $data['data'] = \App\Models\Car::select('cars.*')->get();
        $data1['data1'] = \App\Models\LineCar::select('line_cars.*')->get();
        return view('carreport',$data1,$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $emps = Car::create([
            'car_num' => $request->car_num,
            'car_vehicle_reg_num'=> $request->car_vehicle_reg_num,
            'line_id' => $request->lc_id,
            
        ]);
        return redirect()->route('carreport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $data1['data1'] = LineCar::select('line_cars.*')->get();
        return view('create_car',$data1);

    }
    public function show2($id)
        {
            //
            $data1['data1'] = LineCar::select('line_cars.*')->get();
        
            $data['data'] = Car::select('cars.*','line_cars.lc_num')
            ->join('line_cars','line_cars.id','cars.line_id')
            ->where('line_cars.id',$id)
            ->get();
            return view('carreport',$data,$data1);

        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $data['data'] = \App\Models\Car::select('cars.*')->where('cars.id',$id)->get();
        $data1['data1'] = LineCar::select('line_cars.*')->get();
        $data['data'] = Car::select('cars.*','line_cars.lc_num')
        ->join('line_cars','line_cars.id','cars.line_id')
        ->where('cars.id',$id)->get();
        return view('edit_car',$data,$data1);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        Car::find($request->id)->update([
            'car_num'=>$request->car_num,'car_vehicle_reg_num'=> $request->car_vehicle_reg_num,
        'line_id' => $request->lc_id,
        ]);
        return back()->with('Alert', 'แก้ไขมูลสำเร็จ !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
    public function delete($id)
    {
        $de['delete'] = \App\Models\Car::select('cars.*')->where('id',$id)->delete();
        //dd($data);
        return redirect('car_report'); 
    }
}
