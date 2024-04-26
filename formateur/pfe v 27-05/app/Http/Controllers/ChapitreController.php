<?php

namespace App\Http\Controllers;

use App\Models\chapitre;
use App\Models\exercice;
use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\formateur;
use App\Models\quiz;
use App\Models\qstn_quiz;
use App\Models\qstn_test;
use App\Models\video;

class ChapitreController extends Controller
{
     public function ajout_chap()
     {
        return view('formateur.chapitres');
        
    }
    public function submit(Request $request)
{
   
    $for_id=16;
    $chapitre=new chapitre();
    $chapitre->chap_titre=$request->input('titre');
    $chapitre->chap_descriptif=$request->input('descriptif');
    $lastRow = chapitre::latest()->first();
    $id_chap = $lastRow->id_chap;
    $chapitre->id_for=$for_id;
    $chapitre->save();
    $exercice = new exercice();
    $exercice->contenu=$request->input('exos');
    $exercice->chapitre=$id_chap;
    $exercice->save();
    $video=new video();
    $video->title=$request->input('titre_vid');
    $video->contenu=$request->input('vid');
    $video->chapitre=$id_chap;
    $video->save();
    $quizz=new quiz();
    $quizz->chapitre=$id_chap;
    $quizz->save();
    $lastRow = quiz::latest()->first();
    $id_quiz = $lastRow->id_quizz;
    foreach ($request->all() as $key => $value) {
        if (strpos($key, 'question') !== false) {
            // Récupérez l'index de la question
            $questionIndex = substr($key, 8);

            // Créez la question dans la table `questions_quiz`
            $question = new qstn_quiz();
            $question->id_quiz = $id_quiz;
            $question->question = $value;
            $question->save();

    
    

    return redirect('chapitre{i+1}')->with('success');
}}
}
}