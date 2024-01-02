<?php

namespace App\Http\Controllers;

use Validator;
// use Illuminate\Support\Facades\validator;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;



class StudentController extends Controller
{
    public function index(){
        $students=Student::orderBy('id')->paginate(5);
    	return view('student.list',compact('students'));
    //    return view('student.list');
    }
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){
       
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'contact' => 'required|numeric|min:10',
            'city' => 'required',
            'hobby' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg',
            'gender' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
        // dd('khali ala');
        if ($validator->passes() ){
            $student = new Student();
            $student->name =  $request->name;
            $student->email =  $request->email;
            $student->address =  $request->address;
            $student->contact =  $request->contact;
            $student->city =  $request->city;
            $student->hobby =  $request->hobby;
            // $student->image =  $request->image;
            $student->gender =  $request->gender;
            $student->password =  $request->password;
            $student->save();
            
            // uploadimage
            if ($request->image){
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/student',$newFileName);
                $student->image =$newFileName;
                $student->save();


            }

            // $request->session()->flash( 'success','Student added successfully.');

            return redirect()->route('student.index')->with( 'success','Student added successfully.');
        } else{
            return redirect()->route('student.create')->withErrors($validator)->withInput();
        }
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        // if(!$student){
        //     abort('404');
        // }
        // dd($student);
        return view('student.edit',compact('student'));
    }

    public function update($id,Request $request){
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'required',
            'contact' => 'required|numeric|min:10',
            'city' => 'required',
            'hobby' => 'required',
            'image' => 'sometimes|image:gif,png,jpeg,jpg',
            'gender' => 'required',
            'password' => 'required|min:5|max:12',
        ]);
        // dd('khali ala');
        if ($validator->passes() ){
            $student =  Student::find($id);
            $student->name =  $request->name;
            $student->email =  $request->email;
            $student->address =  $request->address;
            $student->contact =  $request->contact;
            $student->city =  $request->city;
            $student->hobby =  $request->hobby;
            // $student->image =  $request->image;
            $student->gender =  $request->gender;
            $student->password =  $request->password;
            $student->save();
            
            // uploadimage
            if ($request->image){
                $oldImage = $student->image;            //its store image in new variable to delete old image

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/student/',$newFileName);

                $student->image =$newFileName;
                $student->save();

                File::delete(public_path().'/uploads/student/'.$oldImage);   //it will delete old image


            }

            $request->session()->flash( 'success','Student added successfully.');

            return redirect()->route('student.index');
        } else{
            return redirect()->route('student.edit',$id)->withErrors($validator)->withInput();
        }
    }

    public function destroy($id, Request $request){
        $student =  Student::find($id);
        File::delete(public_path().'/uploads/student/'.$student->image );
        $student->delete();

        $request->session()->flash( 'success','Student removed successfully.');

        return redirect()->route('student.index');
    }
}
