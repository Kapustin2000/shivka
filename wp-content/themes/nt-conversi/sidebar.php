<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage nt_conversi
 * @since nt_conversi 1.0
 */

if (  is_active_sidebar( 'sidebar-1' )  ) : ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?> 
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
<?php endif; ?>
