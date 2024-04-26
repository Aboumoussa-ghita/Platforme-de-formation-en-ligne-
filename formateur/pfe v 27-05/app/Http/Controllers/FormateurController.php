<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Php;
use Illuminate\Support\Facades\DB;

class FormateurController extends Controller{
     public function creation()
    {
        return view("formateur.creer_formation");
    }
  
        public function ajout_for(Request $request)
        {
            $formation = new Formation();
            $formation->nom_for = $request->input('titre');
            $formation->niv_diff = $request->input('niveau_diff');
            $formation->descriptif = $request->input('descriptif');
           // $formation->categorie = $request->input('categorie','test');
            $formation->photo_for = $request->input('photo_for');
            if(!empty($request->input('categorie'))){$formation->categorie = $request->input('categorie');}
            else{$formation->categorie = $request->input('autre_cat');
            $categorie = new categorie();
            $categorie->C_NOM = $request->input('autre_cat');
            $res_cat=$categorie->save();}
            $res_for = $formation->save();
            if($res_for) {
            return redirect('chapitre')->with('success');
            return back()->with('fail','Une erreur s\'est produite');}
            //recuperer l id de la derniere formation enregistrée
            $titre = $request->input('titre');
            $cnx=mysqli_connect('localhost','root','','pfe');
            $res= mysqli_query($cnx,"SELECT id_for FROM formations WHERE nom_for = '$titre'");
          $resultat = mysqli_fetch_array($res);
            if (!empty($resultat)) {
                $id_for = $resultat[0]->id_formation;
            } else {
                // Gérer le cas où aucun enregistrement correspondant n'est trouvé
                $id_for = "inconnu";
            }
       
            //  $lastRow = VotreModele::latest()->first();

            //$id_for = $dernierEnregistrement->id_formation;
            $request->session()->put('id_for', $id_for);
            

            // Redirection vers une autre page
            //return redirect()->route('chapitre');
}

    
}