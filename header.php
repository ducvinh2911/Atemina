<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Atemina
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atemina' ); ?></a>
	<div class="line3">&nbsp;</div>
	<header id="masthead" class="site-header">
		
		<div class="site-header-wapper">
			<div class="container">
			<div class="site-branding">
				<?php
				
				if ( is_front_page() || is_home() ) :
					?>
					<h1 class="site-title"><?php the_custom_logo(); ?></h1>
					<?php
				else :
					?>
					<p class="site-title"><?php the_custom_logo(); ?></p>
					<?php
				endif;
				$atemina_description = get_bloginfo( 'description', 'display' );
				if ( $atemina_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $atemina_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<div class="header-right">
				<div class="seachform-box">	
					<?php echo get_search_form(); ?>
				</div>		
				<div class="menu-icon-right">
					<ul>
						<li>
							<span class="icon-logo-right"></span>
							<p>アテミナの話</p>
						</li>
						<li>
							<span class="icon-pen"></span>
							<p>掲載申込</p>
						</li>
						<li>
							<span class="icon-user"></span>
							<p>会員登録</p>
						</li>
						
						<li>
							<span class="icon-lock"></span>
							<p>ログイン</p>
						</li> 
					</ul>	
				</div>
				<div class="showmobile site-nav--mobile">		
					<button type="button" class=" menumobile" aria-controls="NavDrawer" aria-expanded="false">
						<span class="nav-toggle__burger">
							<span class="nav-toggle__burger-mid"></span>
						</span> 
					</button>
				</div>	
			</div>		
		</div>		
		</div>
		<nav id="site-navigation" class="showdesktop main-navigation">
			 <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
		<div class="hide mobile-navigation">
			<?php
				wp_nav_menu( array(
					'menu' => 'Mobile menu' 
				) );
			?>
		</div>	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
