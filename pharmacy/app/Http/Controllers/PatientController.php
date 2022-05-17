<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('user')->orderBy('id','desc')->get();
        return response()->view('cms.Patient.index' , compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Patient.create');
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
            'address' => 'required|string|',
            'gender' => 'required|in:Male,Female',
            'age' => 'required|numeric',
        ]);

        if(!$valid->fails()){
            $patients = new Patient();
        
            $store = $patients->save();

            if($store) {
                $users = new User();
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->address = $request->get('address');
                $users->actor()->associate($patients);

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
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = Patient::findOrFail($id);
        return response()->view('cms.Patient.edit' , compact('patients'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $valid = Validator($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|min:9|max:20',
            'address' => 'required|string|',
            'gender' => 'required|in:Male,Female',
            'age' => 'required|numeric',
        ]);

        if(!$valid->fails()){
            $patients = Patient::findOrFail($id);
        
            $store = $patients->save();

            if($store) {
                $users = $patients->user;
                $users->name = $request->get('name');
                $users->email = $request->get('email');
                $users->phone = $request->get('phone');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->age = $request->get('age');
                $users->address = $request->get('address');
                $users->actor()->associate($patients);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            $delete = Patient::destroy($id);
    
            return response()->json(['message' => $delete ? "Deleted Successfully" : "Faild To Delete"] , $delete ? 200 : 400);
        }
}
