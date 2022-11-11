<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function index()
    {
        $students   = Student::latest()->paginate(3);
        return view('dashboard', compact('students'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      =>   'required|max:50', 
            'roll'      =>   'required|unique:students|max:50', 
            'course'    =>  'required|max:60',
        ],
        [
            'name.required'     =>  'Name is required',
            'roll.required'     =>  'Roll is required',
            'roll.unique'       =>  'Roll is exists',
            'course.required'   =>  'Course is required',
        ]);
            
 
            $students   = new Student();
            $students->name     = $request->name;
            $students->roll     = $request->roll;
            $students->course     = $request->course;
            $students->save();
            
            return response()->json(['status'=>'success']);        
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'update_name'      =>   'required|max:50', 
            'update_roll'      =>   'required|unique:students,roll,'.$request->update_id, 
            'update_course'    =>   'required|max:60',
        ],
        [
            'update_name.required'     =>  'Name is required',
            'update_roll.required'     =>  'Roll is required',
            'update_roll.unique'       =>  'Roll is exists',
            'update_course.required'   =>  'Course is required',
        ]);

        $students   = Student::where('id', $request->update_id);
        
        $students->update([
            'name'     =>      $request->update_name,
            'roll'     =>      $request->update_roll,
            'course'   =>      $request->update_course,
        ]);

        return response()->json(['status'=>'success']); 
    }

    public function destory(Request $request)
    {
        $students = Student::find($request->student_id);
        $students->delete();

        return response()->json(['status'=>'success']); 
    }

    public function search(Request $request)
    {
        $search_data = Student::where('name', '%'.$request->search_keyword.'%');
        // ->orWhere('roll', 'like', '%'.$request->search_keyword.'%')
        // ->orWhere('course', 'like', '%'.$request->search_keyword.'%')
        // ->orderBy('id', 'desc');

        return response()->json($search_data);
        // return view('search', compact('search_data'))->render();
    }
}
