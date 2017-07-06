<?
/*
Template Name: Page Ressource Pédagogique
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
    <div id="content">
        <section class="top_page_disco">
            <div class="contenu_grid">
                <h1 class="abonne_plus_book">Ressources Pédagogiques</h1>
            </div>
        </section>
        <section class="section-musiciens" id="equipe">
            <div class="contenu__grid">
                <div class="musiciens__inner">
                    <div class="musiciens__dep musiciens__dep--first">
                        <h2 class="musiciens__dep__title">
                            2015 - 2016
                            <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                  src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                  alt=""></span>
                        </h2>
                        <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                           <?
                              $args       =   array('post_type'       => 'ressource_pedagogiq',
                                                    'posts_per_page'  => -1,
                                                    'meta_key'        => 'saison',
                                                  	'meta_value'       => '2015_2016',
                                                  	'meta_compare'     => '==');
                              $the_query  = new WP_Query($args);

                           ?>
                           <? if ( $the_query->have_posts() ) { ?>

                              <ul class="musiciens__dep__items musiciens__dep--first__items">

                                  <? while (  $the_query->have_posts()) {
                                              $the_query->the_post();
                                  ?>
                                    <li class="musiciens__dep__item">
                                        <a href="<? the_field('fichier'); ?>">
                                            <img class="musiciens__dep__item__img"
                                                 src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                                 alt="">
                                            <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                                <? the_title(); ?>
                                            </h3>
                                            <h4 class="musiciens__dep__item__fct">

                                            </h4>
                                        </a>
                                    </li>
                                  <? };?>
                              </ul>
                          <? }; ?>
                    </div>
                </div>
                <div class="musiciens__inner">
                    <div class="musiciens__dep">
                        <h2 class="musiciens__dep__title">
                            2014 - 2015
                            <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                  src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                  alt=""></span>
                        </h2>
                        <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                           <?
                              $args       =   array('post_type'       => 'ressource_pedagogiq',
                                                    'posts_per_page'  => -1,
                                                    'meta_key'        => 'saison',
                                                    'meta_value'       => '2014_2015',
                                                    'meta_compare'     => '==');
                              $the_query  = new WP_Query($args);

                           ?>
                           <? if ( $the_query->have_posts() ) { ?>

                              <ul class="musiciens__dep__items musiciens__dep--first__items">

                                  <? while (  $the_query->have_posts()) {
                                              $the_query->the_post();
                                  ?>
                                    <li class="musiciens__dep__item">
                                        <a href="<? the_field('fichier'); ?>">
                                            <img class="musiciens__dep__item__img"
                                                 src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                                 alt="">
                                            <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                                <? the_title(); ?>
                                            </h3>
                                            <h4 class="musiciens__dep__item__fct">

                                            </h4>
                                        </a>
                                    </li>
                                  <? };?>
                              </ul>
                          <? }; ?>
                    </div>
                </div>
                <div class="musiciens__inner">
                    <div class="musiciens__dep">
                        <h2 class="musiciens__dep__title">
                            2013 - 2014
                            <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                  src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                  alt=""></span>
                        </h2>
                        <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                           <?
                              $args       =   array('post_type'       => 'ressource_pedagogiq',
                                                    'posts_per_page'  => -1,
                                                    'meta_key'        => 'saison',
                                                    'meta_value'       => '2013_2014',
                                                    'meta_compare'     => '==');
                              $the_query  = new WP_Query($args);

                           ?>
                           <? if ( $the_query->have_posts() ) { ?>

                              <ul class="musiciens__dep__items musiciens__dep--first__items">

                                  <? while (  $the_query->have_posts()) {
                                              $the_query->the_post();
                                  ?>
                                    <li class="musiciens__dep__item">
                                        <a href="<? the_field('fichier'); ?>">
                                            <img class="musiciens__dep__item__img"
                                                 src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                                 alt="">
                                            <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                                <? the_title(); ?>
                                            </h3>
                                            <h4 class="musiciens__dep__item__fct">

                                            </h4>
                                        </a>
                                    </li>
                                  <? };?>
                              </ul>
                          <? }; ?>
                    </div>
                </div>
                <div class="musiciens__inner">
                    <div class="musiciens__dep">
                        <h2 class="musiciens__dep__title">
                            2012 - 2013
                            <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                  src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                  alt=""></span>
                        </h2>
                        <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                           <?
                              $args       =   array('post_type'       => 'ressource_pedagogiq',
                                                    'posts_per_page'  => -1,
                                                    'meta_key'        => 'saison',
                                                    'meta_value'       => '2012_2013',
                                                    'meta_compare'     => '==');
                              $the_query  = new WP_Query($args);

                           ?>
                           <? if ( $the_query->have_posts() ) { ?>

                              <ul class="musiciens__dep__items musiciens__dep--first__items">

                                  <? while (  $the_query->have_posts()) {
                                              $the_query->the_post();
                                  ?>
                                    <li class="musiciens__dep__item">
                                        <a href="<? the_field('fichier'); ?>">
                                            <img class="musiciens__dep__item__img"
                                                 src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                                 alt="">
                                            <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                                <? the_title(); ?>
                                            </h3>
                                            <h4 class="musiciens__dep__item__fct">

                                            </h4>
                                        </a>
                                    </li>
                                  <? };?>
                              </ul>
                          <? }; ?>
                    </div>
                </div>
                <div class="musiciens__inner">
                    <div class="musiciens__dep">
                        <h2 class="musiciens__dep__title">
                            2011 - 2012
                            <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                  src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                  alt=""></span>
                        </h2>
                        <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                           <?
                              $args       =   array('post_type'       => 'ressource_pedagogiq',
                                                    'posts_per_page'  => -1,
                                                    'meta_key'        => 'saison',
                                                    'meta_value'       => '2011_2012',
                                                    'meta_compare'     => '==');
                              $the_query  = new WP_Query($args);

                           ?>
                           <? if ( $the_query->have_posts() ) { ?>

                              <ul class="musiciens__dep__items musiciens__dep--first__items">

                                  <? while (  $the_query->have_posts()) {
                                              $the_query->the_post();
                                  ?>
                                    <li class="musiciens__dep__item">
                                        <a href="<? the_field('fichier'); ?>">
                                            <img class="musiciens__dep__item__img"
                                                 src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                                 alt="">
                                            <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                                <? the_title(); ?>
                                            </h3>
                                            <h4 class="musiciens__dep__item__fct">

                                            </h4>
                                        </a>
                                    </li>
                                  <? };?>
                              </ul>
                          <? }; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
