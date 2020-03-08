<?php //login.php
if ( isset($_POST['logout'] ) ) {
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash= '1a52e17fa899cf40fb04cfc42e6352f1';
$failure = false; 
if ( isset($_POST['who']) && isset($_POST['pass']) ) 
{
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) 
    {
        $failure = "Email and password are required";
    } 
    else 
    {
        $pass = htmlentities($_POST['pass']); //
        $email = htmlentities($_POST['who']);
        if ((strpos($email, '@') === false))   // Email must have an at-sign (@)
        {
            $failure = "Email must have an at-sign (@)";
        }
        else
        {
            $check = hash('md5', $salt.$pass); // use md5 to Encrypt password
            if ( $check == $stored_hash ) 
            {
                error_log("Login success ".$email);
                header("Location: http://localhost//first/CRUD/index.php?name=".urlencode($email));
                return;
            } 
            else 
            {
                error_log("Login fail ".$pass." $check");
                $failure = "Incorrect password";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Please Log In</h1>
                <?php
                    if ( $failure !== false ) 
                    {
                        echo(
                            '<p style="color: red;" class="col-sm-10 col-sm-offset-2">'.
                                htmlentities($failure).
                            "</p>\n"
                        );
                    }
                ?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="who" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pass">Password:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="pass" id="pass">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">
                        <input class="btn btn-primary" type="submit" value="Log In">
                        <input class="btn" type="submit" name="logout" value="Cancel">
                    </div>
                </div>
            </form>
            <p>
                For a password hint, view source and find a password hint
                in the HTML comments.            
            </p>
        </div>
    </body>
</html>
