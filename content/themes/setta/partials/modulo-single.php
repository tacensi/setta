<?php
/**
 * Single content de modulo
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */
?>
<div class="modal-body">
	<p><?php the_content(); ?></p>

	<p><?php the_ID(); ?></p>



	<?php if ( ! $atividades = get_field( 'atividades' ) ) : ?>
		<p>Não foi encontrada nenhuma atividade.</p>

	<?php else : ?>

		<?php
		$atividade_query = new WP_Query(
			array(
				'post_type' => 'atividade',
				'post_status' => 'publish',
				'posts_per_page' => 2,
				'posts__in' => $atividades,
			)
		);

		if ( $atividade_query->have_posts() ) :
		?>
			<ul class="modal-atividades_list">
			<?php while( $atividade_query->have_posts() ) : $atividade_query->the_post(); ?>

				<li><?php the_title(); ?></li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			</ul>

		<?php endif; ?>

	<?php endif; ?>

	</div>
</div>
