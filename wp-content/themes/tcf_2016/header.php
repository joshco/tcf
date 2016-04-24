<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/assets/fav_tylerclementi.png" />
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory');?>/assets/images/favicon.ico" />

<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/theme.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/tablet-and-desktop.css" type="text/css" media="screen and (min-width: 768px)" />
<!-- because ie8 ignores media queries, we need this -->
<!--[if IE 8]>
    <link rel="stylesheet" href="/assets/css/tablet-and-desktop.css" type="text/css" />
<![endif]-->
<!--[if IE]>
  <link rel="stylesheet" href="/assets/css/ie.css" type="text/css" />
<![endif]-->

<!-- Custom fonts -->
<!-- JavaScript Google font import for https -->
<script type="text/javascript">
  WebFontConfig = {
    google: { families: [ 'Crimson+Text:400,600,400italic,600italic:latin', ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })(); </script>

<link href='http://fonts.googleapis.com/css?family=Roboto:200,400,700,900,200italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!-- End Custom fonts -->

<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
<meta name="google-site-verification" content="_3bQLDXALf0VxepgDLVA33Ogc0lkwYWyMGhSLdb0fYw" />
<meta content="authenticity_token" name="csrf-param" />
<meta content="CeYuL4Dxby344DwrRIEutEUwJy2xunOWdNFuT9Z8RLA=" name="csrf-token" />

<!-- Begin SEO data -->
<link rel="canonical" href="http://www.tylerclementi.org/" />
<meta name="Title" content="Welcome to the Tyler Clementi Foundation">
<meta name="Description" content="A movement of friends and supporters who are committed to safe, inclusive spaces for LGBT youth, their families and their allies.">
<meta property="og:title" content="The Tyler Clementi Foundation"/>
<meta property="og:url" content="http://www.tylerclementi.org/">
<meta property="og:description" content="A movement of friends and supporters who are committed to safe, inclusive spaces for LGBT youth, their families and their allies.">
<meta property="og:type" content="article">
<link rel="image_src" href="http://d3n8a8pro7vhmx.cloudfront.net/tylerclementi/sites/1/meta_images/original/1_tcf_logo_(1).jpg?1415192400" />
<meta property="og:image" content="http://d3n8a8pro7vhmx.cloudfront.net/tylerclementi/sites/1/meta_images/original/1_tcf_logo_(1).jpg?1415192400" />
<meta property="og:site_name" content="The Tyler Clementi Foundation"/>
<!-- End SEO -->

<script type="text/javascript">
  window.twttr = (function (d,s,id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
    js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
  }(document, "script", "twitter-wjs"));
</script>

<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = '//apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<script type="text/javascript">
    //<![CDATA[
      window._auth_token_name = "authenticity_token";
      window._auth_token = "CeYuL4Dxby344DwrRIEutEUwJy2xunOWdNFuT9Z8RLA=";
    //]]>
</script>

<!-- Google Analytics -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35048559-1']);
    _gaq.push(['_setDomainName', 'none']);
    _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_setCustomVar', 1, 'UGC', 'false', 3]);
      _gaq.push(['_setCustomVar', 1, 'Page type', 'Basic', 3]);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_trackPageLoadTime']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>
<!-- End Google Analytics -->

<!-- Comment by Ben Tilden - is jQuery being used?  If not, delete -->

<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery_1_11_1_withSizzle.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/themes/cupertino/jquery-ui.css" type="text/css" media="all">
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.ui.effect.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.ui.effect-slide.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/jquery.collapse.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/presence.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/js.cookie.js"></script>


</head>

<body <?php body_class('aware-theme v2-theme page-type-basic has-features has-logo js'); ?>>
	
	<div id="pattern" class="pattern">
		<div class="wrap" id="wrap">
			<div class="nav-wrap"> 
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo('template_directory');?>/assets/images/tylerclementi_logo_280x70.png" id="nav-logo" border="0" alt="<?php bloginfo( 'name' ); ?>" /></a> 
				
				<!-- _nav.html -->
				<nav id="menu" role="navigation" class="width-container">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					<div id="header_sm"> 
						<a id="header_facebook" class="header_sm_img" href="https://www.facebook.com/TheTylerClementiFoundation"></a> 
						<a id="header_twitter" class="header_sm_img" href="https://twitter.com/tylerclementi"></a> 
						<a id="header_youtube" class="header_sm_img" href="https://www.youtube.com/user/tylerclementifund"></a> 
					</div>
				</nav>
				<a href="#menu" class="menu-link"><i class="icon-menu"></i></a> 
				<!-- /_nav.html --> 
	
			</div>
		
		<div id="body" class="page-pages-show-basic">