<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categ;
use App\Models\categorie;
use App\Models\choix;
use App\Models\formation;

class CategController extends Controller
{
    public function choix()
    {
        return view('test.choix_categ');
    }
    public function categ(){
        $categories= categorie::all();
        return $categories;
    }
    public function categ_ajout(){
          $id_user=3;
        $cat=request()->input('$categorie[]');
        $cnx=mysqli_connect('localhost','root','','pfe');
        foreach ($cat as $value){
        $insertion="INSERT into choix_categorie values('$value','$id_user')";
        $res=mysqli_query($cnx,$insertion);
        }
      return redirect('test_de_competences');
}
}