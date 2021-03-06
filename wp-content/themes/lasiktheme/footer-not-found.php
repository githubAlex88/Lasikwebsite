<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #app div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		
	<?php
		get_template_part( 'template-parts/footer/not-found' );
	?>
		
	</div><!-- content-wrapper -->
		<?php
			get_template_part( 'template-parts/modals/search-modal', 'widgets' );
			get_template_part( 'template-parts/modals/location-modal', 'widgets' );
		?>
</div><!-- #app -->

</div>
<?php wp_footer(); ?>

</body>
</html>
