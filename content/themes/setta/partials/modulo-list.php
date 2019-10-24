<div class="col-md-4">
	<div class="card mb-4 shadow-sm">
		<img src="https://loremflickr.com/320/240/brazil,rio?random=<?php the_ID(); ?>" alt="">
		<div class="card-body">
			<h4 class="my-0 font-weight-normal"><?php the_title() ?></h4>
			<div class="card-text"><?php the_excerpt(); ?></div>
			<div class="d-flex justify-content-between align-items-center">
				<!-- get custom field cadastrado minutos -->
				<small class="text-muted"><i class="far fa-clock"></i> 9 mins</small>
				<small class="text-muted"><i class="fas fa-redo-alt"></i></small>
			</div>
			<button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modal" data-modulo="<?php the_ID(); ?>">
				Ver módulo
			</button>
		</div>
	</div>
</div>
