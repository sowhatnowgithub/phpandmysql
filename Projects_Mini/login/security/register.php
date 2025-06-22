<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = htmlspecialchars(strtolower(trim($_POST["user-name"])));
    $usermail = htmlspecialchars(strtolower(trim($_POST["user-mail"])));
    $userpassword = htmlspecialchars(trim($_POST["user-password"]));
    $dateToday = date("dnY");
    $contentTofile = "$dateToday $user $usermail $userpassword \n";
    $userData = file("users.txt");
    echo var_dump($userData) . "<br>" . count($userData) . "<br>";
    ($filePointer = fopen("users.txt", "a")) or die("unable to open the file");
    fwrite($filePointer, $contentTofile);
    fclose($filePointer);
}
?>
