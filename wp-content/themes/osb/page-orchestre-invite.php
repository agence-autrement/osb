<?
/*
Template Name: Page Orchestre Invité
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action">
        <div class="contenu_grid">
          <? if( have_rows('actions') ){ ?>
            <div class="index">
                <ul>
                    <? while ( have_rows('actions') ) : the_row(); ?>
                        <li class="li_index"><? the_sub_field('titre'); ?></li>
                    <? endwhile; ?>
                </ul>
            </div>
          <? }; ?>

          <div class="title">
              <h1>
                  <? the_field('titre_1'); ?><br>
                  <span> <? the_field('titre_2'); ?></span>
              </h1>
          </div>
          <div class="tag">
              <? if( have_rows('boutons_rouges') ){ ?>
                  <? while ( have_rows('boutons_rouges') ) : the_row(); ?>
                      <div class="btn_red"><a href="<? the_sub_field('lien_du_bouton'); ?>"><? the_sub_field('texte_bouton'); ?></a></div>
                  <? endwhile; ?>
                  <? }; ?>
              <div class="btn_savoir_plus"><a href="<? the_field('lien_en_savoir'); ?>">En savoir +</a></div>
          </div>
          <div class="intro_text">
              <? the_field('texte_sous_le_titre'); ?>
          </div>
        </div>
    </section>

    <? if ( have_rows('actions') ){ ?>
        <? while ( have_rows('actions') ) : the_row(); ?>
            <?
            $subject = get_sub_field('titre');
            $search = " ";
            $replace = '_';
            $str = str_replace ($search , $replace ,$subject );
            ?>
            <? if ( get_sub_field('affichage') == 'special_content' ){ ?>
                <section class="<? the_sub_field('affichage'); ?>" style="background-image: url('<? the_sub_field('visuel'); ?>')" id="<? echo $str; ?>">
                    <div class="contenu_grid">
                        <div class="left_content">
                            <div class="titre_content">
                                <h2>
                                    <? the_sub_field('titre'); ?>
                                </h2>
                                <span class="croix_rouge"></span>
                            </div>
                        </div>
                        <div class="right_content">
                            <div class="titre_right_text">
                                <? the_sub_field('compositeur')  ?>
                                <span class="croix_noir"></span>
                            </div>
                            <div class="txt_right_content"><? the_sub_field('texte'); ?></div>

                            <div class="qui">
                                <div class="titre_qui">
                                    <? the_sub_field('nom_de_lorchestre'); ?>
                                </div>
                                <? if ( have_rows('membres') ) { ?>
                                    <div class="qui_qui">
                                        <ul>
                                            <? while ( have_rows('membres') ) : the_row(); ?>
                                                <li>// <? the_sub_field('role') ?> : <? the_sub_field('nom') ?></li>
                                            <? endwhile; ?>
                                        </ul>
                                    </div>
                                <? } ?>
                            </div>
                            <? if ( have_rows('bouton_dinscription') ) { ?>
                                <? while ( have_rows('bouton_dinscription') ) : the_row(); ?>
                                    <div class="inscrire">
                                        <div class="ligne_un">
                                            <div class="date"><? the_sub_field('date') ?></div><span> // </span><div class="heure"><? the_sub_field('heure') ?></div>
                                        </div>
                                        <div class="ligne_deux">
                                            <div class="ville"><? the_sub_field('ville') ?></div><span> // </span><div class="salle"><? the_sub_field('lieu') ?></div>
                                        </div>
                                        <div class="btn_inscription"><a href="#formulaire">Inscrire sa classe</a></div>
                                    </div>
                                <? endwhile; ?>
                            <? } ?>
                        </div>
                    </div>
                </section>

            <? }else{ ?>
                <section class="<? the_sub_field('affichage'); ?>" id="<? echo $str; ?>">
                    <div class="contenu_grid">
                        <div class="left_content">
                            <div class="titre_content">
                                <h2>
                                    <? the_sub_field('titre'); ?>
                                </h2>
                                <span class="croix_rouge"></span>
                            </div>
                            <div class="visuel_content">
                                <img src="<? the_sub_field('visuel'); ?>" alt="">
                            </div>
                        </div>
                        <div class="right_content">
                            <div class="titre_right_text">
                                <? the_sub_field('compositeur')  ?>
                                <span class="croix_noir"></span>
                            </div>
                            <div class="txt_right_content"><? the_sub_field('texte'); ?></div>

                            <div class="qui">
                                <div class="titre_qui">
                                    <? the_sub_field('nom_de_lorchestre'); ?>
                                </div>
                                <? if ( have_rows('membres') ) { ?>
                                    <div class="qui_qui">
                                        <ul>
                                            <? while ( have_rows('membres') ) : the_row(); ?>
                                                <li>// <? the_sub_field('role') ?> : <? the_sub_field('nom') ?></li>
                                            <? endwhile; ?>
                                        </ul>
                                    </div>
                                <? } ?>
                            </div>
                            <? if ( have_rows('bouton_dinscription') ) { ?>
                                <? while ( have_rows('bouton_dinscription') ) : the_row(); ?>
                                    <div class="inscrire">
                                        <div class="ligne_un">
                                            <div class="date"><? the_sub_field('date') ?></div><span> // </span><div class="heure"><? the_sub_field('heure') ?></div>
                                        </div>
                                        <div class="ligne_deux">
                                            <div class="ville"><? the_sub_field('ville') ?></div><span> // </span><div class="salle"><? the_sub_field('lieu') ?></div>
                                        </div>
                                        <div class="btn_inscription"><a href="#formulaire">Réserver</a></div>
                                    </div>
                                <? endwhile; ?>
                            <? } ?>
                    </div>
                </section>
            <? } ?>
        <? endwhile; ?>
    <? }; ?>
    <? get_template_part('joinUs'); ?>
    <? get_template_part('vous-aimerez') ?>
</div>
<?php get_footer(); ?>
