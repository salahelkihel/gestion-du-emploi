<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Etudiant;

use Brian2694\Toastr\Facades\Toastr;

class EtudientController extends Controller
{
    public function index(){
        $classe = DB::table('classe')->distinct('id')->get();

        $Etudiants = DB::table('etudiants')
        ->join('classe', 'etudiants.id_classe', '=', 'classe.id')
        ->select('classe.id as id_cl','etudiants.*')
        ->get();
        return view('gestion_Etudient',['Etudiants'=>$Etudiants,'classe'=>$classe]);
    }
   
    public function add(Request $request)
    {
        try{
        $res=new Etudiant();

        $res->nom=$request->input('nom');
        $res->prenom=$request->input('prenom');
        $res->email=$request->input('email');
        $res->Telephone=$request->input('Telephone');
        $res->password=$request->input('password');
        $res->id_classe=$request->input('id_classe');


        $res->save();  
       
 Toastr::success('Etudiants created successfully :)','Success');

        return redirect('Etudiant');
         }catch(\Exception $e){


            Toastr::error('Data added fail :)','Error');
             return redirect()->back();

          }                
    }
    public function update(Request $request,$id)
    {
        try{
        $res=Etudiant::find($id);
        $res->id=$request->input('id');
        $res->statut_formation=$request->input('statut_formation');
        $res->Duree=$request->input('Duree');
        $res->decision=$request->input('decision');
        $res->num_compte=$request->input('Num_Compte');
        $res->save();  
        Toastr::success('Etudiants updated successfully :)','Success'); 
        return redirect('Etudiant');
    }catch(\Exception $e){


        Toastr::error('Data updated fail :)','Error');
        return redirect()->back();

      }   
                        
    }
    public function delete($id)
    {
        try{
        Etudiant::where(['id'=>$id])->delete();
        Toastr::success('Data deleted successfully :)','Success');
        return redirect('Etudiant');
        }catch(\Exception $e){
        Toastr::error('Data deleted fail :)','Error');
        return redirect()->back();
        }               
    }
}
