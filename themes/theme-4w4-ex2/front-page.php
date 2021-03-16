<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4-ex2
 */

get_header();
?>
//////////////////////////////////// FRONT-PAGE.PHP
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<!-- Début du carrousel -->
			<?php
			if ( is_front_page()) : ?>
			<section class="carrousel">
					<div>1</div>
					<div>2</div>
					<div>3</div>
			</section>
			<button id='un'>1</button>
			<button id='deux'>2</button>
			<button id='trois'>3</button>
			<?php endif ?>
			<!-- Fin du carrousel -->
			<section class="list-cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXXX";
			while ( have_posts() ) :
					the_post();
					$titre_grand = get_the_title();
					$session = substr($titre_grand, 4,1);
					$nbHeure = substr($titre_grand, -4,3);
					$titre = substr($titre_grand, 8,-6);
					$sigle = substr($titre_grand, 0,7);
					$typeCours = get_field('type_de_cours');
					if($precedent != $typeCours): ?>
					 <?php if($precedent != "XXXXXXX"): ?>
						</section>
						<?php endif ?>
						<h2><?php echo $typeCours ?></h2>
					<section>  
					<?php endif	?>
					<article>
						<p><?php echo $sigle ." - " . $nbHeure . " - " . $typeCours; ?></p>
						<a href="<?php echo get_permalink(); ?>"><?php echo $titre; ?></a>
						<p>Session :<?php echo $session; ?></p>
					</article>
				<?php
				$precedent = $typeCours;
			endwhile; ?>
			</section>
		<?php endif; ?>
		

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
