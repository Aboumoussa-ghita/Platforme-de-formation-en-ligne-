<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apprenti;
use App\Models\formateur;
use Hash; //didn't work, i has the Undefined Hash class error while trying to save the code
use Session;

class AuthController extends Controller
{
    public function login(){
            return view("auth.login");
    }
    public function registr_app()
    {
        return view("auth.registr_app");
    }
    public function registr_form()
    {
        return view("auth.registr_form");
    }
    public function test_comp(){
        return view("test.test_comp");
    }
    public function apprenti_inscription(Request $req){
        $req->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:apprenti,email',
            'mdp1'=>'required|min:8|max:25',
            'mdp_rep'=>'required|min:8|max:25',
            'niveau'=>'required',
            'date_naiss'=>'required',
            'tel'=>'required'
        ]);
        $apprenti = new apprenti;
        $apprenti->nom = $req->nom;
        $apprenti->prenom = $req->prenom;
        $apprenti->email = $req->email;
        $apprenti->mot_de_passe = $req->mdp1;
        $apprenti->niv_expertise= $req->niveau;
        $apprenti->date_naissance = $req->date_naiss;
        $apprenti->tel = $req->tel;
        $apprenti->photo=$req->photo;
        $res_app=$apprenti->save();
        if($res_app){
            return redirect('test.choix_categ')->with('success','Inscription terminée avec succès');
            $apprenti = $apprenti->id_apprenti;
        }else{
            return back()->with('fail','Une erreur s\'est produite');
        }
    }
    public function formateur_inscription(Request $req){
        $req->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'email'=>'required|email|unique:apprenti,email',
        'mdp1'=>'required|min:8|max:25',
        'mdp_rep'=>'required|min:8|max:25',
        'niveau'=>'required',
        'date_naiss'=>'required',
        'tel'=>'required'
    ]);
    $formateur=new formateur();
    $formateur->f_nom=$req->nom;
    $formateur->f_prenom=$req->prenom;
    $formateur->f_email=$req->email;
    $formateur->f_mot_de_passe=$req->mdp1;
    $formateur->niv_etude=$req->niveau;
    $formateur->date_naissance=$req->date_naiss;
    $formateur->f_tel=$req->tel;
    $formateur->photo=$req->photo;
    $res_for=$formateur->save();
    if($res_for){
        return redirect('new_for')->with('success','Inscription terminée avec succès');
        $req->session()->put('id_user',$formateur->id);
    }else{
        return back()->with('fail','Une erreur s\'est produite');
    }
    
    $cnx = mysqli_connect('localhost', 'root', '', 'pfe');
    if (mysqli_connect_errno()) {
    echo "Échec de la connexion à la base de données: " . mysqli_connect_error();
    exit();
    }
      $utilisateur = "nom_utilisateur"; 
      // Nom de l'utilisateur dont vous souhaitez récupérer l'ID
     // Exécution de la requête pour récupérer l'ID de l'utilisateur
    $id_user = mysqli_query($cnx, "SELECT id_formateur FROM formateur WHERE F_email = '$req->email'");
    }

    public function login_2(Request $req){
        $req->validate([
            'email'=>'required|email|',
            'mdp'=>'required|min:8|max:25']);
            $user = apprenti::where('email',$req->email)->first();
            if($user){
                if($req->mdp==$user->mdp){
                    $req->session()->put('id_user',$user->id);
                    // si tout est bon, on se dirige vers la page d accueil de l'apprenti
                    //return redirect('apprenti/home');
                }else{
                    return back()->with('fail','Mot de passe incorrect');   
                }
            }else{
                return back()->with('fail','Cet email n\'est pas enregistré');
            }
    }   
} 
