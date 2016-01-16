<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Add protocol relative theme assets */
require_once( 'library/protocol-relative-theme-assets.php' );



// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Vols', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Vol', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Vol', 'text_domain' ),
		'name_admin_bar'      => __( 'Vol', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Vol', 'text_domain' ),
		'description'         => __( 'Objet Vol', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'revisions', 'custom-fields', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'vol', $args );

}
add_action( 'init', 'custom_post_type', 0 );



// Register Custom Taxonomy
function custom_taxonomy_aeroports() {

	$labels = array(
		'name'                       => _x( 'Aéroports', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Aéroport', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Aéroport', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'aeroport', array( 'vol' ), $args );

}
add_action( 'init', 'custom_taxonomy_aeroports', 0 );

// Register Custom Taxonomy
function custom_taxonomy_immatriculation() {

	$labels = array(
		'name'                       => _x( 'Immatriculations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Immatriculation', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Immatriculation', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'immatriculation', array( 'vol' ), $args );

}
add_action( 'init', 'custom_taxonomy_immatriculation', 0 );


// Register Custom Taxonomy
function custom_taxonomy_fonction_pf_pnf() {

	$labels = array(
		'name'                       => _x( 'Fonctions (PF/PNF)', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Fonction (PF/PNF)', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Fonction PF/PNF', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'fonction_pf_pnf', array( 'vol' ), $args );

}
add_action( 'init', 'custom_taxonomy_fonction_pf_pnf', 0 );

// Register Custom Taxonomy
function custom_taxonomy_poste() {

	$labels = array(
		'name'                       => _x( 'Postes', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Poste', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Poste', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'poste', array( 'vol' ), $args );
}
add_action( 'init', 'custom_taxonomy_poste', 0 );

// Register Custom Taxonomy
function custom_taxonomy_type_avion() {

	$labels = array(
		'name'                       => _x( 'Types avion', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Type avion', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Type d\'avion', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'type_avion', array( 'vol' ), $args );

}
add_action( 'init', 'custom_taxonomy_type_avion', 0 );


# Metabox de conversion des heures du format sexagésimal en décimal
add_action('add_meta_boxes','init_metabox');
function init_metabox(){
  add_meta_box('durees_conversion', 'Conversion des horaires', 'durees_conversion', 'vol', 'side');
}

function durees_conversion($post){
  $horaire = get_post_meta($post->ID,'_durees_conversion',true);?>

  <!-- <label for="horaire_input">Minutes en décimal :</label> -->
  <input id="horaire_input" type="text" name="url_site" value="<?php echo $horaire; ?>" placeholder="Minutes en sexagésimal"/>
  <br />
  <!-- <label for="resultat">Minutes en sexagésimal :</label> -->
  <input id="resultat" type="text" value="" placeholder="Minutes en décimal"/>
  <input type="button" class="button tagadd" value="Convertir" onclick="convert()" />
  <button type="reset" class="button tagadd">Reset</button>

<script>
function convert() {
    var val = parseInt(document.getElementById('horaire_input').value);
    var minutes = (val/100)*60;
    document.getElementById('resultat').value = parseInt(minutes);
}	
</script>
  <?php
}

add_action('save_post','save_metabox');
function save_metabox($post_id){
if(isset($_POST['url_site']))
  update_post_meta($post_id, '_durees_conversion', esc_url($_POST['url_site']));
}



// get taxonomies terms links
function custom_taxonomies_terms_links(){
  // get post by post id
  $post = get_post( $post->ID );

  // get post type by post
  $post_type = $post->post_type;

  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );

  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( !empty( $terms ) ) {
      #$out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
      foreach ( $terms as $term ) {
        $out[] =
          '  <a href="'
        .    get_term_link( $term->slug, $taxonomy_slug ) .'">'
        .    $term->name
        . "</a>\n";
      }
      $out[] = "\n";
    }
  }

  return implode('', $out );
}

?>
