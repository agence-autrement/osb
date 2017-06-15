<?
/*
Template Name: Page Venir en Groupe
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action">
        <div class="contenu_grid">
            <div class="title">
                Venir <span>En groupe</span>
            </div>
            <div class="tag">
                <div class="btn_red"><a href="###">Inscription</a></div>

            </div>
            <div class="intro_text">
                Vous êtes une maison de quartier, une école de musique, un hôpital de jour, un centre de loisirs, un
                centre social, une maison de retraite, une association à but socio-éducatif... et vous souhaitez
                assister à un concert de l’OSB ?
                <br><br>
                Pour vous inscrire, remplissez le formulaire ci-dessous et validez. Merci d’y noter vous souhaits, nous
                reviendrons vers vous pour conﬁrmer la réservation en fonction des places disponibles.
            </div>
        </div>
    </section>
    <section class="formulaire_groupe">
        <div class="contenu_grid">
            <div class="titre_form_groupe">// Inscription groupes //</div>

            <? echo do_shortcode('[contact-form-7 id="274" title="Contact Form Venir en groupe"]'); ?>

        </div>
    </section>
</div>
<?php get_footer(); ?>
