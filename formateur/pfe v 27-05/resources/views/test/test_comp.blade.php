<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Test de compétences</h1>
    <form action="/resultat" method="POST">
        @csrf
        @php
        $apprenti_id=13;
            $cnx=mysqli_connect('localhost','root','','pfe');
            $query="Select * From qstns_test q natural Join choix_categorie c natural join reponse_test r where q.categorie=c.categorie AND q.id_qstn=r.qstn And c.apprenti=$apprenti_id;";
            $result=mysqli_query($cnx,$query);
            $questions=mysqli_fetch_array($result);
        @endphp
        @foreach($questions as $question)
            <div>
                <h3>{{ $question->question }}</h3>
                @foreach($question->reponses as $reponse)
                    <label>
                        <input type="radio" name="reponse[{{ $question->id_qstn }}]" value="{{ $reponse->id_rep }}">
                        {{ $reponse->reponse }}
                    </label>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>