<?php if( has_post_thumbnail() ): ?>
<div id="page-cover">
	<?php the_post_thumbnail( 'large' ); ?>
</div>				
<?php endif; ?>

<div id="content" class="site-content" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<div class="entry-meta">
				<?php opus_the_category(); ?>

				<?php opus_posted_on(); ?>
			</div>
			
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		</header> 
		<div class="entry-content">
			<?php the_content(); ?>
		</div> 
		<footer class="entry-footer">
			<span class="icon-wrap"><span class="icon"></span></span>
			<span class="comments-link">			
				<?php opus_comments_popup_link(); ?>
			</span>
		</footer> 
	</article>

	<?php 
		opus_content_nav( 'nav-below' ); 

		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ){
			comments_template();
		}
	?>
</div><!-- #content.site-content -->