<?
/*
Template Name: Page Ressource Musicien
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if ( post_password_required() ) : ?>

    <?php echo get_the_password_form(); ?>

<?php else : ?>

    <div id="content">
        <section class="top_page_disco">
            <div class="contenu_grid">
                <h1 class="abonne_plus_book">Ressources Musiciens</h1>
            </div>
        </section>
        <section class="section-musiciens" id="equipe">
          <?
             $args       =   array('post_type'       => 'ressource_musicien',
                                   'posts_per_page'  => -1,);

             $the_query  = new WP_Query($args);
          ?>
          <? if ( $the_query->have_posts() ) { ?>
            <div class="musiciens__inner">
                <div class="musiciens__dep musiciens__dep--first">
                    <h2 class="musiciens__dep__title">
                        Planning
                        <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                        <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                              src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                              alt=""></span>
                    </h2>
                    <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
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
                                      <? the_field('titre'); ?>
                                  </h3>
                                  <h4 class="musiciens__dep__item__fct">
                                      <? the_field('mois') ?>
                                  </h4>
                              </a>
                          </li>
                        <? };?>
                    </ul>
                </div>
            </div>
          <? }; ?>
        </section>
    </div>
<?php endif; ?>
<?php get_footer(); ?>
