<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
</head>
<body>
<h1>Change Password</h1>
<form method="post" action="change-pass.php">

    <label for="oldpassword">Old Password:</label>
    <input type="password" name="oldpassword" id="oldpassword"><br>

    <label for="newpassword">New Password:</label>
    <input type="password" name="newpassword" id="newpassword"><br>

    <label for="confirmpassword">Confirm Password:</label>
    <input type="password" name="confirmpassword" id="confirmpassword"><br>

    <input type="submit" value="Change Password">
</form>
</body>
</html>