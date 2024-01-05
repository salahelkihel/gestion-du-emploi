<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Seances;
use Brian2694\Toastr\Facades\Toastr;
class SeancesController extends Controller
{
    public function index(){
        $classe = DB::table('classe')->distinct('id')->get();

        $modules = DB::table('modules')->distinct('id')->get();
        $Enseignants = DB::table('enseignants')->distinct('id')->get();
        $seances = DB::table('seances')
        ->join('classe', 'seances.classe_id', '=', 'classe.id')
        ->join('modules', 'seances.module_id', '=', 'modules.id')
        ->join('enseignants', 'seances.enseignant_id', '=', 'enseignants.id')

        ->select('classe.id AS idc','classe.niveau as niv','seances.*','modules.id as idmn','modules.NomMod as mn',
        'enseignants.id as ide', 'enseignants.nom as en','enseignants.prenom as ep')
        ->get();

        return view('gestion_seances',['seances'=>$seances,'modules'=>$modules,'classe'=>$classe,'Enseignants'=>$Enseignants]);
    }
  
    public function add(Request $request)
    {
        try{
        $res=new Seances();
       
        $res->id=$request->input('id');
        $res->date_Debut=$request->input('date_Debut');
        $res->date_Fin=$request->input('date_Fin');
        $res->JOUR=$request->input('JOUR');
        $res->classe_id=$request->input('classe_id');
        $res->module_id=$request->input('module_id');
        $res->enseignant_id=$request->input('enseignant_id');

        $res->save();  
       
        Toastr::success('Seances created successfully :)','Success');

        return redirect('Seances');
     }catch(\Exception $e){


        Toastr::error('Data added fail :)','Error');
           return redirect()->back();

         }                
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Seances::find($id);
    
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
            Seances::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('Module');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }               
    } 
}
