<?
/*
Template Name: Page Historique
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="date_finale" style="background-image: url('<? the_field('image_de_la_date_finale'); ?>')">
        <div class="contenu_grid">
            <div class="date_center_rouge"><? the_field('date_finale'); ?></div>
            <div class="intro_histo">
                <? the_field('texte_finale'); ?>
            </div>
            <span class="red_cross"></span>
        </div>
    </section>
    <? if ( have_rows('date_marquante') ) { ?>
        <section class="timeline">
            <? while ( have_rows('date_marquante') ) : the_row(); ?>
                <? if(get_sub_field('affichage_date') == 'date_right') { ?>
                    <section class="date_right" style="background-image: url('<? the_sub_field('fond') ?>') ">
                        <div class="contenu_grid">
                            <div class="visuel_date timeline-content js--fadeInLeft">
                                <img src="<? the_sub_field('image_date'); ?>" alt="">
                            </div>
                            <div class="content_date timeline-content js--fadeInRight">
                                <div class="titre_date">
                                   <? the_sub_field('date'); ?>
                                </div>
                                <div class="txt_date" style="color: <? the_sub_field('couleur_du_texte') ?>;">
                                    <? the_sub_field('descriptif_date'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <? }else{ ?>
                    <section class="date_left" style="background-image: url('<? the_sub_field('fond') ?>') ">
                        <div class="contenu_grid">
                            <div class="visuel_date">
                                <span class="red_cross"></span>
                                <div class="image_test timeline-content js--fadeInRight" style="background-image: url('<? the_sub_field('image_date') ?>')">

                                </div>
                            </div>
                            <div class="content_date timeline-content js--fadeInLeft">
                                <div class="titre_date">
                                    <? the_sub_field('date'); ?>
                                </div>
                                <div class="txt_date" style="color: <? the_sub_field('couleur_du_texte') ?>;">
                                    <? the_sub_field('descriptif_date'); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <? } ?>
            <? endwhile; ?>
        </section>
    <? } ?>
    <section class="date_debut" style="background-image: url(<? the_field('image_debut') ?>)">
        <div class="contenu_grid">
            <span class="red_cross"></span>
            <div class="date_center_rouge"><? the_field('date_debut') ?></div>
            <div class="intro_histo">
                <? the_field('texte_date_debut') ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
