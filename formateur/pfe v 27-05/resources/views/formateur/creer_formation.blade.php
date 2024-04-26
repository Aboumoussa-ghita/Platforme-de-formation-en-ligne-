<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/app.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            float: right;
            width: 60%;
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
            background-color: #6b4caf;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #5445a0;
        }
        .formulaire{
            margin-right:2%; 
            margin-left: 35% ;
           width: 40%;
        }
        .titre{
            margin-top: 10px;
            margin-left: 30%;
            font-family: Andalus;
            font-size: 35px;
            color: #1e547bb6 ;
        }
    </style>
    <title>Créer formation</title>
</head>
<body>
    <br>
    @include('layout.navbar')
    @include('layout.sidebar')

    <div class="container formulaire" style="float: right;width: 80%; ">
        <h2 class="titre"><b>Ajouter une formation</b></h2>
<main >
        <form action="{{route('ajout_for')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="titre">Titre de la formation</label>
                {{ session('id_user') }}
                <input type="text" name="titre" id="titre" value="{{old('titre')}}" >
                <span class="text-danger">@error('titre'){{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label for="niveau_diff">Niveau de difficulté</label>
                <select name="niveau_diff">
                    <option name="opt1">Basic</option>
                    <option name="opt2">Intermédiaire</option>
                    <option name="opt3">Avancé</option>
                </select>
                <span class="text-danger">@error('niveau_diff'){{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label for="descriptif" >Ecrivez une introduction sur cette formation</label><br>
                <textarea name="descriptif" rows="15" cols="50" value="{{old('descriptif')}}"></textarea>
                <span class="text-danger">@error('descriptif'){{$message}} @enderror </span>
            </div>
            <div class="form-group">
                <label for="categories">Cette formation appartient à quelle catégorie?</label>
                <select name="categorie" id="categorie" selected value="">
                    <option name='categorie'></option>
                 @php
                 $nb_chapitres = 3;
                 $cnx=mysqli_connect('localhost','root','','pfe');
                 $selection=mysqli_query($cnx,'SELECT * FROM categorie');
                 while ($categorie = mysqli_fetch_assoc($selection)) {
                  echo "<option name='categorie'>{$categorie['C_NOM']}</option>";
                 }
                @endphp
                
                </select>
                <label for="autre_cat">Si la formation appartient à une nouvelle catégorie veuillez l'ajouter ici</label>
                <input type="text" name="autre_cat" id="autre_cat">
                <span class="text-danger">@error('categorie'){{$message}} @enderror </span>
            </div>
            <script>
                var selectElement = document.getElementById('categorie');
                var inputElement = document.getElementById('autre_cat');
            
                selectElement.addEventListener('change', function() {
                    if (selectElement.value !== "") {
                        inputElement.disabled = true;
                    } else {
                        inputElement.disabled = false;
                    }
                });
            </script>
            <div class="form-group">
              <label for="photo_for"> Photo</label>
                <input class="img" type="file" name="photo_for" id="photo_for" value="{{old('photo')}}" onchange="previewImage(event)" >
                <img id="preview" src="#" alt="Aperçu de la photo" style="display: none; max-width: 200px;">
            </div>
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
                
            <button type="submit" name="suiv" href="route{{'chapitre'}}" >Suivant</button>
        </form>
</main>
    </div>
</body>
</html>