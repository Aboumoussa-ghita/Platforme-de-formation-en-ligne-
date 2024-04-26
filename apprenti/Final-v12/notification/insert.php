<?php
if(isset($_POST["subject"]))
{
    $conn = mysqli_connect('localhost','root','','pfe') or die(mysqli_error());

$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$query = "INSERT INTO comments(comment_subject, comment_text)VALUES ('$subject', '$comment')";
mysqli_query($conn, $query);
}
?>