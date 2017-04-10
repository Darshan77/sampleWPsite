<?php



function tesseract_header_right_content( $content ) {



	switch( $content ) {



		// Step 1 -> nothing

		default:

			break;



		// Step 2 -> logo

		case 'buttons':



			$code = get_theme_mod('tesseract_header_content_if_button');

			if ( ( get_theme_mod('tesseract_header_right_content') == 'buttons' ) && ( !$code || !isset($code) ) ) {

				echo '<div id="header-button-container"><div id="header-button-container-inner"><a href="/" class="button primary-button">Primary Button</a><a href="/" class="button secondary-button">Secondary Button</a></div></div>';

			} else {

				echo '<div id="header-button-container"><div id="header-button-container-inner">' . do_shortcode( $code ) . '</div></div>';

			}



			break;



		// Step 3 -> social

		case 'social': ?>



            <div class="social-wrapper cf">

				<ul class="hr-social">

					<?php tesseract_display_social_network_list_items(); ?>

				</ul>

			</div>



		<?php break;



		// Step 5 -> search

		case 'search':



			get_search_form();



			break;



		// Step 6 -> menu

		case 'menu'; ?>



          	<nav id="header-right-menu" role="navigation">

				<?php tesseract_output_menu( FALSE, FALSE, 'primary_right', 0 ); ?>

			</nav>



	<?php }



}



/*function tesseract_horizontal_footer_menu_additional_content( $content ) {



	$headerLogo = get_theme_mod('tesseract_header_logo_image');

	$footerLogo = get_theme_mod('tesseract_footer_logo_image');

	$footerLogoEnable = ( get_theme_mod('tesseract_footer_logo_enable') == 1 ) ? true : false;



	switch( $content ) {



		// Step 1 -> nothing



		// Step 2 -> logo

		case 'logo':



			$logoImg = ( $footerLogoEnable && $footerLogo ) ? $footerLogo : $headerLogo;



			if ( $logoImg ) : ?>



				<div class="site-branding">

					<h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

				</div>



			<?php else : ?>



				<div class="site-branding">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo get_bloginfo('blogname'); ?></a></h1>

				</div>



			<?php endif;

			break;



		// Step 3 -> social

		case 'social': ?>



				<ul class="hm-social">

					<?php tesseract_display_social_network_list_items(); ?>

				</ul>



			<?php break;



		// Step 5 -> search

		case 'search':



			get_search_form();



			break;

		default:



	}



}*/

function tesseract_horizontal_footer_menu_additional_content( $content ) {


	$headerLogo = get_theme_mod('tesseract_header_logo_image');

	$footerLogo = get_theme_mod('tesseract_footer_logo_image');

	$footerLogoEnable = ( get_theme_mod('tesseract_footer_logo_enable') == 1 ) ? true : false;

	$header_logo_choice = (get_theme_mod('tesseract_header_logo_type')) ? get_theme_mod('tesseract_header_logo_type') : 'image';

    $header_text        = (get_theme_mod('tesseract_header_logo_text')) ? get_theme_mod('tesseract_header_logo_text') : get_bloginfo();

   	$header_fonts       = (get_theme_mod('tesseract_header_logo_text_fonts')) ? get_theme_mod('tesseract_header_logo_text_fonts') : 'Pacifico';
    $header_font_styles = (get_theme_mod('tesseract_header_logo_text_fonts_styles')) ? get_theme_mod('tesseract_header_logo_text_fonts_styles') : 'normal';
    $header_font_weight = (get_theme_mod('tesseract_header_logo_text_fonts_weights')) ? get_theme_mod('tesseract_header_logo_text_fonts_weights') : '900';




	switch( $content ) {



		// Step 1 -> nothing



		// Step 2 -> logo

		case 'logo':



			$logoImg = ( $footerLogoEnable && $footerLogo ) ? $footerLogo : $headerLogo;



			if ( $header_logo_choice == 'image' && $logoImg ) : ?>



				<div class="site-branding">

					<h1 class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logoImg; ?>" alt="logo" /></a></h1>

				</div>



			<?php else : ?>



				<div class="site-branding">

					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

                  <span style="font-family:<?php echo $header_fonts; ?>; font-style:<?php echo $header_font_styles;?>; font-weight:<?php echo $header_font_weight; ?>;">
                    <?php echo $header_text; ?>
                  </span>

                  </a></h1>

				</div>



			<?php endif;

			break;



		// Step 3 -> social

		case 'social': ?>



				<ul class="hm-social">

					<?php tesseract_display_social_network_list_items(); ?>

				</ul>



			<?php break;



		// Step 5 -> search

		case 'search':



			get_search_form();



			break;
		case 'html' :
			$default_html = '<strong>Theme by <a href="http://tesseracttheme.com">Tesseract</a></strong>

                        &nbsp;&nbsp;

                        <strong>

                        	<a href="http://tesseracttheme.com">

                        		<img src="http://tylers-storage.s3-us-west-1.amazonaws.com/wp-content/uploads/2015/09/07185505/Drawing1.png" alt="Drawing" width="16" height="16" />

                            </a>

                        </strong>';

			$left_html = (get_theme_mod('tesseract_footer_left_content_html')) ? get_theme_mod('tesseract_footer_left_content_html') : $default_html;
			echo $left_html;

		default:



	}



}




/**

 * Helper function to display social networks as a series of list items.

 */

function tesseract_display_social_network_list_items() {

	for ( $i = 1; $i <= 10; $i++ ) {

		$account_number = sprintf( '%02d', $i );

		$sn_img = get_theme_mod( "tesseract_social_account{$account_number}_image" );



		// Quit early if no image is found.

		if ( $sn_img ) {

			$sn_name = get_theme_mod( "tesseract_social_account{$account_number}_name" );

			$sn_url = get_theme_mod( "tesseract_social_account{$account_number}_url" );



			if ( $sn_name && $sn_url ) {

				echo '<li><a title="Follow Us on ' . $sn_name . '" href="' . $sn_url . '" target="_blank"><img src="' . $sn_img . '" width="75" height="75" alt="' . $sn_name . ' icon" /></a></li>';

			}

		}

	}

}



/**

 * Let's turn hex value into RGB

 * source at http://css-tricks.com/snippets/php/convert-hex-to-rgb/

 *

 */



function tesseract_hex2rgb( $colour ) {

        if ( $colour[0] == '#' ) {

                $colour = substr( $colour, 1 );

        }

        if ( strlen( $colour ) == 6 ) {

                list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );

        } elseif ( strlen( $colour ) == 3 ) {

                list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );

        } else {

                return false;

        }

        $r = hexdec( $r );

        $g = hexdec( $g );

        $b = hexdec( $b );

        return array( 'red' => $r, 'green' => $g, 'blue' => $b );

}