<?php get_header(); ?>

<main>

<div class="page-content">
</div>

<section class="container">

<?php while( have_posts() ) : the_post(); ?>

	<div class="post">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="the-content">
			<?php the_content(); ?>
		</div>
	</div>

<?php endwhile; ?>

</section>

</main>

<?php get_footer(); ?>
