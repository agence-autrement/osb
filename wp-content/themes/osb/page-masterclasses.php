<?
/*
Template Name: Page Master Classes
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/masterclasses_slide.jpg"
    ');">

    <div class="header__logo">
        <a target="_blank" href="http://www.engie.com/engagements/solidarite/fondation/"><img class="header__logo__img"
             src="<?php echo get_template_directory_uri(); ?>/library/images/engie.png"
             alt=""></a>
        <a target="_blank" href="https://www.fondation-sncf.org/fr/"><img class="header__logo__img"
             src="<?php echo get_template_directory_uri(); ?>/library/images/sncf_fondation.png"
             alt=""></a>

    </div>
    <div class="contenu_grid">
        <? if (have_rows('actions')) { ?>
            <div class="index">

            </div>
        <? }; ?>
        <div class="title">
            <h1>
                Masterclasses
            </h1>
        </div>
        <div class="tag">
            <div class="btn_red"><a href="<? the_sub_field('lien_du_bouton'); ?>">Transmettre son savoir-faire</a></div>

            <div class="btn_savoir_plus"></div>
        </div>
        <div class="intro_text">
            <p>Les « masterclasses » permettent à de jeunes musiciens issus des conservatoires et des écoles de musique
                de la région de rencontrer des solistes et des chefs d’orchestre invités.</p>
            <p>La transmission est au cœur de ce face à face. Transmission de la passion, de la technique, du désir
                d’excellence et du travail poussent l’élève à se dépasser, et aussi à se découvrir.</p>
            <p>Pour plus d'information contacter lafabrik@o-s-b.fr </p>
            <p>Avec le soutien de La Fondation SNCF et Engie.</p>
        </div>
    </div>
    </section>

</div>
<?php get_footer(); ?>
