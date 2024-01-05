<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Enseignants;

use Brian2694\Toastr\Facades\Toastr;

class EnseignantsController extends Controller
{
    public function index(){
        $modules = DB::table('modules')->distinct('id')->get();

        $Enseignants = DB::table('enseignants')
        ->join('modules', 'modules.id', '=', 'enseignants.id_module')
        ->select('enseignants.*','modules.NomMod AS NomMod','modules.id AS idMod')
        ->get();


        return view('gestion_Enseignants',['Enseignants'=>$Enseignants,'modules'=>$modules]);
    }
    public function create()
    {
        return view('Enseignants.create');
    }
    public function edit(Enseignants $classe)
    {
        return view('Enseignants.edit',compact('module'));
    }
    public function add(Request $request)
    {
        // try{
        $res=new Enseignants();
    
        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->email=$request->input('email');
        $res->Adresse=$request->input('Adresse');
        $res->password=$request->input('password');
        $res->id_module=$request->input('id_module');


        $res->save();  
       
        Toastr::success('Enseignant created successfully :)','Success');

        return redirect('Enseignants');
        //   }catch(\Exception $e){


            // Toastr::error('Data added fail :)','Error');
            // return redirect()->back();

        //   }                
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Enseignants::find($id);

        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->email=$request->input('email');
        $res->Adresse=$request->input('Adresse');
        $res->password=$request->input('password');
        $res->id_module=$request->input('id_module');

        $res->save();  
        Toastr::success('Enseignant updated successfully :)','Success'); 
        return redirect('Enseignants');
    }catch(\Exception $e){


        Toastr::error('Data updated fail :)','Error');
        return redirect()->back();

      }   
                        
    }
    public function delete($id)
    {
        try{
        Enseignants::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('Enseignants');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }               
    }
}
