<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/app.css" rel="stylesheet">
    <title>Authentication</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="{{Route('veriflogin')}}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <h4>Connexion</h4>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                        <span class="text-danger">@error('email'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                        <span class="text-danger">@error('mdp'){{$message}} @enderror </span>
                    </div>
                    <div class="form-group">  
                        <button class="btn btn-primary" type="submit" >Se connecter</button>
                       </div> 
                    <div>
                        <p class="text-center">Je n'ai pas de compte</p>
                        <a href="insc_apprenti ">Je veux suivre des formations</a> &nbsp;&nbsp;
                        <a href="insc_formateur">Je suis formateur</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
<script src="js/app.js"></script>
</html>