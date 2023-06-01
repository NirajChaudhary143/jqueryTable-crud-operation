<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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

    public function editForm($id)
    {
        $editData = FileUpload::find($id);
        $data = FileUpload::all();
        if ($editData) {
            return view('editForm', compact('editData'));
        } else {
            return redirect('/display')->with(['data' => $data, 'fail' => 'The Id you have entered is not on record']);
        }
    }
    
    

    public function updateData(Request $request,$id){
            $requestData = $request->all();
            $fileName = time().'-niraj.'.$request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('uploads',$fileName,'public');
            $databaseData= FileUpload::find($id);
            $requestData['image']='/storage/'.$path;
            // // echo $requestData['email'];
            // if($requestData['email'] == $databaseData->email){
            //     unset($requestData['email']); // remove the request data to avoid updating it
            // }
            // $databaseData->update($requestData);
            $databaseData->name = $requestData['name'];
            $databaseData->email = $requestData['email'];
            $databaseData->image = $requestData['image'];
            $databaseData->phone_number = $requestData['phone_number'];
            $databaseData->save();
            

            return redirect('/display')->with('success','Detail Updated');
            

    }
}
