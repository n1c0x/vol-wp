<?php
/*
Template Name: AllVols
*/
?>

<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
				<a href="<?php bloginfo(url);?>/wp-admin/edit.php?post_type=vol">Login</a>

				<table>
					<tr>
						<th>Date</th>
						<th>CDB</th>
						<th>OPL</th>
						<th class="width_small">Vol</th>
						<th class="width_small">HdV Jour</th>
						<th class="width_small">HdV Nuit</th>
						<th class="width_small">Fonction</th>
						<th class="width_small">Poste</th>
						<th class="width_small"></th>

					</tr>
					<tr>
		<?php
		
		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'vol' ),
			'pagination'             => true,
			'posts_per_page'         => '30',
			'order'                  => 'ASC',
			'orderby'                => 'date',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
		
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
					$term2 = get_field('aeroport_darrivee');
					if( $term2 ):
						echo $term->name."/".$term2->name;
					endif;
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
			echo "<td>";
			edit_post_link();
			echo "</td>";
			echo "</tr>";
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();

		?>
		 	
		 </table>
 	</div><!-- .entry-content -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->