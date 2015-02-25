            </div>
        </div>
        <div class="footer_links_container">
            <div class="footer_wrapper">
                <div class="footer_links left">
                    <a href="/rules">Rules &amp; Regulations</a>
                    <a href="/terms">Terms &amp; Conditions</a>
                    <a href="http://ryvita.com/en-ca/" target="_blank">Ryvita.com/en-ca</a>
                </div>
                <div class="footer_links right">
                    <a style="text-transform: none;" href="https://www.facebook.com/ryvitacanada" target="_blank">Facebook</a>
                </div>
                <div class="clear"></div>
                <div class="footer_copyright">
                    The Jordans &amp; Ryvita Company, a division of ABF Grain Products &copy; 2015 RYVITA&copy; 
                </div>
            </div>
        </div>
        <div class="login_modal_container ryhidden">
            <div class="login_modal_header">
                <img src="/images/login_modal_header.png" alt="Login" border="0" />
            </div>
            <div class="login_modal_content">
                <div class="login_modal_fields">
                    <div class="control_group">
                        <label for="firstname">First Name</label>
                        <br />
                        <input id="firstname" type="text" name="firstname" placeholder="First Name" class="form-control" />
                    </div>
                    <div class="control_group">
                        <label for="lastname">Last Name</label>
                        <br />
                        <input id="lastname" type="text" name="lastname" placeholder="Last Name" class="form-control" />
                    </div>
                    <div class="control_group">
                        <label for="email">E-mail</label>
                        <br />
                        <input id="email" type="text" name="email" placeholder="user@domain.com" class="form-control" />
                    </div>
                </div>
                <div class="login_modal_optins">
                    <div class="checkbox">
                        <label for="marketing">
                            <input id="marketing" type="checkbox" name="marketing" />
                                I would like to be sent marketing communications from Ryvita
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="terms">
                            <input id="terms" type="checkbox" name="terms" />
                                I agree to the terms and conditions and have read the privacy policy
                        </label>
                    </div>
                </div>
                <div class="login_modal_button">
                    <img src="/images/login_modal_button.jpg" alt="Login" border="0" />
                </div>
                <div class="fb_login_container">
                    <h6>Fill out the form above or login with Facebook below</h6>
                    <fb:login-button scope="public_profile,email,publish_actions" onlogin="checkLoginState();">
                    </fb:login-button>
                </div>
            </div>
        </div>
        
        <div id="fb-root"></div>

        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="/js/jquery.cookie.js"></script>
        <script src="/js/all.js"></script>
        <script type="text/javascript">
            var submissions = [];
            <?php if (isset($submissions)) { ?>
            submissions = <?php echo json_encode($submissions); ?>;
            <?php } ?>
            window.fbAsyncInit = function() {
                FB.init({
                  appId      : '916151545095923',
                  xfbml      : true,
                  version    : 'v2.1'
                });
              };

              (function(d, s, id){
                 var js, fjs = d.getElementsByTagName(s)[0];
                 if (d.getElementById(id)) {return;}
                 js = d.createElement(s); js.id = id;
                 js.src = "//connect.facebook.net/en_US/sdk.js";
                 fjs.parentNode.insertBefore(js, fjs);
               }(document, 'script', 'facebook-jssdk'));
        </script> 
    </body>
</html>
