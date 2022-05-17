<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::with('user')->withCount('suppliers')->withCount('medicins')->orderBy('id','desc')->get();
        return response()->view('cms.Employee.index' , compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sups = Supplier::with('employees')->get();
        return response()->view('cms.Employee.create' , compact('sups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'gender' => 'required|in:Male,Female',
            'status' => 'required|in:Active,Disabled',
            'files' => 'required|max:2048|mimes:png,jpg,jpeg,pdf,zip',
            'hire_date' => 'required|date',
            'end_date' => 'required|date',
            'salary' => 'required|numeric',

        ]);

        if(!$valid->fails()){
            $emps = new Employee();
            $emps->password = Hash::make($request->get('password'));
            $file = $request->file('files');
            $fileName = time() . 'files.' . $file->getClientOriginalExtension();
            $file->move('storage/files/emps', $fileName);
            $emps->files = $fileName;
            $emps->hire_date = $request->get('hire_date');
            $emps->end_date = $request->get('end_date');
            $emps->salary = $request->get('salary');
            $store = $emps->save();

            if($store) {
                $users = new User();
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->actor()->associate($emps);

                $saved = $users->save();

                if($saved){
                    return response()->json(['message' => $saved ? "Added Successfully" : "Faild To Added"] , $saved ? 200 : 400);

                    // return  redirect()->route('admin.index');
                }else{
                return response()->json(['message' => "Faild To Added"] , 400);
                }
            }
        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emps = Employee::findOrFail($id);
        return response()->view('cms.Employee.edit',compact('emps'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'gender' => 'required|in:Male,Female',
            'status' => 'required|in:Active,Disabled',
            'hire_date' => 'required|date',
            'end_date' => 'required|date',
            'salary' => 'required|numeric',

        ]);

        if(!$valid->fails()){
            $emps = Employee::findOrFail($id);
            $emps->hire_date = $request->get('hire_date');
            $emps->end_date = $request->get('end_date');
            $emps->salary = $request->get('salary');
            $store = $emps->save();

            if($store) {
                $users = $emps->user;
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->actor()->associate($emps);

                $saved = $users->save();

                if($saved){
                    return response()->json(['message' => $saved ? "Added Successfully" : "Faild To Added"] , $saved ? 200 : 400);

                    // return  redirect()->route('emp.index');
                }else{
                return response()->json(['message' => "Faild To Added"] , 400);
                }
            }
        }else {
            return response()->json(['message' => $valid->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Employee::destroy($id);

        return response()->json(['message' => $delete ? "Deleted Successfully" : "Faild To Delete"] , $delete ? 200 : 400);
    }
}
