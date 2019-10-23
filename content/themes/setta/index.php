<?php
/**
 * Página principal
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">

		<h1 class="display-4"><?php the_title(); ?></h1>
		<?php the_content(); ?>

	</div>

	<div class="container">
		<div class="card-deck mb-3">

	<?php
	if ( ! $modulos = get_field( 'modulos' ) ) :

		get_template_part( 'partials/modulo', '404' );

	else :

		$mod_query = new WP_Query (
			array(
				'post_type'      => 'modulo',
				'posts_per_page' => 5,
				'post_status'    => 'publish',
				'orderby'        => 'menu_order',
				'post__in'       => $modulos,
			)
		);

		if ( $mod_query->have_posts() ) :
?>

	<?php
		while ( $mod_query->have_posts() ) {

			$mod_query->the_post();

			get_template_part( 'partials/modulo', 'list' );

		}
		else :
			get_template_part( 'partials/modulo', '404' );
		endif;

	endif;
	?>

	</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Lorem Ipsum</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium et aliquam, vitae eveniet consectetur minus, sit aspernatur aperiam repudiandae pariatur quae dolor cupiditate explicabo nobis cumque, quia accusamus repellendus sequi.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary">Próximo</button>
				<button type="button" class="btn btn-primary">Anterior</button>
			</div>
		</div>
	</div>
</div>

<?php
	endwhile;

else:
?>

	<?php get_template_part( 'partials/content', '404' ); ?>

<?php
endif;
get_footer();
