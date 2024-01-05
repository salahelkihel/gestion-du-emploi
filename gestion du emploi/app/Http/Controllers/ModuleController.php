<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Module;

use Brian2694\Toastr\Facades\Toastr;

class ModuleController extends Controller
{
    public function index(){
        $classe = DB::table('classe')->distinct('id')->get();

        $modules = DB::table('modules')
        ->join('classe', 'modules.id_classe', '=', 'classe.id')
        ->select('classe.*','modules.*')
        ->get();

        return view('gestion_Module',['modules'=>$modules,'classe'=>$classe]);
    }
    public function create()
    {
        return view('module.create');
    }
    public function edit(Module $classe)
    {
        return view('module.edit',compact('module'));
    }
    public function add(Request $request)
    {
        try{
        $res=new Module();
       
     
        $res->id=$request->input('id');
        $res->NomMod=$request->input('NomMod');
        $res->id_classe=$request->input('id_classe');
        $res->SemestreMod=$request->input('SemestreMod');

        $res->save();  
       
        Toastr::success('module created successfully :)','Success');

        return redirect('Module');
           }catch(\Exception $e){


             Toastr::error('Data added fail :)','Error');
             return redirect()->back();

         }                
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Module::find($id);
    
        $res->id=$request->input('id');
        $res->NomMod=$request->input('NomMod');
        $res->id_classe=$request->input('id_classe');
        $res->SemestreMod=$request->input('SemestreMod');
        $res->save();  
        Toastr::success('Module updated successfully :)','Success'); 
        return redirect('Module');
    }catch(\Exception $e){


        Toastr::error('Data updated fail :)','Error');
        return redirect()->back();

      }   
                        
    }
    public function delete($id)
    {
        try{
        Module::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('Module');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }               
    }
}
