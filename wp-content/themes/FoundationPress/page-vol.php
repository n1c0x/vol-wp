<?php
/*
Template Name: AllVols
*/
get_header(); ?>


<div class="row">
	<div class="small-12 large-12 columns">
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<script type="text/javascript">
				$(document).ready( function () {
				    $('#table_vols').DataTable( {
				    	language: {
				    		url: '/vol-wp/wp-content/themes/FoundationPress/assets/javascript/custom/DataTables/localisation/french.json'
				    	},
				    	colReorder: true,
				    	responsive: true,
				    	select: true
				    } );
				} );
			</script>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">

				<table id="table_vols">
					<thead>
						<tr>
							<th>Date</th>
							<th>CDB</th>
							<th>OPL</th>
							<th>OBS1</th>
							<th>OBS2</th>
							<th>Inst</th>
							<th class="width_small">Vol</th>
							<th class="width_small">HdV Jour</th>
							<th class="width_small">HdV Nuit</th>
							<th class="width_small">Fonction</th>
							<th class="width_small">Poste</th>
							<th class="width_small">HdV IFR</th>
							<th>Arr. IFR</th>
							<th>Immat</th>
							<th>Type d'avion</th>
							<th>Observations</th>
							<th class="width_small">Options</th>
						</tr>
					</thead>
					<tbody>
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
				the_field('observateur_1');
			echo "</td>";
			echo "<td>";
				the_field('observateur_2');
			echo "</td>";
			echo "<td>";
				the_field('instructeur');
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
				$tmstamp = strtotime(get_field('heures_de_vol_jour')) + strtotime(get_field('heures_de_vol_nuit'));
				echo date("H:i", $tmstamp); 
			echo "</td>";
			echo "<td>";
				echo the_field('arrivee_ifr');
			echo "</td>";
			echo "<td>";
				$term = get_field('immatriculation');
				if( $term ):
					echo $term->name;
				endif;
			echo "</td>";
			echo "<td>";
				$term = get_field('type_davion');
				if( $term ):
					echo $term->name;
				endif;
			echo "</td>";
			echo "<td>";
			echo the_content();
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
		 	</tbody>
		 </table>			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
