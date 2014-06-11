<?php 
/*
Template Name: Page with no sidebar

Activate this template by editing a page in the admin panel 
and choosing it from the "templates" option
*/

get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>

			<?php the_post_thumbnail('thumbnail', array( 'class' => 'thumb' ) ); ?>

			<div class="entry-content">
				<?php 
				//if viewing single post or page, show full content
				if(is_singular()){
					the_content(); 
				}else{
					//otherwise, show shortened content
					the_excerpt(); 
				}
				?>
			</div>
				
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_footer(); //include footer.php ?>