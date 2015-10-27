<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				#the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				#the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<table>
			<tr>
				<th>Date</th>
				<th>Commandant de bord</th>
				<th>Copilote</th>
				<th>Aéroport de départ</th>
				<th>Aéroport d'arrivée</th>
				<th>Durée Jour</th>
				<th>Durée Nuit</th>
				<th>Fonction</th>
				<th>Poste</th>
			</tr>
			<tr>
		<?php 
			echo "<td>";
				the_field('date');
			echo "</td>";
			echo "<td>";
				the_field('commandant_de_bord');
			echo "</td>";
			echo "<td>";
				the_field('copilote');
			echo "</td>";
	
			echo "<td>";
				$term = get_field('aeroport_de_depart');
				if( $term ):
				echo $term->name;
				endif;
			echo "</td>";

			echo "<td>";
				$term = get_field('aeroport_darrivee');
				if( $term ):
				echo $term->name;
				endif;
			echo "</td>";
			echo "<td>";
				echo the_field('heures_de_vol_jour');
			echo "</td>";
			echo "<td>";
				echo the_field('heures_de_vol_nuit');
			echo "</td>";
			echo "<td>";
				$term = get_field('fonction_pf_pnf');
				if( $term ):
					echo $term->name;
				endif;
			echo "</td>";
			echo "<td>";
				$term = get_field('poste');
				if( $term ):
					echo $term->name;
				endif;
			echo "</td>";

			?>
		 	</tr>
		 </table>
		<?php

			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
