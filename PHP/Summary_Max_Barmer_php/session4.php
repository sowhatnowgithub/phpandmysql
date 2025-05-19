<?php

session_start();

echo "Session ID :- ".session_id();
echo '<br> $_SESSION Variables:-';
echo var_dump($_SESSION)."<br>";
print '<br>using session_unset() => this will set all session variables to be unset unset($_SESSION["sessionname"]) => this will set particular session variable to be removed <br>';

session_unset();
echo "<br>Session Id:".session_id();
echo '<br>$_SESSION vairbales after using session_unset() :-';
echo var_dump($_SESSION);
print '<br> <br> session_destroy() => this will destroy the session altogether <br>';

session_destroy();

echo "<br>Session ID after session_destroy() :- ";
echo var_dump(session_id());

?>
