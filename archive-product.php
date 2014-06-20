<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
			
			<?php the_post_thumbnail('thumbnail', array( 'class' => 'thumb' ) ); ?>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>			

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

				<?php $price = get_post_meta( $post->ID, 'Price', true ); ?>
				<span class="product-price">
					<?php echo $price; ?>
				</span>
			</div>
					
		</article><!-- end post -->


		<?php comments_template(); ?>

		<?php endwhile; ?>

		<section class="pagination">
			<?php 
			if( is_singular() ){
				//SINGLE VIEWS
				previous_post_link( '%link ' , '&larr; Older Post: %title' ); 
				next_post_link( '%link' , 'Newer Post: %title &rarr;' );
			}else{
				//ARCHIVE VIEWS
				//use pagenavi plugin if it exists
				if( function_exists('wp_pagenavi') ){
					wp_pagenavi();
				}else{
				//otherwise, fall back to the default older/newer buttons
					previous_posts_link('&larr; Newer Posts');
					next_posts_link('Older Posts &rarr;');
				}
			} 
			?>
		</section>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('shop'); //include sidebar-shop.php ?>
<?php get_footer(); //include footer.php ?>