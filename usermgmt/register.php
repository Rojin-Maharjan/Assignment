<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | User Management</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <main class="container">
        <h1 class="page-title">Signup</h1>

        <form action="insert.php" method="post" name="user_form">
            <div class="grid">
                <div class="field-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="field-group">
                <label for="password">E-mail</label>
                <input type="email" id="email" name="email" required>
                </div>
                <div class="field-group">
                <label for="username">Password</label>
                <input type="password" id="password" name="password" required>
                </div>
        
                
                <div class="field-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" required>

            </div>
            </div>
             <div class="field-group">
                <input type="checkbox" id="agree" name="agree" class="checkBox" required>
                <label for="agree" class="agree">
                    I agree with the 
                    <a href="terms.php" title="Terms & Conditions" class="termText">Terms & Conditions</a>
                </label>
            </div>

            <button type="submit" name="submit" class="btn">Signup</button>
            <h2 class="or">OR</h2>
            <button type="submit" name="submit" class="google">Contiue with Gmail</button>

        </form>

        <div class="btn-group">
            <span class="note">
                Already have an account?
                <a href="login.php" class="text-link">Sign In</a>
            </span>

    
        </div>
    </main>
</body>
</html>
