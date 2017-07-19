<?
/*
Template Name: Page Discographie
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <section class="top_page_disco">
        <div class="contenu_grid">
            <h1 class="abonne_plus_book">Discographie</h1>
            <div class="btn_new">Écoutez l'OSB</div>
            <div class="txt_intro">L’OSB vous propose de nouvelles formules d’abonnements. Au programme, toujours plus de privilèges : accès à la billetterie dès le 20 juin, privilège de placement, réductions garanties tout au long de la saison, réductions chez des partenaires sélectionnés… et bien plus encore !</div>
        </div>
    </section>
    <div class="contenu_grid">
        <h2 class="musiciens__dep__title">
            Disponible en boutique
            <span class="musiciens__dep__title__cross">+</span>
                  <span class="musiciens__dep__title__arrow"><img
                          src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                          alt=""></span>
        </h2>
    </div>
    <section class="disque">
        <div class="contenu_grid">
            <?
               $args       =   array('post_type'       => 'disque',
                                     'posts_per_page'  => -1,
                                     'meta_key'        => 'disponibilte_boutique',
                                     'meta_value'       => 'dispo',
                                     'meta_compare'     => '==');
               $the_query  = new WP_Query($args);

            ?>
            <? if ( $the_query->have_posts() ) { ?>

               <ul>

                   <? while (  $the_query->have_posts()) {
                               $the_query->the_post();
                   ?>
                     <li class="produit">
                         <div class="visuel_produit">

                           <? if( get_field('spotify')){ ?>
                             <? the_field('spotify') ?>
                             <div class="spotify"></div>
                             <div class="close_spot"></div>
                           <? } ?>
                           <img src="<? the_field('visuel'); ?>" alt="disque">
                           <div class="prix"><? the_field('prix'); ?></div>
                         </div>
                         <h3 class="artiste"><? the_field('artiste'); ?></h3>
                         <div class="programme">
                             <? the_field('titre'); ?>
                         </div>
                         <div class="acheter"><a href="<? the_field('lien_boutique') ?>" target="_blank">Acheter</a></div>
                     </li>
                   <? };?>
               </ul>
           <? }; ?>
        </div>
    </section>

    <div class="contenu_grid">
        <h2 class="musiciens__dep__title">
            Archive Discographie
            <span class="musiciens__dep__title__cross">+</span>
            <span class="musiciens__dep__title__arrow">
              <img src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg" alt="">
            </span>
        </h2>
    </div>
    <section class="disque">
        <div class="contenu_grid">
            <?
               $args       =   array('post_type'       => 'disque',
                                     'posts_per_page'  => -1,
                                     'meta_key'        => 'disponibilte_boutique',
                                     'meta_value'       => 'archive',
                                     'meta_compare'     => '==');
               $the_query  = new WP_Query($args);

            ?>
            <? if ( $the_query->have_posts() ) { ?>

               <ul>

                   <? while (  $the_query->have_posts()) {
                               $the_query->the_post();
                   ?>
                     <li class="produit">
                         <div class="visuel_produit">
                             <img src="<? the_field('visuel'); ?>" alt="disque">
                             <div class="prix"><? the_field('prix'); ?></div>
                         </div>
                         <h3 class="artiste"><? the_field('artiste'); ?></h3>
                         <div class="programme">
                             <? the_field('titre'); ?>
                         </div>
                         <div class="acheter"><a href="<? the_field('lien_boutique') ?>" target="_blank">Acheter</a></div>
                     </li>
                   <? };?>
               </ul>
           <? }; ?>
        </div>
    </section>
</div>


<?php get_footer(); ?>
