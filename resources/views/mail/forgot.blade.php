<h1>Hellow {{ $user[0]->name }}</h1>
<p> click below link to reset your password </p>
<?php
$id = $user[0]->id;
$link = url("https://softcenter.ictc.go.tz/forgot_password_newpasswordlink/$id");
echo "<a href=$link>Reset Password</a>";
