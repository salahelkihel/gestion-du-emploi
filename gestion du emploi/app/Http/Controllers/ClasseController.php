<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Classe;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class ClasseController extends Controller
{
    public function index(){
        $classe = DB::table('classe')->distinct('id')->get();

        return view('gestion_classe',compact('classe'));
    }
    public function create()
    {
        return view('classe.create');
    }
   
    public function add(Request $request)
    {
        
        $res=new Classe();
     
        $res->id=$request->input('id');
        $res->niveau=$request->input('niveau');


        $res->save();  
       
        Toastr::success('Classe created successfully :)','Success');

        return redirect('Classe');
    
        //    Toastr::error('Data added fail :)','Error');
            // return redirect()->back();
           

                       
    }
    public function update(Request $request,$id)
    {
        // try{
        $res=Classe::find($id);
        $res->id=$request->input('id');
        $res->niveau=$request->input('niveau');   
        $res->save();  
        Toastr::success('Classe updated successfully :)','Success'); 
        return redirect('Classe');
        // }catch(\Exception $e){


        // Toastr::error('Data updated fail :)','Error');
        // return redirect()->back();

        // }   
                        
    }
    public function delete($id)
    {
        try{
        Classe::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('Classe');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }               
    }

}
