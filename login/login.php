<? $error=false?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

	<link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>


<h2>Welcom in our pregnancy App</h2>
<?php if($_POST){ 
 if($errors): ?>
		<?php foreach($errors as $error): ?>
			<span><?=$error?> </span> 
		<?php endforeach;?>
<?php endif; }?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="signUp" method="POST" enctype="multipart/form-data">
			<h1>Create Account</h1>
			 
			<span>or use your email for registration</span>
			<input type="text" placeholder="Username" name="username"/>
			<input type="text" placeholder="email" name="email"/>
			<input type="password" placeholder="password" name="password"/>
			<input type="password" placeholder="confirm Password " name="passwordConfirmed" class="passwordicon" />
			<input type="file" name="photo"  placeholder="image">
			<input type="text" placeholder="statut" name="statut" />

            <!-- <i class="fas fa-eye"></i> -->
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="signIn" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>

			<input type="text" placeholder="Username"  name="username"/>
			<input type="password" placeholder="password"  name="password"/>
			<input type="text" placeholder="statut" name="statut" />
			<a href="/passRegeneration">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start pregnant period with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<!-- <footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p> -->
</footer>

<script src="js/login.js"></script>
</body>
</html>
