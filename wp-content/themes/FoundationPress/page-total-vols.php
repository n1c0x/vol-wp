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