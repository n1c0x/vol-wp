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
						$tmstamp_jour_cdb = 0;
						$tmstamp_nuit_cdb = 0;
						$tmstamp_jour_opl = 0;
						$tmstamp_nuit_opl = 0;
						$tmstamp_jour_cdb_current = 0;
						$tmstamp_nuit_cdb_current = 0;
						$tmstamp_jour_cdb_last = 0;
						$tmstamp_nuit_cdb_last = 0;
						$tmstamp_jour_opl_current = 0;
						$tmstamp_nuit_opl_current = 0;
						$tmstamp_jour_opl_last = 0;
						$tmstamp_nuit_opl_last = 0;

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
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
							    $arrivee_ifr += get_field('arrivee_ifr',$post->ID);

								// $tmstamp_jour += strtotime(get_field('heures_de_vol_jour',get_the_id()));
								// $tmstamp_nuit += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
								// $hdv_jour = date("H:i", $tmstamp_jour);
								// $hdv_nuit = date("H:i", $tmstamp_nuit);
								
								echo "<pre>";
								//print_r(get_fields($post->ID));
								echo "</pre>";

								global $wpdb;
								//$values = $wpdb->get_results( "SELECT wp_postmeta.meta_value FROM $wpdb->posts 
								//	INNER JOIN $wpdb->postmeta ON wp_posts.ID = wp_postmeta.post_id
								//	WHERE meta_key = 'date'", OBJECT);
								
								$values = $wpdb->get_results( "SELECT * wp_postmeta.meta_value FROM $wpdb->posts 
									INNER JOIN $wpdb->postmeta ON wp_posts.ID = wp_postmeta.post_id
									WHERE meta_key = 'date'", OBJECT);

								//print_r($values);
								//$values = $wpdb->get_col("SELECT DISTINCT EXTRACT(YEAR FROM post_date) FROM $wpdb->posts;" );
								foreach ($values as $value) {
									echo substr($value->meta_value,-4,4);
									// echo $value->meta_value."<br>";
								}
								echo "<br>";

								#echo substr(get_field('date',get_the_id()),-4,4);
								
								if (get_field('poste')->slug == 'cdb') {
									$tmstamp_jour_cdb += strtotime(get_field('heures_de_vol_jour',get_the_id()));
									$tmstamp_nuit_cdb += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
									# Heures de vol totales
									$hdv_jour_cdb = date("H:i", $tmstamp_jour_cdb);
									$hdv_nuit_cdb = date("H:i", $tmstamp_nuit_cdb);

									echo "<pre>";
									#print_r(get_fields(get_the_id()));
									echo "</pre>";

									if (substr(get_field('date',get_the_id()),-4,4) == date('Y')) {
										# Heures de vol pour l'année courante
										$tmstamp_jour_cdb_current += strtotime(get_field('heures_de_vol_jour',get_the_id()));
										$tmstamp_nuit_cdb_current += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
										$hdv_jour_cdb_current = date("H:i", $tmstamp_jour_cdb_current);
										$hdv_nuit_cdb_current = date("H:i", $tmstamp_nuit_cdb_current);
									}else{
										# Heures de vol pour l'année précédente
										$tmstamp_jour_cdb_last += strtotime(get_field('heures_de_vol_jour',get_the_id()));
										$tmstamp_nuit_cdb_last += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
										$hdv_jour_cdb_last = date("H:i", $tmstamp_jour_cdb_last);
										$hdv_nuit_cdb_last = date("H:i", $tmstamp_nuit_cdb_last);
									}
									
								}else
									$tmstamp_jour_opl += strtotime(get_field('heures_de_vol_jour',get_the_id()));
									$tmstamp_nuit_opl += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
									$hdv_jour_opl = date("H:i", $tmstamp_jour_opl);
									$hdv_nuit_opl = date("H:i", $tmstamp_nuit_opl);
									
									if (substr(get_field('date',get_the_id()),-4,4) == date('Y')) {
										# Heures de vol pour l'année courante
										$tmstamp_jour_opl_current += strtotime(get_field('heures_de_vol_jour',get_the_id()));
										$tmstamp_nuit_opl_current += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
										$hdv_jour_opl_current = date("H:i", $tmstamp_jour_opl_current);
										$hdv_nuit_opl_current = date("H:i", $tmstamp_nuit_opl_current);
									}else{
										# Heures de vol pour l'année précédente
										$tmstamp_jour_opl_last += strtotime(get_field('heures_de_vol_jour',get_the_id()));
										$tmstamp_nuit_opl_last += strtotime(get_field('heures_de_vol_nuit',get_the_id()));
										$hdv_jour_opl_last = date("H:i", $tmstamp_jour_opl_last);
										$hdv_nuit_opl_last = date("H:i", $tmstamp_nuit_opl_last);
									}
								
								#$hdv_jour = $tmstamp;
							}
						}
						wp_reset_postdata();
						
						
						# 	A ajouter lors de la mise en prod
						#	pour récupérer l'utilisateur courant
						#
						#	$post_id = "user_" . $current_user->ID;
						
						echo "<pre>";
						#var_dump($term);
						echo "</pre>";

						$values = $wpdb->get_col("SELECT EXTRACT(YEAR FROM post_date) AS Year FROM $wpdb->posts;" );

						/*$values = $wpdb->get_col("SELECT *
    							FROM $wpdb->posts WHERE post_date = 'poste'" );
						*/
						#$sum = 0;
						//$field_name = 'poste';
						#$post_id = 10;
						/*echo "<pre>";
						#print_r(get_field($field_name, $post_id));
						echo "</pre>";
						
						foreach ($values as $key => $value) {
							echo $values[$key]."<br>";
							#$post_id = $values[$key];
							#echo "<pre>";
							#print_r(get_field($field_name, $post_id));
							#echo "</pre>";
							#$sum +=$values[$key];
						}*/
						#echo $sum;
						

						#$field_name = 'heures_de_vol_jour';
						#$post_id = 'user_1';
						#$post_id = 'event_18';
						#$post_id = 10;

						#$field = get_field($field_name, $post_id);

						echo "<br>";
						#the_field($field_name, $post_id);
						echo "<br>";
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
							<td><?php echo $hdv_jour_cdb ?></td>
							<td><?php echo $hdv_nuit_cdb ?></td>
							<td><?php echo $hdv_jour_opl ?></td>
							<td><?php echo $hdv_nuit_opl ?></td>
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
							<td>Année en cours (<?php echo date("Y"); ?>)</td>
							<td><?php echo $hdv_jour_cdb_current ?></td>
							<td><?php echo $hdv_nuit_cdb_current ?></td>
							<td><?php echo $hdv_jour_opl_current ?></td>
							<td><?php echo $hdv_nuit_opl_current ?></td>
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
							<td><?php echo $hdv_jour_cdb_last ?></td>
							<td><?php echo $hdv_nuit_cdb_last ?></td>
							<td><?php echo $hdv_jour_opl_last ?></td>
							<td><?php echo $hdv_nuit_opl_last ?></td>
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