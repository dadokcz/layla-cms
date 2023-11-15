</div><!-- End .main -->
            
            <footer class="footer">

                <div class="footer-inner">
                    <div class="container">

                        <div class="info-bar">
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">{{FREE SHIPPING & RETURN}}</h5>
                            <p>{{Free shipping on all orders over $99}}</p>
                        </div><!-- End .info-bar-col -->
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">{{MONEY BACK GUARANTEE}}</h5>
                            <p>{{100% money back guarantee}}</p>
                        </div><!-- End .info-bar-col -->
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">{{ONLINE SUPPORT 24/7}}</h5>
                            <p>{{Highly customer satisfaction}}</p>
                        </div><!-- End .info-bar-col -->
                        </div>


                        <div class="row">

                            <div class="col-sm-6 col-md-3">
                                <div class="widget widget-about">
                                    <h4 class="widget-title">{{Contact Information}}</h4>

                                    <address>
                                        <span>{{123 Shopo St}}</span>
                                        <span>{{+123 456 7890}}</span>
                                        <a href="mailto:info@domain.com">{{info@domain.com}}</a>
                                    </address>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget">
                                    <h4 class="widget-title">Collection</h4>

                                    <ul class="links">
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Home &amp; Garden</a></li>

                                    </ul>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="clearfix visible-sm"></div><!-- clearfix -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget">
                                    <h4 class="widget-title">My Account</h4>

                                    <ul class="links">
                                        <li><a href="#">Account</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">My cart</a></li>

                                    </ul>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget widget-newsletter">
                                    <h4 class="widget-title">Newsletter</h4>
                                    <p>{{Signup for our newsletter}}</p>
                                    <?php if($_POST && add_subscriber($_POST['email_sub'], $_GET['language'])){?>

                                    <div id="" class="alert alert-success" role="alert"><strong>{{Thank you!}}</strong> {{Your email has been successfully subscribed.}}</div>
                                    <?php }elseif($_POST['email_sub']){ ?>
                                    <div id="" class="alert alert-error" role="alert"><strong>{{Oops!}}</strong> {{Something went wrong with adding your email address to the list.}} </div>
                                    <?php } ?>


                                    <form action="#newsletter" method="post">
                                        <div class="form-group">
                                            <a name="newsletter"></a>
                                            <input type="email" name="email_sub" class="form-control" placeholder="{{Your Email}}" required>
                                            <input type="submit" value="{{GO}}" class="btn">
                                        </div><!-- End .form-group -->
                                    </form>

                                   


                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-inner -->
                <div class="footer-bottom">
                    <div class="container">
                        <p class="copyright"><?=get_settings('sitename');?> © <?=date('Y');?>. {{All Rights Reserved}}</p>
 <div style="text-align: right; font-size: 50% !important; margin: -9px 0 -30px 0; position: ;">
                                        <a href="http://www.laylacms.com" target="_blank" class="social-icon" title="Facebook">Developed by <img src="/templates/rosemary/assets/images/layla-copy.png" style="height: 40px; width: auto;"></a>
                                    </div>
                    </div><!-- End .container -->
                </div>

             
            </footer><!-- End .footer -->
        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <script src="/templates/rosemary/assets/js/plugins.js"></script>
        <script src="/templates/rosemary/assets/js/main.js"></script>

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="/templates/rosemary/assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/jquery.themepunch.revolution.min.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems !  
        The following part can be removed on Server for On Demand Loading) -->  
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="/templates/rosemary/assets/js/extensions/revolution.extension.video.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function() {
                "use strict";

                var revapi;
                if ( $("#rev_slider").revolution == undefined ) {
                    revslider_showDoubleJqueryError("#rev_slider");
                } else {
                    revapi = $("#rev_slider").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "assets/js/",
                        sliderLayout: "auto",
                        dottedOverlay:"none",
                        delay: 15000,
                        navigation: {
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on"
                            },
                            arrows: {
                                style: "custom",
                                enable: true,
                                hide_onmobile: false,
                                hide_under: 768,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "bottom",
                                    h_offset: 63,
                                    v_offset: 48
                                },
                                right: {
                                    h_align: "left",
                                    v_align: "bottom",
                                    h_offset: 85,
                                    v_offset: 48
                                }
                            },
                            bullets: {
                                enable: false
                            }
                        },
                        responsiveLevels: [1200,992,768,480],
                        gridwidth: [870,679,640,480],
                        gridheight: [468,400,360,300],
                        lazyType: "smart",
                        spinner: "spinner2",
                        parallax: {
                            type: "off"
                        },
                        debugMode: false
                    });
                }
            });
        </script>

                <script type="text/javascript">
                $( ".submit-shipping" ).click(function() {
                    
                     // $("#tabs").tabs();

                      // assume you want to change to the 3rd tab after 3 seconds
                      setTimeout(function() {
                          $(".nav-tabs").tabs("option", "active", 2);
                      }, 100);

                    return false;

                });
                </script>


    </body>
</html>