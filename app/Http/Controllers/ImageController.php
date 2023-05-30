<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(){
        
        return view('index');
    }
    public function imageUpload(Request $request){
        // $fileName = time().'-niraj.'.$request->file('image')->getClientOriginalExtension();

        $requestData = $request->all();
        $fileName = time().'-niraj.'.$request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('uploads',$fileName,'public');
        
        // $imagePath = Storage::url($path);
        // $requestData['image'] = $imagePath;
        $requestData['image']='/storage/'.$path;
        // $requestData['phone number'] = $request->input('phone_number');
        FileUpload::create($requestData);
        return redirect('/display');
        // echo $fileName;
        // echo "<pre>";
        // print_r($request->toArray());
    }
    public function display(){
        $data = FileUpload::all();
        return view('display',compact('data'));
    }

    // public function getData(){
    //     // return Datatables::of(FileUpload::query())->make(true);
    //     return Datatables::of(FileUpload::query())->make(true);
    // }
}
