<?php
/*
Template Name: TotalVols
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
				    $('.table_total').DataTable( {
				    	language: {
				    		url: '/vol-wp/wp-content/themes/FoundationPress/assets/javascript/custom/DataTables/localisation/french.json'
				    	},
				    	bInfo : false,
				    	responsive: true,
				    	paging: false,
				    	ordering: false,
				    	searching: false
				    } );
				} );
			</script>
			
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php

				$terms = get_terms( 'type_avion' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					foreach ( $terms as $term ) {
						
						$arrivee_ifr = 0;
						$tmstamp_jour = 0;
						$tmstamp_nuit = 0;

						$args = array(
							'post_type'  => 'vol',
						    'tax_query' => array(
						    	array(
						   			'taxonomy'	=> 'type_avion',
						   			'field'     => 'slug',
						        	'terms'   	=> $term->name
						       	),
						  	),
						);
						$query = new WP_Query( $args );
						if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();
						    $arrivee_ifr += get_field('arrivee_ifr',$post->ID);

						    #if (get_field('poste',get_the_id()) == 1) {
						    	#$poste += get_field('poste',get_the_id());
						    	#$poste .= 'cdb';
						    	#$poste = get_the_terms( get_the_id(), 'poste' );
						    	#$poste = get_terms('poste');
						    #}else{
						    #	$poste .= 'opl';
						    #}
						    #$poste = get_the_terms( get_the_id(), 'poste' );
						    #$poste = get_terms( 'poste', array( 'hide_empty' => 0 ) );
							echo get_the_id()."<br>";
							#echo "<pre>";
							#var_dump($poste);
							#echo "</pre>";
							
							#$tax = get_term_by( 'name', 'opl', 'poste' );
							#echo "<pre>";
							#var_dump($tax);
							#echo "</pre>";
							#echo $tax->term_id;
						    
							#$tax = get_the_terms( $post->ID, 'poste' );
							#echo "<pre>";
							#var_dump($tax);
							#echo "</pre>";


							// $taxonomies = array( 
							//     'poste',
							//     'aeroport'
							// );
							// $tax2 = get_terms($taxonomies);
							// echo "<pre>";
							// var_dump($tax2);
							// echo "</pre>";

							// $taxonomies = get_taxonomies(); 
							// if ( $taxonomies ) {
							//   foreach ( $taxonomies  as $taxonomy ) {
							//     echo '<p>' . $taxonomy . '</p>';
							//   }
							// }

							$tmstamp_jour += strtotime(get_field('heures_de_vol_jour',get_the_id()));
							$tmstamp_nuit += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
							$hdv_jour = date("H:i", $tmstamp_jour);
							$hdv_nuit = date("H:i", $tmstamp_nuit);
							#$hdv_jour = $tmstamp;
						endwhile;
						endif;
						wp_reset_postdata();

						?>

						<table class="table_total">
					<thead>
						<tr>
							<th><?php echo $term->name ?></th>
							<th>CDB Jour</th>
							<th>CDB Nuit</th>
							<th>OPL Jour</th>
							<th>OPL Nuit</th>
							<th>DC Jour</th>
							<th>DC Nuit</th>
							<th>Inst. Jour</th>
							<th>Inst. Nuit</th>
							<th>Simu</th>
							<th>IFR</th>
							<th>Arr. IFR</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Récap</td>
							<td><?php echo $hdv_jour ?></td>
							<td><?php echo $hdv_nuit ?></td>
							<td><?php 
							?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!-- <td><?php $tmstamp = strtotime(get_field('heures_de_vol_jour',10)) + strtotime(get_field('heures_de_vol_nuit',10));
									echo date("H:i", $tmstamp);
								?></td> -->
							<td></td>
							<td><?php echo $arrivee_ifr ?></td>
							<td></td>
						</tr>
						<tr>
							<td>Année en cours</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Au 31/12/<?php echo date("Y")-1; ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>

						<?php
					}
				}?>


				
						
			</div>
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
</div>
<?php get_footer(); ?>