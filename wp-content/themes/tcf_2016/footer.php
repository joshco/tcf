<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TCF_2016
 */

?>
 <!-- FOOTER BEGIN -->
      
      <div class="footer-wrap"> 
        
        <!-- _footer_signup.html -->
        
        <div id="footer-yellow-bar">
          <div id="email-sign-up-footer" class="email-signup form width-container">
            <div class="sidebar-header email">Stay Informed <span class="sidebar-section-text">Join now to receive email updates on news, events and more.</span></div>
            <!-- <a class="privacy-policy left">View privacy policy.</a> -->
            <!-- TODO this form probably doesn't work, figure out how to get it into NB -->
            <form id="new_home_page_new_signup_form" class="ajaxForm signup_form" method="POST" action="/forms/signups" enctype="multipart/form-data">
              <input name="authenticity_token" type="hidden" value="CeYuL4Dxby344DwrRIEutEUwJy2xunOWdNFuT9Z8RLA="/>
              <input name="page_id" type="hidden" value="18"/>
              <input name="return_to" type="hidden" value="http://www.tylerclementi.org/"/>
              <div class="email_address_form" style="display:none;">
                <p>
                  <label for "email_address">Optional email code</label>
                  <br/>
                  <input name="email_address" type="text" class="text" id="email_address" autocomplete="off"/>
                </p>
              </div>
              <input id="page_id" name="page_id" type="hidden" value="18" />
              <div class="form-errors"></div>
              <input required="" class="text" id="signup_email" name="signup[email]" placeholder="Email address" type="email" />
              <input class="submit-button" type="submit" name="commit" value="Send me updates" />
            </form>
          </div>
        </div>
        <!-- footer-yellow-bar - end --> 
        
        <!-- /_footer_signup.html -->
        
        <footer class="clearfix width-container">
          <div id="footer-top"> 
            
            <!-- _footer_nav.html -->
            <nav id="footer-menu" role="navigation" class="width-container">
	         <!--   <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?> -->
	        	<div id="footer-menu-about" class="footer-menu"> 
					<?php wp_nav_menu( array('menu' => 'Footer Menu About' )); ?>
	        	</div>
				<div id="footer-menu-programs" class="footer-menu"> 
	            	<?php wp_nav_menu( array('menu' => 'Footer Menu Programs' )); ?>
	        	</div>
	        	<div id="footer-menu-action" class="footer-menu">
					<?php wp_nav_menu( array('menu' => 'Footer Menu Action' )); ?>
	        	</div>
	        	<div id="footer-menu-day1" class="footer-menu">
					<?php wp_nav_menu( array('menu' => 'Footer Menu Day1' )); ?>
				</div>
				<div id="footer-menu-resources" class="footer-menu">
				<?php wp_nav_menu( array('menu' => 'Footer Menu Resources' )); ?>
				</div>
				<div id="footer-menu-misc" class="footer-menu">
				<?php wp_nav_menu( array('menu' => 'Footer Menu Misc' )); ?>
				</div>
			</nav>
            <!-- /_footer_nav.html -->
            
            
          </div>
          <!-- footer-top - END -->
          <div id="footer-mid">
            <div id="foot_logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('template_directory');?>/assets/images/tylerclementi_logo_footer.png" alt="The Tyler Clementi Foundation" /></a> </div>
            <div id="footer_tc">The Tyler Clementi Foundation<br />
              104 West 29th St. 4th Floor &#8226; NYC, NY 10001<br />
              <a href="/the_foundation">The Tyler Clementi Foundation is a 501(c)(3) non-profit organization committed to anti-bullying at school, home, work and church.</a> </div>
          </div>
          <!-- footer-mid - END -->
          <div class="clearfix"></div>
          <div id="footer-btm">
            <ul id="footer-btm-links">
              <li class="footer-copyright">&copy; Tyler Clementi Foundation. All rights reserved.</li>
              <li><a href="/privacy-policy" >Privacy Policy</a></li>
              <li class="no-link"><a href="" >Terms of Use</a></li>
              <li class="no-link"><a href="" >Anti-bullying Policy</a></li>
              <li><a href="/contact_us" class="">Contact Us</a></li>
              <li class="no-link"><a href="" >Updates</a></li>
            </ul>
            <div class="row-fluid">
              <div id="footer-nb-link" class="span5"> 
                 
                </div>
              <!-- footer-nb-link - END --> 
            </div>
            <!-- row-fluid - END --> 
          </div>
          <!-- footer-btm - END -->
          <div class="footer-text"></div>

