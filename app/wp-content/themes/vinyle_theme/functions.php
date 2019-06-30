<?php


add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts()
{
	wp_enqueue_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
	wp_enqueue_style('parent-style', '/wp-content/themes/vinyle_theme/style.css?v=<?php echo time(); ?>');
	wp_enqueue_style('leaflet_styles', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.css');
	wp_enqueue_style('font_styles','https://cdn.jsdelivr.net/npm/segoe-fonts@1/segoe-fonts.min.css');

	wp_enqueue_script('script-bootstrap-1', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), 1.0, true);
	wp_enqueue_script('script-bootstrap-2', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), 1.0, true);
	wp_enqueue_script('script-bootstrap-3', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), 1.0, true);
	wp_enqueue_script('script-scroll', 'https://unpkg.com/scrollreveal', array(), 1.0, true);
	wp_enqueue_script('script', '/wp-content/themes/vinyle_theme/script.js', array('jquery'), 1.0, true);
	wp_localize_script('script', 'ajaxurl', admin_url('admin-ajax.php'));
	wp_enqueue_script('leaflet', 'https://unpkg.com/leaflet@1.3.1/dist/leaflet.js');
}


// function add_theme_scripts() {
// 	wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
// 	wp_enqueue_style('main-style');
// 	wp_register_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), true);
// 	wp_enqueue_style('bootstrap-style');
// 	wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
// 	wp_enqueue_script( 'script', get_template_directory_uri().'/script.js');
// }
//   add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
// /**
// * Ajouter un script ou un fichier CSS de la bonne façon 
// */
// function wpm_enqueue_styles(){
//     // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

// 	wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.3.1.min.js');


// 	wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
// 	wp_enqueue_script( 'script', get_template_directory_uri().'/script.js');

// 	// wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.3.1.min.js',array(),true);

//     }
//     add_action( 'wp_footer', 'wpm_enqueue_styles' );


// function wpdocs_theme_name_scripts() {
// wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
// wp_enqueue_style('main-style');
// wp_register_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', array(), true);
// wp_enqueue_style('bootstrap-style');

// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

// function add_js_scripts() {
// 	 wp_enqueue_script( 'script', get_template_directory_uri().'/script.js', array('jQuery'), '1.0', true );

// 	// pass Ajax Url to script.js
// 	wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
// }
// add_action('wp_enqueue_scripts', 'add_js_scripts');





######################################### BARRE DE MENU ############################################
function register_my_menu()
{
	register_nav_menus(array('top' => 'Menu principal'));
};

add_action('init', 'register_my_menu');





######################################## SLIDER ####################################################



################# ajouter un vinyle /custom post type###########################

//ajouter une image à la une
add_theme_support('post-thumbnails');
/*
* On utilise une fonction pour créer notre custom post type 'Vinyle'
*/

function custom_post_type()
{

	$labels = array(
		'name' => _x('Vinyle', 'Post Type General Name', 'vinyle'),
		'singular_name' => _x('Post Type', 'Post Type Singular Name', 'vinyle'),
		'menu_name' => __('Ajouter un vinyle', 'vinyle'),
		'name_admin_bar' => __('Post Type', 'vinyle'),
		'archives' => __('Item Archives', 'vinyle'),
		'attributes' => __('Item Attributes', 'vinyle'),
		'parent_item_colon' => __('Parent Item:', 'vinyle'),
		'all_items' => __('Tous les vinyles', 'vinyle'),
		'add_new_item' => __('Ajouter un vinyle', 'vinyle'),
		'add_new' => __('Ajouter un vinyle', 'vinyle'),
		'new_item' => __('New Item', 'vinyle'),
		'edit_item' => __('Edit Item', 'vinyle'),
		'update_item' => __('Update Item', 'vinyle'),
		'view_item' => __('View Item', 'vinyle'),
		'view_items' => __('View Items', 'vinyle'),
		'search_items' => __('Search Item', 'vinyle'),
		'not_found' => __('Not found', 'vinyle'),
		'not_found_in_trash' => __('Not found in Trash', 'vinyle'),
		'featured_image' => __('Featured Image', 'vinyle'),
		'set_featured_image' => __('Set featured image', 'vinyle'),
		'remove_featured_image' => __('Remove featured image', 'vinyle'),
		'use_featured_image' => __('Use as featured image', 'vinyle'),
		'insert_into_item' => __('Insert into item', 'vinyle'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'vinyle'),
		'items_list' => __('Items list', 'vinyle'),
		'items_list_navigation' => __('Items list navigation', 'vinyle'),
		'filter_items_list' => __('Filter items list', 'vinyle'),
	);
	$args = array(
		'label' => __('Post Type', 'vinyle'),
		'description' => __('Post Type Description', 'vinyle'),
		'labels' => $labels,
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		"menu_position" => 5, "menu_icon" => "dashicons-album",
		"supports" => array("title", "editor", "thumbnail", "excerpt"),
		'capability_type' => 'page',
		'show_in_rest' => true,
		'rest_base' => 'vinyles_api',
	);
	register_post_type('vinyles', $args);
}


add_action('init', 'custom_post_type', 0);

