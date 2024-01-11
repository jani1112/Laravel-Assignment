<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = Register::all();
        return view('list',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('POST')){
            $validation = Validator::make($request->all(),[
                'name' => "required",
                'description' => "required"
            ],[
                'name.required' => "Please enter the name",
                'description.required' => 'Please enter description'
            ]);


            if($validation->fails()){
                return back()->withErrors($validation)->withInput();
            }

            Register::create($validation->validated());
            return redirect()->route('form.getdata')->with('message','Data Inserted Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $userdata = Register::find($id);
        // if(!$userdata){
        //     return redirect()->route('home')->with('success','No User Found');
        // }
        //     return view('list',["allData" => $userdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if(is_null($id)){
            return to_route('form.getdata')->with('message',"Data Not Found");
        }
        $userdata = Register::find($id);
        return view('edit',compact('userdata'));
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
        $validation = Validator::make($request->all(),
        [
            'name' => "required|unique:registers,name",
            'description' => "required"
        ],[
            'name.required' => "Name is required",
            'name.unique' => 'Name already exists',
            'description.required' => 'Description is required'
        ]);
        
        if($validation->fails()){
            return back()->withErrors($validation);
        }
        
        $user = Register::find($id);
        if (!$user) {
            return back()->with('error', 'User not found');
        }
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
        ]);
    
        return redirect()->route('form.getdata')->with('message','Successfully Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Register::find($id);
        if (!$user) {
            return back()->with('message', 'User not found');
        }
    
        $user->delete();
        return redirect()->route('form.getdata')->with('message', 'Successfully Deleted!');
    }
}
