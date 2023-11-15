</div>
				<!-- Footer -->
					<footer id="footer"><a name="footer"></a>
						<section>
							<form method="post" action="#footer">
								
								<?php if($_POST && add_subscriber($_POST['email_sub'], $_GET['language'])){?>

								<div id="" class="alert alert-success" role="alert"><strong>{{Thank you!}}</strong> {{Your email has been successfully subscribed.}}</div>
								<?php }elseif($_POST['email_sub']){ ?>
								<div id="" class="alert alert-error" role="alert"><strong>{{Oops!}}</strong> {{Something went wrong with adding your email address to the list.}} </div>
								<?php } ?>

								<div class="field">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" />
								</div>
								<div class="field">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" />
								</div>
								<div class="field">
									<label for="message">Your message to me</label>
									<textarea name="message" id="message" rows="3"></textarea>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Subscribe newsletter" /></li>
								</ul>
							</form>
						</section>
						<section class="split contact">
							<section class="alt">
								<h3>{{Address}}</h3>
								<p>1234 Somewhere Road #87257<br />
								Nashville, TN 00000-0000</p>
							</section>
							<section>
								<h3>{{Phone}}</h3>
								<p><a href="#">(000) 000-0000</a></p>
							</section>
							<section>
								<h3>{{Email}}</h3>
								<p><a href="#">info@untitled.tld</a></p>
							</section>
							<section>
								<h3>{{Social}}</h3>
								<ul class="icons alt">
									<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Untitled</li><li>Developed by <a href="https://www.laylacms.com">LAYLA</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="/templates/loco/assets/js/jquery.min.js"></script>
			<script src="/templates/loco/assets/js/jquery.scrollex.min.js"></script>
			<script src="/templates/loco/assets/js/jquery.scrolly.min.js"></script>
			<script src="/templates/loco/assets/js/skel.min.js"></script>
			<script src="/templates/loco/assets/js/util.js"></script>
			<script src="/templates/loco/assets/js/main.js"></script>

	</body>
</html>