function type_vinyle_taxinomy()
{
	$labels = [
		'name' => _x('Types musicaux', 'taximony general name'),
		'singular_name' => _x('Type musical', 'taximony singular name'),
		'search_items' => __('Rechercher un type musical'),
		'all_items' => __('Tous les types musicaux'),
		'parent_item' => __('Type musical parent'),
		'parent_item_colon' => __('Type musical parent'),
		'add_new_item' => __('Ajouter un type musical'),
		'edit_item' => __('Editer un type musical', 'vinyle'),
		'update_item' => __('Modifier un type musical', 'vinyle'),
		'new_item_name' => __('Nouveau type musical', 'vinyle'),
		'menu_name' => __('Type musicaux')
	];

	$args = [
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_columns' => true,
		'rewrite' => ['slug' => 'vinyle'],
		'show_in_rest' => true,
		'query_var' => true,
	];

	register_taxonomy('type_musicaux', 'vinyles', $args);
}

add_action('init', 'type_vinyle_taxinomy');



function vinyles_rest_api_custom_values()
{
	register_rest_field(
		'vinyles',
		'vinyles_meta',
		array(
			'get_callback' => 'vinyles_meta_information',
			'schema' => null,
			'update_callback' => null
		)
	);


	register_rest_field(
		'vinyles',
		'vinyles_taxonomies',
		array(
			'get_callback' => 'vinyles_taxonomies_information',
			'schema' => null,
			'update_callback' => null
		)
	);

	register_rest_field(
		'vinyles',
		'vinyles_term_type_musicaux',
		array(
			'get_callback' => 'vinyles_term_type_musicaux',
			'schema' => null,
			'update_callback' => null
		)
	);
}

function vinyles_meta_information()
{
	global $post;
	$post_id = $post->ID;
	return get_post_meta($post_id);
}

function vinyles_taxonomies_information()
{
	global $post;
	$post_id = $post->ID;
	return get_object_taxonomies($post);
}

function vinyles_term_type_musicaux()
{
	global $post;
	$post_id = $post->ID;
	return wp_get_post_terms($post_id, 'type_musicaux');
}

add_action('rest_api_init', 'vinyles_rest_api_custom_values');



################################################# metabox #################################

add_action('add_meta_boxes', 'initialisation_metaboxes');
function initialisation_metaboxes()
{
	//on utilise la fonction add_metabox() pour initialiser une metabox
	add_meta_box('id_ma_meta', 'Informations vinyles', 'ma_meta_function', 'vinyles', 'normal', 'high');
}


function ma_meta_function($post)
{
	// on récupère la valeur actuelle pour la mettre dans le champ
	$titre = get_post_meta($post->ID, '_album_title', true);
	$pochette = get_post_meta($post->ID, '_pochette', true);
	$dateSortie = get_post_meta($post->ID, '_date', true);
	$pressage = get_post_meta($post->ID, '_pressage', true);
	$label = get_post_meta($post->ID, '_label', true);
	$identification = get_post_meta($post->ID, '_num_identification', true);
	$style = get_post_meta($post->ID, '_style', true);
	$duree = get_post_meta($post->ID, '_duree', true);
	$prix = get_post_meta($post->ID, '_prix', true);
	$description = get_post_meta($post->ID, '_description', true);

	echo '<label for="album_title">Titre de l\'album : </label>';
	echo '<input id="album_title" type="text" name="album_title" value="' . $titre . '"/>';
	echo '<label for="pochette">Pochette : </label>';
	echo '<input id="pochette" type="text" name="pochette" value="' . $pochette . '"/>';
	echo '<label for="date_de_sortie">Date de sortie : </label>';
	echo '<input id="date" type="text" name="date_de_sortie" value="' . $dateSortie . '" />';
	echo '<label for="pressage">Pressage : </label>';
	echo '<input id="pressage" type="text" name="pressage" value="' . $pressage . '"/>';
	echo '<label for="label">Label : </label>';
	echo '<input id="label" type="text" name="label" value="' . $label . '"/>';
	echo '<label for="num_identification">Numéro d\'identification : </label>';
	echo '<input id="num_identification" type="text" name="num_identification" value="' . $identification . '"/>';
	echo '<label for="style">Pochette :Style </label>';
	echo '<input id="style" type="text" name="style" value="' . $style . '" />';
	echo '<label for="duree">Durée : </label>';
	echo '<input id="duree" type="text" name="duree" value="' . $duree . '"/>';
	echo '<label for="prix">Prix : </label>';
	echo '<input id="prix" type="text" name="prix" value="' . $prix . '"/>';
	echo '<label for="description">Descritpion : </label>';
	echo '<textarea id="description" type="text" name="description" value="' . $description . '"></textarea>';
}

add_action('save_post', 'save_metaboxes');


