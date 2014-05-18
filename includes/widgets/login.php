
<body>
    <div class="row">



<div class="col-md-9">
<div class="jumbotron">
    <h1>Tech Gigs</h1>
    <h4>Browse Freelancers , Search, Interview & Post Jobs Free.</h4>
</div>
    </div>

        <div class="col-md-2 ">

            <form action = "login.php" class="form-signin" role="form" method="post">
                <h3 class="form-signin-heading">Please sign in</h2>
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <h5><a href = "register.php">Register</a></h5>
            </form>

        </div> 
    </div>

</body>
<?php
include 'includes/overall/footer.php';
?>