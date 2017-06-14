<?php
/*
Template Name: Page Mentions legales
*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>


<div id="content">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">


            <section class="ml">

                <div class="ml__inner">

                    <div class="ml__left">

                        <h2 class="ml__title">
                            Mentions légales
                        </h2>


                        <p class="ml__text">
                            Le site www.o-s-b.fr est édité par<br>  l’Orchestre symphonique de Bretagne<br>
                            42 A, rue Saint-Melaine<br>
                            35000 Rennes.
                        </p>

                        <p class="ml__text">
                            Association Loi 1901<br>
                            Licence d’entrepreneur de spectacle : 2-105 46 46 et 3-105 46 45<br>
                            Numéro de TVA intracommunautaire : FR 82 350 102 091<br>
                        </p>

                        <p class="ml__text">

                            Directeur de la publication : Marc Feldman

                        </p>

                        <p class="ml__text">
                            Hébergement du site web :<br>
                            OVH<br>
                            SAS au capital de 500 k € RCS Roubaix<br>
                            Tourcoing 424 761 419 00011<br>
                            Siège social : 140 Quai du Sartel - 59100 Roubaix - France.<br>
                        </p>

                        <h3 class="ml__subtitle">
                            PROPRIÉTÉ INTELLECTUELLE
                        </h3>
                        <p class="ml__text">
                            Le site de l’Orchestre symphonique de Bretagne relève de la législation française et
                            internationale sur le droit d’auteur et la propriété intellectuelle. Tous les droits de
                            reproduction, y compris pour les documents téléchargeables, sont réservés.
                        </p>

                        <p class="ml__text">
                            La reproduction de tout ou partie du site est formellement interdite, sauf autorisation du
                            directeur de la publication.
                        </p>

                        <h3 class="ml__subtitle">
                            CONDITIONS D’UTILISATION
                        </h3>
                        <p class="ml__text">
                            Les informations de ce site sont données à titre indicatif et sont susceptibles d’être
                            modifiées.
                        </p>

                        <h3 class="ml__subtitle">
                            DROIT D’ACCÈS ET DE RECTIFICATION
                        </h3>
                        <p class="ml__text">
                            Les données personnelles ne sont pas divulguées à des tiers.
                            Conformément à la loi « Informatique et libertés », tout utilisateur dispose d’un droit
                            d’accès et de rectification sur les données le concernant.
                        </p>
                    </div>

                    <div class="ml__right">

                        <h2 class="ml__title">
                            Crédits
                        </h2>
                        <h3 class="ml__subtitle">
                            SAISON 17+18 / ExplOh!rons
                        </h3>

                        <p class="ml__text">
                            Conception+Réalisation: Agence Autrement - <a target="_blank" href="http://autrement.bzh">autrement.bzh</a><br>
                            Photos : Nicolas Joubard

                        <h3 class="ml__subtitle">
                            PHOTOS
                        </h3>

                        <p class="ml__text">
                            +LA SAISON<br>
                            Photos : Droits réservés<br>
                            +CÔTÉ ORCHESTRE / CÔTÉ ORGANISATION<br>
                            Photos : Nicolas Joubard<br>
                        </p>

                        <h3 class="ml__subtitle">
                            RÉALISATION DU SITE
                        </h3>


                        <p class="ml__text">
                            Conception & Design : <a target="_blank" href="http://autrement.bzh">www.Autrement.bzh</a><br>
                            Développement : www.Le-Web-Autrement.com

                        </p>


                    </div>


                </div>


        </article>

    <?php endwhile; ?>

    <?php else : ?>

        <article id="post-not-found" class="hentry cf">
            <header class="article-header">
                <h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
            </header>
            <section class="entry-content">
                <p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
            </section>
            <footer class="article-footer">
                <p><?php _e('This is the error message in the single-custom_type.php template.', 'bonestheme'); ?></p>
            </footer>
        </article>

    <?php endif; ?>

</div>


<?php get_footer(); ?>
