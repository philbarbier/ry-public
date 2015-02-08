        </div>
        <div class="login_modal_container ryhidden">
            <div class="login_modal_header">
                <img src="/images/login_modal_header.png" alt="Login" border="0" />
            </div>
            <div class="login_modal_content">
                <div class="control_group">
                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" name="firstname" placeholder="First Name" />
                </div>
                <div class="control_group">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" name="lastname" placeholder="Last Name" />
                </div>
                <div class="control_group">
                    <label for="email">E-mail</label>
                    <input id="email" type="text" name="email" placeholder="user@domain.com" />
                </div>
                <div class="control_group">
                    <label for="marketing">I would like to be sent marketing communications from Ryvita</label>
                    <input id="marketing" type="checkbox" name="marketing" />
                </div>
                <div class="control_group">
                    <label for="terms">I agree to the terms and conditions and have read the privacy policy</label>
                    <input id="terms" type="checkbox" name="terms" />
                </div>
                <div class="login_modal_button_container">
                    <img src="/images/login_modal_button.jpg" alt="Login" border="0" />
                </div>
            </div>
        </div>

        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="/js/all.js"></script>
        <script type="text/javascript">
            var submissions = [];
            <?php if (isset($submissions)) { ?>
            submissions = <?php echo json_encode($submissions); ?>;
            <?php } ?>
        </script>
    </body>
</html>
