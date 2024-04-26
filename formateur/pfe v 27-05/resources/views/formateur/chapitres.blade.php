<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/app.css" rel="stylesheet">
    <title>Chapitres formation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            float: right;
            width: 90%;
            margin: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            background-color: #1e547bb6;
            padding: 4rem;
            border-radius: 9px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-family: Andalus;
            font-size: 20px;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #4c65af;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="button"]{
            background-color: #944cdc;
            color: rgb(255, 255, 255);
            padding: 10px 20px;
            margin-left: 75%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #4562a0;
            
        }
        .formulaire{
            margin-right:2%; 
            margin-left: 5% ;
           width: 70%;
        }
        .titre{
            margin-top: 10px;
            margin-left: 30%;
            font-family: Andalus;
            font-size: 35px;
            color: #1e547bb6 ;
        }
    </style>
</head>
<body>
    <br>
    @include('layout.navbar')
    @include('layout.sidebar')

    
    <div class="container" >
        <form action="{{route('soumettre_chap')}}" method="POST" id="chapter-form">
            @csrf
            @method('POST')
        <div id="chapitre-container">
            <div class="chapitre ">
            <h2>Chapitre 1</h2>
        
                        <b><h1>les chapitres de la formation {{session('id_for')}}</h1></b>
                        {{session('id_for')}}
                 <div class="form-group">        
                    <label for="titre">Titre du chapitre</label>
                    {{ session('id_user') }}
                    <input type="text" name="titre" id="titre" value="{{old('titre')}}" >
                    <span class="text-danger">@error('titre'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="descriptif" >Ecrivez une introduction sur ce chapitre</label><br>
                    <textarea name="descriptif" rows="15" cols="50" value="{{old('descriptif')}}"></textarea>
                    <span class="text-danger">@error('descriptif'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="vid">Video explicative</label>
                    <input type="text" name="titre_vid" id="titre" value="{{old('titre_vid')}}" ><br><br>
                    <input type="file" name="vid" id="vid" value="{{old('vid')}}"  onchange="previewImage(event)">
                    <span class="text-danger">@error('vid'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="exos">Exercices d'Application:<u> Insérez un fichier contenant quelques exercices d application avec leur correction</u></label>
                    <input type="file" name="exos" id="exos">
                    <span class="text-danger">@error('exos'){{$message}} @enderror </span>
                </div>

                    <h3>Là vous inserez le quizz de ce chapitre</h3>
                    
                
        <div class="question" id="questions-container${index}">    
                <h4>Question </h4>

            <label for="question1">Question 1:</label>
            <input type="text" name="question1" required>

            <label for="answer1_1">Réponse 1 :</label>
            <input type="text" name="answer1_1" required>

            <label for="answer1_2">Réponse 2 :</label>
            <input type="text" name="answer1_2" required>

            <label for="answer1_3">Réponse 3 :</label>
            <input type="text" name="answer1_3" required>

            <label for="correct_answer1">Réponse correcte :</label>
            <select name="correct_answer1" required>
                <option value="answer1_1">Réponse 1</option>
                <option value="answer1_2">Réponse 2</option>
                <option value="answer1_3">Réponse 3</option>
            </select>

            <hr>
        </div>
        </div>
        <button type="button"  class="add-qst-btn" id="add-question${index}">Ajouter une question</button>

      
            </div>
             <button type="submit">Soumettre</button>
        
            <button type="button" id="add-chapitre">Ajouter chapitre </button>
         </div>
    </form>
    </div>



<script> var index = 1;
    document.addEventListener('DOMContentLoaded', function () {
    var chapcontainer = document.getElementById('chapitre-container');
    var addchapitre = document.getElementById('add-chapitre');
    var questionsContainer, addQuestionButton, questionIndex;

    addchapitre.addEventListener('click', function () {
        var chapDiv = document.createElement('div');
        chapDiv.classList.add('chapitre');

        index++;
        chapDiv.innerHTML = `

        <h2>Chapitre ${index}</h2>
        
        <b><h1>les chapitres de la formation {{session('id_for')}}</h1></b>
                       
                 <div class="form-group">        
                    <label for="titre${index}">Titre du chapitre ${index}</label>
                   
                    <input type="text" name="titre${index}" id="titre${index}" value="{{old('titre${index}')}}" >
                    <span class="text-danger">@error('titre${index}'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="descriptif${index}" >Ecrivez une introduction sur cette formation</label><br>
                    <textarea name="descriptif${index}" rows="15" cols="50" value="{{old('descriptif')}}"></textarea>
                    <span class="text-danger">@error('descriptif${index}'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="vid${index}">Video explicative</label>
                    <input type="text" name="titre_vid${index}" id="titre" value="{{old('titre_vid${index}')}}" ><br><br>
                    <input type="file" name="vid${index}" id="vid${index}" value="{{old('vid${index}')}}"  onchange="previewImage(event)">
                    <span class="text-danger">@error('vid${index}'){{$message}} @enderror </span>
                </div>

                <div class="form-group">
                    <label for="exos${index}">Exercices d'Application:<u> Insérez un fichier contenant quelques exercices d application avec leur correction</u></label>
                    <input type="file" name="exos${index}" id="exos${index}">
                    <span class="text-danger">@error('exos${index}'){{$message}} @enderror </span>
                </div>

                    <h3>Là vous inserez le quizz du chapitre ${index}</h3>
                    
                
        <div class="question" id="questions-container${index}">
                    <h4>Question </h4>

            <label for="question1${index}">Question 1:</label>
            <input type="text" name="question1${index}" required>

            <label for="answer1_1_${index}">Réponse 1 :</label>
            <input type="text" name="answer1_1_${index}" required>

            <label for="answer1_2_${index}">Réponse 2 :</label>
            <input type="text" name="answer1_2_${index}" required>

            <label for="answer1_3_${index}">Réponse 3 :</label>
            <input type="text" name="answer1_3_${index}" required>

            <label for="correct_answer1_${index}">Réponse correcte :</label>
            <select name="correct_answer_1${index}" required>
                <option value="answer1_1_${index}">Réponse 1</option>
                <option value="answer1_2_${index}">Réponse 2</option>
                <option value="answer1_3_${index}">Réponse 3</option>
            </select>
            </select>
           
            <hr>
         <button type="button" class="add-qst-btn" id="add-question${index}">Ajouter une question</button>
            
            <hr>
            `;

     chapcontainer.appendChild(chapDiv);
     
        });

        

        addQuestionButton.addEventListener('click', function () {
        var questionsContainer = chapDiv.querySelector('.question');
        var addQuestionButton = chapDiv.querySelector('.add-qst-btn');
        var questionIndex = 1;
        var questionDiv = document.createElement('div');
        questionDiv.classList.add('question');

        questionIndex++;

        questionDiv.innerHTML = `
            <h4>Question ${questionIndex}</h4>

            <label for="question${questionIndex}${index}">Question ${questionIndex}:</label>
            <input type="text" name="question${questionIndex}${index}" required>

            <label for="answer${questionIndex}${index}_1">Réponse 1 :</label>
            <input type="text" name="answer${questionIndex}${index}_1" required>

            <label for="answer${questionIndex}${index}_2">Réponse 2 :</label>
            <input type="text" name="answer${questionIndex}${index}_2" required>

            <label for="answer${questionIndex}${index}_3">Réponse 3 :</label>
            <input type="text" name="answer${questionIndex}${index}_3" required>

            <label for="correct_answer${questionIndex}${index}">Réponse correcte :</label>
            <select name="correct_answer${questionIndex}${index}" required>
                <option value="answer${questionIndex}${index}_1">Réponse 1</option>
                <option value="answer${questionIndex}${index}_2">Réponse 2</option>
                <option value="answer${questionIndex}${index}_3">Réponse 3</option>
            </select>

            <hr>
        `;

        questionsContainer.appendChild(questionDiv);
    });
});
</script>
<script>
    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('preview');
    
      if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
    
        reader.readAsDataURL(input.files[0]);
      } else {
        preview.src = '#';
        preview.style.display = 'none';
      }
    }
    </script>
    </body>
</html>