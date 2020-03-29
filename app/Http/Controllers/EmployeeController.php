<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LineCar;
use App\Models\Queue;
use App\Models\Car;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['data'] = \App\Models\Employee::select('employees.*')->get()
        $data1['data1'] = \App\Models\Employee::select('employees.id as e_id','employees.emp_id','employees.emp_fname','employees.emp_lname',
        'employees.emp_address','employees.emp_phone','employees.emp_token_line','employees.emp_position','employees.car_id','employees.day_off',
        'cars.*'
        )
        ->leftjoin('cars','cars.id','employees.car_id')
        ->orderByRaw('employees.emp_id ASC')
        ->get();
        // $data1['data1'] = \App\Models\Employee::leftJoin('cars', function($join) {
        //     $join->on('employees.car_id', '=', 'cars.id');
        //   })
        //   //->whereNull('employees.car_id')
        //   ->first([
        //     'employees.id as e_id',
        //     'employees.emp_id',
        //     'employees.emp_fname',
        //     'employees.emp_lname',
        //     'employees.emp_address',
        //     'employees.emp_phone',
        //     'employees.emp_token_line',
        //     'employees.emp_position',
        //     'employees.car_id',
        //     'employees.day_off',
        //     'cars.car_num',
        //     'cars.car_vehicle_reg_num'
        //   ])->get();
        
        $data2['data2'] = \App\Models\LineCar::select('line_cars.*')->get();
        //  dd($data1);
        return view('employee',$data1,$data2);
    }
    public function index2($id)
    {
        //$data['data'] = \App\Models\Employee::select('employees.*')->get()
        $data1['data1'] = \App\Models\Employee::select('employees.id as e_id','employees.emp_id','employees.emp_fname','employees.emp_lname',
        'employees.emp_address','employees.emp_phone','employees.emp_token_line','employees.emp_position','employees.car_id','employees.day_off',
        'cars.*','line_cars.lc_num'
        )
        ->leftjoin('cars','cars.id','employees.car_id')
        ->leftjoin('line_cars','cars.line_id','line_cars.id')
        ->where('line_cars.lc_num',$id)
        ->orderByRaw('employees.emp_id ASC')
        ->get();
        // $data1['data1'] = \App\Models\Employee::leftJoin('cars', function($join) {
        //     $join->on('employees.car_id', '=', 'cars.id');
        //   })
        //   //->whereNull('employees.car_id')
        //   ->first([
        //     'employees.id as e_id',
        //     'employees.emp_id',
        //     'employees.emp_fname',
        //     'employees.emp_lname',
        //     'employees.emp_address',
        //     'employees.emp_phone',
        //     'employees.emp_token_line',
        //     'employees.emp_position',
        //     'employees.car_id',
        //     'employees.day_off',
        //     'cars.car_num',
        //     'cars.car_vehicle_reg_num'
        //   ])->get();
        
        $data2['data2'] = \App\Models\LineCar::select('line_cars.*')->get();
        //  dd($data1);
        return view('employee',$data1,$data2);
    }
    public function delete($id)
    {
        \App\Models\Employee::select('employees.*')->where('emp_id',$id)->delete();
        \App\Models\Queue::select('queues.*')->where('emp_id',$id)->delete();
        //dd($data);
        return redirect('employee'); 
    }
    public function line()
    {
        //
        
        $data2['data2'] = \App\Models\Car::select('cars.*')->get();
        // dd($data);
        return view('create_emp',$data2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $emps = Employee::create([
            'emp_id' => $request->emp_id,
            'emp_fname'=> $request->emp_fname,
            'emp_lname'=> $request->emp_lname, 
            'emp_address'=> $request->emp_add,
            'emp_phone'=> $request->emp_phone,
            // 'emp_token_line'=> $request->emp_token,
            'emp_position'=> $request->emp_position,
            'car_id'=> $request->carid,
            'check_in'=> $request->check_in,
            'check_out'=> $request->check_out,
             'day_off'=> $request->date_off,
             'salary'=>$request->salary,
        ]);
        Queue::create([
            'emp_id' => $request->emp_id,
        ]);

        return redirect()->route('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['data'] = \App\Models\Employee::select('employees.*')->where('emp_id',$id)->get();
        $data2['data2'] = \App\Models\Car::select('cars.*')->get();
        //dd($data);
        return view('show_emp',$data,$data2); 
    }
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         
        $data['data'] = \App\Models\Employee::select('employees.*')->where('emp_id',$id)->get();
        $data2['data2'] = \App\Models\Car::select('line_cars.*','cars.*')
        ->join('line_cars','line_cars.id','cars.line_id')
        ->get();
        // dd($data2);
        return view('edit_emp',$data,$data2); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data1 = array(
            'emp_id' => $request->emp_id,
            'emp_fname'=> $request->emp_fname,
            'emp_lname'=> $request->emp_lname, 
            'emp_address'=> $request->emp_add,
            'emp_phone'=> $request->emp_phone,
            // 'emp_token_line'=> $request->emp_token,
            'emp_position'=> $request->emp_position,
            'car_id'=> $request->carid,
            'check_in'=> $request->check_in,
            'check_out'=> $request->check_out,
             'day_off'=> $request->date_off,
             'salary'=>$request->salary,
    );
    Employee::whereId($request->id)->update($data1);
    return redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