<div id="fb-root"></div>
          <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 126739610711965,
      channelUrl : "//tylerclementi.nationbuilder.com/channel.html",
      status     : true,
      version    : "v2.3",
      cookie     : true,
      xfbml      : true
    });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.async = true;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> 
          

          <!-- Quantcast -->
          <script type="text/javascript">
            _qevents.push(
              { qacct:"p-5ftmjaPECGTTU" }
              );
            </script>
                    <noscript>
                    <div style="display: none;"><img src="//pixel.quantserve.com/pixel?a.1=p-5ftmjaPECGTTU" height="1" width="1" alt="Quantcast"/></div>
                    </noscript>
          <!-- End Quantcast -->

		  <?php wp_footer(); ?>

        </footer>
        
        
      </div>
      <!-- footer wrap - END --> 
      <!-- .width-container --> 



   
    </div>
    <!-- #body --> 
  </div>
  <!-- #wrap --> 
</div>
<!-- #pattern --> 

<!-- HOMEPAGE MODAL -- BEGIN --> 

<!-- _homepage_modal.html --> 
<!--<div class="remodal-bg">
  <a href="#modal-signup">Maintenance in Process</a>
</div>-->

<div class="remodal modalDialog" data-remodal-id="modal-signup" role="dialog" aria-labelledby="modal-signup-header" aria-describedby="modal-signup-text"> 
  <!-- <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button> -->
  <div id="modal-signup"> <img id="modal-signup-img" src="http://d3n8a8pro7vhmx.cloudfront.net/themes/5463bb672213933389000001/attachments/original/1451579102/img_modal-signup_600x250.png?1451579102" alt="Take the Upstander Pledge" />
    <h2 id="modal-signup-header">Show you're an upstander by taking the <a href="/pledge">Upstander Pledge</a>.</h2>
    <div id="modal-signup-text">Join <b>more than 10,000 Upstanders</b> who proudly stand against bullying online, in school, at work, or in their faith community by signing the <a href="/pledge">Upstander Pledge</a>.</div>
    <!-- form begin -->
    <div id="modal_signup_container">
         <script type="text/javascript" src="//d1aqhv4sn5kxtx.cloudfront.net/actiontag/at.js"></script>
	<div class="ngp-form" data-labels="inline" data-template="minimal" data-id="-4624407374704997632"></div>
	
    <form id="new_home_page_new_signup_form" class="ajaxForm signup_form" method="POST" action="/forms/signups" enctype="multipart/form-data">
      <input name="authenticity_token" type="hidden" value="CeYuL4Dxby344DwrRIEutEUwJy2xunOWdNFuT9Z8RLA="/>
      <input name="page_id" type="hidden" value="18"/>
      <input name="return_to" type="hidden" value="http://www.tylerclementi.org/"/>
      <div class="email_address_form" style="display:none;">
        <p>
          <label for "email_address">Optional email code</label>
          <br/>
          <input name="email_address" type="text" class="text" id="email_address" autocomplete="off"/>
        </p>
      </div>
      <input id="page_id" name="page_id" type="hidden" value="18" />
      <div id="modal-signup-form">
        <div class="form_errors"></div>
        <div class="modal-signup-form-field first-name">
          <input class="text" id="signup_first_name" name="signup[first_name]" placeholder="First Name" type="text" />
        </div>
        <div class="modal-signup-form-field last-name">
          <input class="text" id="signup_last_name" name="signup[last_name]" placeholder="Last Name" type="text" />
        </div>
        <div class="modal-signup-form-field email">
          <input required="required" class="text" id="signup_email" name="signup[email]" placeholder="Email" type="text" />
        </div>
        <div class="modal-signup-form-field zip">
          <input required="required" class="text" id="signup_submitted_address" name="signup[submitted_address]" placeholder="Zip" type="text" />
        </div>
        <div id="modal-signup-updates">
          <input name="signup[email_opt_in]" type="hidden" value="0" />
          <input class="checkbox" checked="checked" id="signup_email_opt_in" name="signup[email_opt_in]" type="checkbox" value="1" />
          Send me updates from the Tyler Clementi Foundation. <a href="/privacy-policy">View privacy policy.</a></div>
        <div id="modal-signup-submit">
          <input class="submit-button" type="submit" name="commit" value="Sign the Pledge" />
        </div>
      </div>
      <!-- Form - End -->
      </div>
      <!-- Modal Signup Container - DESKTOP - End -->
    </form>
    <!-- form end -->
    <button data-remodal-action="cancel" class="remodal-cancel close">I'll take the pledge later ></button>
  </div>
  <!-- modal-signup --> 
