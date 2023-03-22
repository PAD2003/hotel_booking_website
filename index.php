<!-- noi nguoi dung dien username & password -->
<!-- Doan code duoi day duoc tham khao tu CodePen va duoc chinh sua lai -->
<!DOCTYPE html>
<html lang="en" >

	<head>
		<meta charset="UTF-8">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
		<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'><link rel="stylesheet" href="./index.css">
	</head>

	<body>
		<form method = "post">
			<a href="https://front.codes/" class="logo" target="_blank">
				<img src="https://assets.codepen.io/1462889/fcy.png" alt="">
			</a>

			<div class="section">
				<div class="container">
					<div class="row full-height justify-content-center">
						<div class="col-12 text-center align-self-center py-5">
							<div class="section pb-5 pt-5 pt-sm-2 text-center">
								<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
								<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
								<label for="reg-log"></label>
								<div class="card-3d-wrap mx-auto">
									<div class="card-3d-wrapper">
										<div class="card-front">
											<div class="center-wrap">
												<div class="section text-center">
													<h4 class="mb-4 pb-3">Log In</h4>

													<?php if (isset($_GET['error'])) { ?>
														<p class = "error"> <?php echo $_GET['error']; ?> </p>
													<?php } ?>

													<div class="form-group">
														<input type="email" name="login_email" class="form-style" placeholder="Your Email" id="login_email" autocomplete="off">
														<i class="input-icon uil uil-at"></i>
													</div>	
													<div class="form-group mt-2">
														<input type="password" name="login_password" class="form-style" placeholder="Your Password" id="login_password" autocomplete="off">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<button class="btn mt-4" type = "submit" formaction="account/cusLogin.php"> I am a customer </button> 
													<button class="btn mt-4" type = "submit" formaction="account/empLogIn.php"> Log In </button> 
												</div>
											</div>
										</div>
										<div class="card-back">
											<div class="center-wrap">
												<div class="section text-center">
													<h4 class="mb-4 pb-3">Sign Up</h4>
													<div class="form-group">
														<input type="text" name="register_name" class="form-style" placeholder="Your Full Name" id="register_name" autocomplete="off">
														<i class="input-icon uil uil-user"></i>
													</div>	
													<div class="form-group mt-2">
														<input type="email" name="register_email" class="form-style" placeholder="Your Email" id="register_email" autocomplete="off">
														<i class="input-icon uil uil-at"></i>
													</div>	
													<div class="form-group mt-2">
														<input type="password" name="register_password" class="form-style" placeholder="Your Password" id="register_password" autocomplete="off">
														<i class="input-icon uil uil-lock-alt"></i>
													</div>
													<button class="btn mt-4" type = "submit" formaction="account/cusRegister.php"> I am a new customer </button> 
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</body>

</html>
