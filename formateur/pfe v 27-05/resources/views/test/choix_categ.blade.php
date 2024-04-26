<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .formulaire{ 
            margin-left: 35% ;
           width: 60%;
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
        form {
            background-color: #1e547bb6;
            padding: 4rem;
            border-radius: 9px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .container {
        
            width: 60%;
            margin-top:3%; 
            margin-left: 20%;
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
        .cat{
            margin-left: 35%;
            font-size: 145%;
        }
    </style>
</head>
<body>
    <div class=" container formulaire">
    <form action="ajout_categ" method="POST">
        @csrf
        <div class="form-group">
            <label for="categories"><H2>Quelles sont les catégories qui vous intéressent le plus?</H2></label>
            
               
      @php
                 $cnx=mysqli_connect('localhost','root','','pfe');
                 $selection=mysqli_query($cnx,'SELECT * FROM categorie');
                
      @endphp
                <div class="cat">
                 @while ($categorie = mysqli_fetch_assoc($selection))
                  <div class="btn-group-toggle" data-toggle="buttons">
                  <input type="checkbox" name="$categorie[]"> {{$categorie["C_NOM"]}}</input>
                 
                @endwhile
            </div>
      <br>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
        @php
        /*
        $id_user=3;
        $cat=('$categorie');
        $cnx=mysqli_connect('localhost','root','','pfe');
        foreach ($cat as $value){
        $insertion="INSERT into choix_categorie values('$value','$id_user')";
        $res=mysqli_query($cnx,$insertion);
        }*/
        @endphp
    </form>
    </div>
</body>
</html>