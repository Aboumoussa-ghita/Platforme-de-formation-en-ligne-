
<?php

$title="";

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Système de notification</title>
    <style>


        input[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 920px;
            text-align: right;
            margin-top:1%;

        }
    </style>
</head>
<body>
<div class="card-single" style="background-color: #8bc3ebdd; padding: 2rem; border-radius: 10px; box-shadow: 2px 5px 10px 4px rgb(0 0 0 / 10%); margin-left: 20px;">
    <form method="post" action="envoie_notif.php?id=<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label>Saisissez les modifications à faire :</label>
            <textarea name="message" class="form-control" rows="6"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="post" id="post" value="Soumettre" />
        </div>
    </form>
</div>
</body>
</html>

<?php $content=ob_get_clean();?>
<?php include_once 'views/layout.php'; ?>
