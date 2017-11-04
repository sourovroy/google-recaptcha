<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body>
	
<?php require_once __DIR__ . '/validation.php'; ?>

<section class="pt-5">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col col-lg-6">
				<h2 class="mb-4">Login Form</h2>
				
				<?php if(!empty($errors)): ?>
				<div class="alert alert-danger" role="alert">
					<?php echo array_shift($errors); ?>
				</div>
				<?php endif; ?>

				<?php if(!empty($success)): ?>
				<div class="alert alert-success" role="alert">
					<?php echo 'You have logged in successfully.'; ?>
				</div>
				<?php endif; ?>

				<form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="formGroupExampleInput">Username</label>
						<input type="text" class="form-control" id="formGroupExampleInput" name="username">
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Password</label>
						<input type="password" class="form-control" id="formGroupExampleInput2" name="password">
					</div>
					
					<div class="form-group">
						<div class="g-recaptcha" data-sitekey="6Le9LjcUAAAAAG4Z4A55lpU7W61eXLDeDl_9Sv52"></div>
					</div>

					<button type="submit" class="btn btn-primary" name="login_submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>


</body>
</html>