<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<?php do_action( 'sh_before_header' );?>


<div id="page" class="site">

	<header id="masthead" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		<div class="header-main">
			<div class="container">
				<div class="header-content">
					<a id="showmenu" class="d-lg-none">
						<span class="hamburger hamburger--collapse">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</span>
					</a>
					<div class="row align-items-center">
						<div class="col-xl-2 col-lg-2 col-4">
							<div class="logo">
								<a href="/">
									<img src="<?php the_field('logo', 'option') ?>" alt="Logo">
								</a>
							</div>
						</div>
						<!-- <div class="col-xl-1 d-none d-md-block"></div> -->
						<div class="col-xl-10 col-lg-9 col-7">
							<div class="top-menu">
								<div class="top-language">
									<?php dynamic_sidebar('sidebar-2') ?>
								</div>
								<?php if ( has_nav_menu( 'menu-1' ) ) { ?>
									<nav id="site-navigation" class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
										<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'menu clearfix' ) );?>
									</nav>
								<?php } // end check menu ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header><!-- #masthead -->
	