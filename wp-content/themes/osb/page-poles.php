<?
/*
Template Name: Page poles
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action"
             style="background-position :center center; background-size: cover; background-image:url('<?php echo get_template_directory_uri(); ?>/library/images/slide_poles.jpg');">
    <div class="contenu_grid">
        <? if (have_rows('actions')) { ?>
            <div class="index">

            </div>
        <? }; ?>
        <h1 class="title">Les pôles<br>
            <span>artistiques</span> & <span>culturels</span>
        </h1>
        <div class="tag">
            <div class="btn_red"><a href="<? the_sub_field('lien_du_bouton'); ?>">Au plus près de vous</a></div>

            <div class="btn_savoir_plus"><a href="#poles">En savoir +</a></div>
        </div>
        <div class="intro_text">
            <p>Pour faire évoluer son projet et répondre au mieux aux attentes des publics aux quatre coins de la
                Bretagne, l’Orchestre souhaite créer un Pôle artistique et culturel dans chaque département breton.
                L’Orchestre Symphonique de Bretagne entend ainsi répondre à cet objectif double de démocratisation
                culturelle et de rayonnement sur la Bretagne en s’associant aux structures locales : collectivités,
                écoles de musique, structures culturelles, autour de projets au long cours. Un Pôle repose sur trois
                notions essentielles, la diffusion de grandes œuvres du répertoire classique au plus près des habitants,
                la pratique collective de la musique et la rencontre avec ceux qui la font.</p>
        </div>
    </div>
    </section>



    <? if (have_rows('pole')) { ?>

      <? while ( have_rows('pole')) : the_row(); ?>

        <? if(get_sub_field('contenu_droite__gauche') == 'gauche'){ ?>

            <section class="poles poles--first" id="poles">
                <div class="contenu_grid">
                    <div class="poles--first__left">
                        <img class="poles--first__img"
                             src="<? the_sub_field('visuel') ?>" alt="">
                    </div>
                    <div class="poles--first__right">
                        <h2 class="poles--first__title">
                            <? the_sub_field('titre') ?>
                            <span class="croix_noir"></span>
                        </h2>
                        <p class="poles--first__text">
                            <? the_sub_field('texte') ?>
                        </p>
                    </div>
                </div>
            </section>
            <section class="poles-fiche">
                <div class="contenu_grid">
                    <p class="section-event-title">// Voir la fiche spectacle //</p>
                    <div class="poles-fiche__item"
                         style="background-image: url('<? the_sub_field('visuel_fiche') ?>')">
                        <div class="left_date">
                            <div class="type type--blue"><? the_sub_field('type_de_spectacle') ?></div>
                            <div class="titre"><? the_sub_field('titre_fiche_spectacle') ?></div>
                            <a href="<? the_sub_field('lien_en_savoir_plus') ?>" class="link_calendrier">EN SAVOIR
                                +</a>
                        </div>
                        <div class="right_date">
                            <div class="date_jours">
                                <? the_sub_field('jour_fiche') ?>
                            </div>
                            <div class="date_mois"><? the_sub_field('mois_fiche') ?></div>
                            <div class="lieu"><? the_sub_field('lieu_fiche') ?></div>
                        </div>

                        <a class="bot_date bot_date--blue"
                           href="<? the_sub_field('lien_reserver') ?>" target="_blank">
                            Réserver
                        </a>
                    </div>
                </div>
            </section>

          <? }else{ ?>

            <section class="poles poles--second" id="poles">
                <div class="contenu_grid">
                    <div class="poles--second__left">
                        <img class="poles--second__img"
                             src="<? the_sub_field('visuel') ?>" alt="">
                    </div>
                    <div class="poles--second__right">
                        <h2 class="poles--second__title">
                            <? the_sub_field('titre') ?>
                            <span class="croix_noir"></span>
                        </h2>
                        <p class="poles--second__text">
                            <? the_sub_field('texte') ?>
                        </p>
                    </div>
                </div>
            </section>
            <section class="poles-fiche">
                <div class="contenu_grid">
                    <p class="section-event-title">// Voir la fiche spectacle //</p>
                    <div class="poles-fiche__item"
                         style="background-image: url('<? the_sub_field('visuel_fiche') ?>')">
                        <div class="left_date">
                            <div class="type type--blue"><? the_sub_field('type_de_spectacle') ?></div>
                            <div class="titre"><? the_sub_field('titre_fiche_spectacle') ?></div>
                            <a href="<? the_sub_field('lien_en_savoir_plus') ?>" class="link_calendrier">EN SAVOIR
                                +</a>
                        </div>
                        <div class="right_date">
                            <div class="date_jours">
                                <? the_sub_field('jour_fiche') ?>
                            </div>
                            <div class="date_mois"><? the_sub_field('mois_fiche') ?></div>
                            <div class="lieu"><? the_sub_field('lieu_fiche') ?></div>
                        </div>

                        <a class="bot_date bot_date--blue"
                           href="<? the_sub_field('lien_reserver') ?>" target="_blank">
                            Réserver
                        </a>
                    </div>
                </div>
            </section>

          <? }; ?>

        <? endwhile; ?>

    <?  }; ?>

    <section class="poles-more">
        <p class="poles-more__text">
            D’autres Pôles sont en cours d’élaboration.<br> Pour suivre de près la vie des Pôles et l’avènement de nouvelles
            expériences musicales, suivez-nous..
        </p>
    </section>

</div>

<?php get_footer(); ?>
