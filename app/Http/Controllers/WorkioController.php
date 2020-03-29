<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Workio;
use Illuminate\Http\Request;

class WorkioController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $data['data0'] = \App\Models\Employee::select('employees.id as e_id','employees.emp_id','employees.emp_fname','employees.emp_lname',
        'employees.emp_address','employees.emp_phone','employees.emp_token_line','employees.emp_position','employees.car_id','employees.day_off',
        'employees.check_in','employees.check_out','cars.*'
        )
        ->leftjoin('cars','cars.id','employees.car_id')
        // >join('workios','workios.e_id','employees.id')
        ->where('employees.id',$id)
        
        ->orderByRaw('employees.emp_id ASC')
        ->get(); 

        $data['data1'] = \App\Models\Employee::select('employees.id as e_id','employees.emp_id','employees.emp_fname','employees.emp_lname',
        'employees.emp_address','employees.emp_phone','employees.emp_token_line','employees.emp_position','employees.car_id','employees.day_off',
        'employees.check_in','employees.check_out',
        'workios.id as w_id','workios.workdate','workios.workin','workios.workout','workios.status_day',
        'cars.*'
        )
        ->leftjoin('cars','cars.id','employees.car_id')
        ->join('workios','workios.e_id','employees.id')
        ->where('employees.id',$id)
        ->orderByRaw('employees.emp_id ASC')
        ->get();
        
   
    //    $data['data2'] = Workio::select('workios.*')
    //    ->where('workios.e_id',$data['data1']->e_id)
    //    ->get();
        //  dd($data['data1']);
        return view('profile',['data'=>$data]);
    }

    /** 
     * Show the form for creating a new resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function insert_w(Request $request)
        {
            //
            Workio::create([
                
                'e_id' => $request->id,
                'workdate' => $request->workdate,
                'status_day' => $request->status_day,
                'comment' => $request->comment,
           
            ]);
          
            return back()->with('Alert', 'บันทึกมูลสำเร็จ !');
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
    public function check_w(Request $request)
        {
            //
            $t['t'] = Employee::select(
            'employees.id as e_id','employees.emp_id','employees.emp_fname','employees.emp_lname','employees.emp_address','employees.emp_phone','employees.emp_token_line','employees.emp_position','employees.car_id','employees.day_off',
            'cars.id as c_id','cars.car_num','cars.car_vehicle_reg_num','cars.line_id',
            'line_cars.id as l_id','lc_num','lc_name'
            )
            ->join('cars','cars.id','employees.car_id')
            ->join('line_cars','line_cars.id','cars.line_id')
            ->where('employees.emp_id',$request->emp_id)
            ->get();

            $c['c'] = Employee::select('employees.*')
            ->where('employees.emp_id',$request->emp_id)
            ->count();
           
            $e['e'] = Employee::select('employees.*')
            ->where('employees.emp_id',$request->emp_id)
            ->get();
            // dd($t);
            // dd($h);
            // dd($c);
            date_default_timezone_set("Asia/Bangkok");
            // date("H:i");
             
            if($c['c']<1){
               return back()->with('Alert', 'ตรวจสอบข้อมูลของท่านใหม่ !');
            }else{
                foreach($e['e']  as $e1){
                    $h = Workio::select('workios.*')
                    ->where('workios.e_id',$e1->id)
                    ->where('workios.workdate',$request->date)
                    ->count();
                    }
                    foreach($e['e']  as $e1){
                        $h2['h2'] = Workio::select('workios.*')
                        ->where('workios.e_id',$e1->id)
                        ->where('workios.workdate',$request->date)
                        ->get();
                    }

                if($request->check_work=="1")
                {   
                    foreach($e['e']  as $e1){
                    if(date("H:i:s") > $e1->check_in){
                        $sta = "สาย";
                    }else{
                        $sta = "เข้างาน";
                    }
                    }
                    if($h>0){
                            return back()->with('Alert', 'คุณเคยลงชื่อเข้าใช้แล้ว !');
                    }else{
                        foreach($e['e']  as $e1){
                            Workio::create([
                                'e_id' => $e1->id,
                                'workin'=> date("H:i"),
                                'workdate' => $request->date,
                                'status_day' => $sta,
                            ]);
                        }  
                        return view('done_checkin',$t)->with('Alert', 'ลงชื่อเข้างานสำเร็จ !');
                    } 
                   
                    // return view('welcome')->with('Alert', 'ตรวจสอบข้อมูลของท่านใหม่ !');
                }else if($request->check_work=="2"){
                    foreach($h2['h2'] as $hh){
                        $data1 = array(
                            'workout'=> date("H:i"),
                    );
                    Workio::whereId($hh->id)->update($data1);
                    }
                    return view('done_checkout',$t)->with('Alert', 'ลงชื่อออกงานสำเร็จ !');
                    
                }
                
            }
        }


    
    public function status_c(Request $request)
    {
        //
        $data1 = array(
            'status_day'=>$request->status_day
    );
    Workio::whereId($request->id)->update($data1);
      
    
    return back()->with('Alert', 'แก้ไขมูลสำเร็จ !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Workio::destroy($id);
        return back()->with('deletetAlert', 'ลบข้อมูลเสร็จสิ้น!');
    }
}