function save_metaboxes($post_ID)
{
	if (isset($_POST['album_title'])) {
		update_post_meta(
			$post_ID,
			'_album_title',
			sanitize_text_field($_POST['album_title'])
		);
	}
	if (isset($_POST['pochette'])) {
		update_post_meta(
			$post_ID,
			'_pochette',
			sanitize_text_field($_POST['pochette'])
		);
	}
	if (isset($_POST['date_de_sortie'])) {
		update_post_meta(
			$post_ID,
			'_date',
			sanitize_text_field($_POST['date_de_sortie'])
		);
	}
	if (isset($_POST['pressage'])) {
		update_post_meta(
			$post_ID,
			'_pressage',
			sanitize_text_field($_POST['pressage'])
		);
	}
	if (isset($_POST['label'])) {
		update_post_meta(
			$post_ID,
			'_label',
			sanitize_text_field($_POST['label'])
		);
	}
	if (isset($_POST['num_identification'])) {
		update_post_meta(
			$post_ID,
			'_identification',
			sanitize_text_field($_POST['num_identification'])
		);
	}
	if (isset($_POST['style'])) {
		update_post_meta(
			$post_ID,
			'_style',
			sanitize_text_field($_POST['style'])
		);
	}
	if (isset($_POST['duree'])) {
		update_post_meta(
			$post_ID,
			'_duree',
			sanitize_text_field($_POST['duree'])
		);
	}
	if (isset($_POST['prix'])) {
		update_post_meta(
			$post_ID,
			'_prix',
			sanitize_text_field($_POST['prix'])
		);
	}
	if (isset($_POST['description'])) {
		update_post_meta(
			$post_ID,
			'_description',
			sanitize_text_field($_POST['description'])
		);
	}
}

############################################# formulaire #################################

function vinyle_save_contact()
{
	global $wpdb;
	$name = $_POST["name"];
	$email = $_POST["email"];
	$message = $_POST["message"];


	if (isset($_POST['message-submit']) && $_POST['hidden'] === "1") {

		$name = sanitize_text_field($_POST['name']);
		$email = sanitize_email($_POST['email']);
		$message = sanitize_text_field($_POST['message']);

		$admin_email = get_option('admin_email');
		$headers = "From: \"" . $name . "\"<" . email . ">\r\n";
		$message = 'Allez voir votre tableau de bord vous avez reçu un message';
		$envoie = wp_mail($admin_email, 'Message depuis le site vinyle', $message, $headers);

		$textSend = ($envoie === true) ? 'sent' : 'notSent';

		// $wpdb->insert($table, $data, $format)
		global $wp;
		$wp->add_query_var('send');
		$url = get_page_by_title('home');
		wp_redirect(get_permalink($url) . '?send=' . $textSend);

		exit();
	}
}
add_action('init', 'vinyle_save_contact');

// $errormessage = "";

// // NAME
// if (!empty($_POST["first_name"])) {
//     $errormessage = "Name is required ";
// } else {
//     $name = $_POST["first_name"];
// }

// // EMAIL
// if (!empty($_POST["email"])) {
//     $errormessage .= "Email is required ";
// } else {
//     $email = $_POST["email"];
// }

// // MESSAGE
// if (!empty($_POST["message"])) {
//     $errormessage .= "Message is required ";
// } else {
//     $message = $_POST["message"];
// }

// if ($errormessage == "") {

// $EmailTo = "meriem-e769a6@inbox.mailtrap.io";
// $Subject = "New Message Received";
// $Message ='
//     <html>
//     <head></head>
//     <body>
//     <p style="color:red">NOM : '.$first_name.'</p>
//     <p style="color:blue">EMAIL : '.$email.'</p>
//     <p style="color:green">MESSAGE : '.$message.'</p>
//     </body>
//     </html>';

// //le contenu $Message remplace plus simplement le body

// //$header obligatoire pour recevoir en format html
// $headers[] = 'MIME-Version:1.0';
// $headers[] = 'Content-type: text/html; charset=iso-8859-1';

// // // prepare email body text
// // $Body = "first_name: ";
// // $Body .= $first_name;
// // $Body .= "\n";

// // $Body .= "Email: ";
// // $Body .= $email;
// // $Body .= "\n";

// // $Body .= "Message: ";
// // $Body .= $message;
// // $Body .= "\n";

// // // send email
// $success = mail($EmailTo, $Subject, $Message, implode("\r\n", $headers));
//implode("\r\n",$headers) obligatoire pour l'envoi.

// redirect to success page
//     if ($success) {
//         echo "success";
//     } else {
//         echo "error serveur en panne";
//     }
// } else {
//     echo $errormessage;
// }

?>
<?php
############################################### MAP ########################################

//afin qu'apparaisse sur le tableau de bord "un onglet" adress
function adress_setup_menu()
{
	add_menu_page('Adress Page', 'Adress', 'manage_options', 'adress_option', 'adress_init');
}
function adress_init()
{
	echo '<h1>Veuillez saisir votre nouvelle adresse</h1> 
    <form id="form_reply" method="post">

        <input type="text" id="new-value" name="new-value">
        <button  type="submit" id="submit-position">Envoyer</button>
        <span id="resultat"></span>
    </form>';

	if (!$_POST['new-value'] == '') {
		global $wpdb;

		$wpdb->update(
			$wpdb->prefix . 'options',
			array('option_value' => $_POST['new-value']),
			array('option_name' => 'adress_client')
		);
	}
}
add_action('admin_menu', 'adress_setup_menu');
?>