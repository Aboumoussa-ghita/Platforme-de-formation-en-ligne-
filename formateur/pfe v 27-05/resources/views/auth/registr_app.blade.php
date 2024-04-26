<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/app.css" rel="stylesheet">
    <style>/* Couleurs personnalisées */
body { 
  background: url(images/bg1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.titre{
    color: #ffffff;
    font-family: Andalus;
    margin-top: 25px;
    font-size: 400%;
    text-align: center;
    text-shadow: 2px 2px #143368;
}
.form-container {
  background-color: #e3e1e10e;
  border: 1px solid #ddd;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  color: #99b2e7;
}

input[type="text"],
input[type="date"],
input[type="email"],
input[type="password"],
input[type="tel"],
.btn {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
.formulaire{
    margin-right:90px;
    margin-left: 50%; 
    background-color: rgba(17, 44, 81, 0.8) ;
    border-radius: 15px;
     
}
.btn {
  background-color: #3490dc;
  color: #fff;
  cursor: pointer;
}

.btn:hover {
  background-color: #184a74;
}

a {
  color: #34dcd1;
}

/* Alignement des éléments sur la même ligne */
.row-flex {
  display: flex;
  flex-wrap: wrap;
}

.row-flex .form-group {
  flex: 1;
  margin-right: 10px;
}

.row-flex .form-group:last-child {
  margin-right: 0;
}

@media (max-width: 768px) {
  .row-flex .form-group {
    flex: 100%;
    margin-right: 0;
  }
}
</style>
    <title>Inscription Apprenant</title>
</head>
<body>
    <h4 class="titre text-center">Inscription d'un apprenant</h4>
    <div class="container ">
        <div class="row formulaire">
            <div class="col-md-12 col-md-offset-4" style="margin-top: 20px">
                <form action="{{route('apprenti_inscription')}}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="row-flex">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="{{old('nom')}}">
                        <span class="text-danger">@error('nom'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="{{old('prenom')}}">
                        <span class="text-danger">@error('prenom'){{$message}} @enderror </span>
                    </div></div>
                    <div class="form-group">
                        <label for="sate_naiss">Date de naissance</label>
                        <input type="date" class="form-control" id="date_naiss" name="date_naiss" value="{{old('date_naiss')}}" >
                        <span class="text-danger">@error('date_naiss'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="niveau">Niveau d'etudes</label>
                        <input type="text" class="form-control" id="niveau" name="niveau" placeholder="" value="{{old('niveau')}}">
                        <span class="text-danger">@error('niveau'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telephone</label>
                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="Tel" value="{{old('tel')}}">
                        <span class="text-danger">@error('tel'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="adresse@exemple.com" value="{{old('email')}}" >
                        <span class="text-danger">@error('email'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="mdp1">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp1" name="mdp1"  placeholder="Mot de passe" >
                        <span class="text-danger">@error('mdp1'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="mdp_rep">Resaisissez le mot de passe</label>
                        <input type="password" class="form-control" id="mdp_rep" name="mdp_rep" placeholder="Encore une fois le mot de passe " > 
                        <span class="text-danger">@error('mdp_rep'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="photo_for"> Photo</label>
                          <input class="img" type="file" name="photo_for" id="photo_for" >
                      </div>
                   <div class="form-group">
                    <button class="btn ntm-block btn-info" type="submit" >S'inscrire</button>
                   </div>
                    <p> J'ai déjà un compte:  <a href="login"> Se connecter</a></p>

                </form>
                  </div>
                    </footer>
                  </div>
            </div>
        </div>
    </div>

                        
</body>
<script src="js/app.js"></script>
</html>