<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    §
     <form method="POST" action="">
        <div id="cont">
            <h1>user1</h1>
        <input type="text" name="name" placeholder="Enter Your Name">
        <input type="text" name="email" placeholder="Enter Your Email">
        <button type="button" id="add-user">Add user</button>
        <button type="submit">Soumettre</button>
        </div>
     </form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var container = document.getElementById('cont');
    var adduser = document.getElementById('add-user');
    var index = 1;

    adduser.addEventListener('click', function () {
        var questionDiv = document.createElement('div');
        questionDiv.classList.add('user');

        index++;
        questionDiv.innerHTML = `
        <h1>user${index}</h1>
        <input type="text" name="name${index}" placeholder="Enter Your Name">
        <input type="text" name="email${index}" placeholder="Enter Your Email">

        
            
            <hr>
            `;

container.appendChild(questionDiv);
});
});
</script>
</body>
</html>