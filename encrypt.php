
<?PHP

echo $password = "123456";

$md5_password = md5($password);

echo $md5_password;
?>

<form method="POST">
    Password: <input type="text" name="password">
    <input type="submit">
</form>