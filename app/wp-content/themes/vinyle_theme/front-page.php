<?php get_header(); ?>



<!-- ################   SLIDER   ######################################## 
#################################################################### -->

<section class="slider_bootstrap">
    <?php
    $query = new WP_Query(array(

        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DESC', // classé par ordre alphabétique 
        'orderby' => 'date_post', // par titre 
        'post_status' => 'publish'
    ));
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/wp-content/themes/vinyle_theme/assets/img/slide_1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <?php if ($query->have_posts()) : $query->the_post(); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="trait"></div>
                        <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/wp-content/themes/vinyle_theme/assets/img/slide_2.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <?php if ($query->have_posts()) : $query->the_post(); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="trait"></div>
                        <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/wp-content/themes/vinyle_theme/assets/img/slide_3.jpg" alt="Third slide">
                <div class="carousel-caption">
                    <?php if ($query->have_posts()) : $query->the_post(); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="trait"></div>
                        <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


<!-- #################### IMAGES GENRE MUSIC ##########################
################################################################## -->

<?php


$cat_args = array(
    'orderby' => 'term_id',
    'order' => 'ASC',
    'hide_empty' => false,
    'offset' => 7,
    'count' => true
);




$terms = get_terms('type_musicaux');
?>
<section id="vinyle_count" class="container-fluid">
    <div id="img_home" class="container">
        <div class="row">
            <?php
            foreach ($terms as $objectTerms) {
                ?>
                <div class=" col-md-offset-1-col-2 test">
                    <a href="<?php echo (get_term_link($objectTerms->name, 'type_musicaux')); ?>"> <span></span>
                        <p><?php echo '<h2>' . $objectTerms->name . '</h2>' . "\n";
                            echo '<p class="lead"> Nombre de vinyle(s) : ' . $objectTerms->count . '</p>' . "\n"; ?></p>

                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>






<!-- ########################### FORMULAIRE CONTACT #########################################
######################################################################################## -->
<section class="map_form">
    <div class="container-fluid">
        <div class="container">
            <div class="form-row">
                <form method="POST" action="#" id="formulaire" class="needs-validation" novalidate>
                    <div class="col-12" class="form_col">
                        <h2>Get in touch with us</h2>
                        <label for="name"></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-12" class="form_col">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-12" class="form_col">
                        <label for="message"></label>
                        <textarea class="form-control" id="message" placeholder="Message" name="message" rows="3" required></textarea>
                    </div>
                    <input name="message-submit" type="submit" id="submit" value="Envoyer" class="btn btn-success">
                    <input type="hidden" name="hidden" value="1">
                </form>

                <?php
                if (isset($_GET['send']) && $_GET['send'] === "sent") {
                    echo 'Votre mail est bien partie';
                } else if (isset($_GET['send']) && $_GET['send'] === "notSent") {
                    echo 'Le serveur de mail ne marche plus !!! désolé';
                }
                ?>

                <!--#################################################### MAP ############################################################################ -->
                <div class="col-12">
                    <div id="map">
                        <!-- Ici s'affichera la carte -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
global $wpdb;

// Interrogation de la base de données
$resultats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name = 'adress_client'");

// Parcours des resultats obtenus
foreach ($resultats as $post) {
    $post->option_value;
}

?>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

<script>
    macarte = L.map('map');
    var mondayLayer = L.geoJSON()

    var adress_client = '<?PHP echo $post->option_value; ?>';

    function Goto(adress) {

        var xmlhttp = new XMLHttpRequest();
        var url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + adress;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != '[]') {
                    var myArr = JSON.parse(this.responseText);
                    var latitudex = myArr[0]['lat'];
                    var longitudex = myArr[0]['lon'];
                    console.log('latitude=' + latitudex + ' et longitude=' + longitudex);
                    var marker = L.marker([latitudex, longitudex]).addTo(macarte);
                    macarte.setView([latitudex, longitudex], 11);
                } else {
                    alert('pas trouvé');
                }
            }
        };

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }



    // Fonction d'initialisation de la carte
    function initMap() {
        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"

        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'donnsées © <a href="osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);


    }
    window.onload = function() {
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        initMap();
    };
    Goto(adress_client);
</script>


<?php
get_footer();
?>