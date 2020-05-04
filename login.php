<?php include 'template/top.php'; ?>


	<!-- Contact section -->
	<section class="contact-section">
		<div class="container-fluid">
			<div class="row">>
				<div class="col-lg-12 p-0">
					<div class="contact-warp">
						<center>
						<div class="section-title mb-0">
							<h2>Login</h2>
						</div>
						<br>
						<form class="contact-from" style="width: 50%" action="proses-login.php" method="post">
							<div class="row">
								<div class="col-md-12">
									<input type="text" placeholder="Username" name="username">
								</div>
								<div class="col-md-12">
									<input type="password" placeholder="Password" name="password">
								</div>
								<div class="col-md-12">
									<button class="site-btn">Masuk</button>
								</div>
								<br><br><br>
								<?php if(isset($_GET['sts'])){ ?>
								<div class="col-md-12">
									<span style="color:red;">Username/password Anda Salah!</span>
								</div>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->


<?php include 'template/bottom.php'; ?>