</div>
<!-- modalDialog --> 

<!-- You can define the global options --> 
<script>
window.REMODAL_GLOBALS = {
NAMESPACE: 'remodal',
DEFAULTS: {
  //     hashTracking: true,
  //     closeOnConfirm: true,
 closeOnCancel: true,
  //     closeOnEscape: true,
closeOnOutsideClick: false,
modifier: ''
}
};
</script> 
<script type="text/javascript" src="http://tylerclementi.nationbuilder.com/themes/1/5463bb672213933389000001/0/attachments/14570205351461206479/default/jquery.remodal.js"></script> 
<script type="text/javascript" language="javascript">
  function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
    return null;
}

$(window).load(


function doSomething() {
    var myCookie = Cookies.get('remodal_closed');
    var myModalParam = getUrlParameter('modal');

    if (myCookie == null || (myModalParam != null )) {
    var options = { };
    $('[data-remodal-id=modal-signup]').remodal(options).open();
    } else {
    // do cookie exists stuff
    
    }
}
); 
</script> 

<!-- Events --> 
<script type="text/javascript" language="javascript">
  
  /* $(window).load(function() {
var options = { };
$('[data-remodal-id=modal-signup]').remodal(options).open();
}); 
*/
  
  $(document).on('opening', '.remodal', function () {
    console.log('opening');
  });

  $(document).on('opened', '.remodal', function () {
    console.log('opened');
  });

  $(document).on('closing', '.remodal', function (e) {
    console.log('closing' + (e.reason ? ', reason: ' + e.reason : ''));
  });

  $(document).on('closed', '.remodal', function (e) {
    console.log('closed' + (e.reason ? ', reason: ' + e.reason : ''));
    Cookies.set('remodal_closed', '1', { expires: 7 });
  });

  $(document).on('confirmation', '.remodal', function () {
    console.log('confirmation');
    Cookies.set('remodal_closed', '1', { expires: 7 });
  });

  $(document).on('cancellation', '.remodal', function () {
    console.log('cancellation');
       Cookies.set('remodal_closed', '1', { expires: 7 });
  });

//  Usage:
// $(function() {
//
//    // In this case the initialization function returns the already created instance
//    var inst = $('[data-remodal-id=modal]').remodal();
//
//    inst.open();
//    inst.close();
//    inst.getState();
//    inst.destroy();
// });

</script> 

<!-- /_homepage_modal.html --> 

<!-- HOMEPAGE MODAL -- END -->

</body>
</html>
