<?php
// - - - - - - - - - - - - - - - - - - -
// Author: Christopher Hair
// Website: www.chrishair.co.uk
// - - - - - - - - - - - - - - - - - - -
if (isset($_POST['submit'])){
  $error = '';
  $username = trim(stripslashes($_POST['username']));
  $password = trim(stripslashes($_POST['password']));
    if ($username == '' || preg_match('/\s/m', $username)) {
        $error .= "<p><strong>Invalid Username.</strong></p>\n";
    }
    if ($password == '' || preg_match('/\s/m', $password)) {
        $error .= "<p><strong>Invalid Password.</strong></p>\n";
    }
    if ($error == '') {
        echo "<p>Success</p>\n";
        echo "<h1>" . htmlspecialchars($username) . ":" . crypt($password) . "</h1>\n";
    } else {
        echo $error;
    }
}
?>