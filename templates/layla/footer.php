
			<footer>
				<div class="">
					<hr>
					<div class="row">
						<div class="subscribe subscribe-footer">
							<div class="col-sm-4">
								<p class="lead">{{Sign up for our news letter.}}</p>
								<p>{{We are always updating, stay in touch!}}</p>
							</div>
							<div class="col-sm-8">
								<a name="newsletter" />
								<form action="#newsletter" role="form" method="post">  
									<div class="row">
										<div class="col-xs-12">
											<div class="input-group input-group-lg">
												<input type="email" class="form-control input-lg" name="email_sub" placeholder="{{Your email address}}">
												<div class="input-group-btn">
													<input type="submit" class="btn btn-primary btn-lg" type="button" onclick="subscribe(&quot;emailAddress2&quot;)">{{Subscribe}}</button>
												</div>
											</div>
										</div>
									</div>
								</form>

								<?php if($_POST && add_subscriber($_POST['email_sub'], $_GET['language'])){?>

								<div id="" class="alert alert-success" role="alert"><strong>{{Thank you!}}</strong> {{Your email has been successfully subscribed.}}</div>
								<?php }elseif($_POST['email_sub']){ ?>
								<div id="" class="alert alert-error" role="alert"><strong>{{Oops!}}</strong> {{Something went wrong with adding your email address to the list.}} </div>
								<?php } ?>

							</div>
						</div>
					</div>
					
					<hr>
					
					<div class="row">
						<div class="col-sm-6">
							<p>© 
								<script type="text/javascript">
									document.write(new Date().getFullYear());
								</script> Layla · Developed in Prague by DADOK
							</p>
							<p>
								<!-- {{Credits}} <a href="http://www.instagram.com/ondrejdadok" target="_blank"><span class="footer-twitter">@dadokofficial</span></a> -->
								<!-- <a href="http://www.twitter.com/majcopy" target="_blank"></a> -->
							</p>
						</div>
						<div class="col-sm-6 text-right footer-right">

							<div class="social text-right">
								<a href="https://www.facebook.com/dadokcz/?ref=ts&fref=ts" target="_blank"><i class="fa fa-2x fa-facebook"></i></a>
								<!-- <a href="http://www.twitter.com/dadokofficial" target="_blank"><i class="fa fa-2x fa-twitter"></i></a> -->
								<a href="mailto:info@laylacms.com" target="_blank"><i class="fa fa-2x fa-envelope"></i></a>
								
							</div>
							
						</div>
					</div>
					
				</div>
			</footer>
       
        </div>
            

        <script src="/templates/layla/assets/js/jquery-1.11.3.min.js"></script>

        <script src="/templates/layla/assets/js/bootstrap.min.js"></script>
        
        <script src="/templates/layla/assets/js/particles.js"></script>
        
		<script src="/templates/layla/js/tipso.js"></script>

		<script src="/templates/layla/js/app.js"></script>



		<script>
            particlesJS.load('particles-js', '/templates/layla/assets/js/particlesjs-config.json', function() {
                console.log('callback - particles.js config loaded');
            });
			
			$("#subscribeform").submit(function(e) {
			    e.preventDefault();
				subscribe("emailAddress");
			});
			$("#subscribeform2").submit(function(e) {
			    e.preventDefault();
				subscribe("emailAddress2");
			});
		</script>
		
		<script src="/templates/layla/assets/js/scrollReveal.min.js"></script>
		<script type="text/javascript">
			(function($) {

				'use strict';

				window.sr= new scrollReveal({
					reset: false,
					move: '25px',
					scale: {
						direction: 'up',
						power: '0%'
					},
					opacity: 0,
					mobile: true
				});

			})();
		</script>


   
   <div id="particles-js"></div>
  

</div>

<?php get_js_reports(); ?>
</body>
</html>