<?
/*
Template Name: Page Ressource Presses
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">

    <section class="top_page_disco">
        <div class="contenu_grid">
            <h1 class="abonne_plus_book">Presse</h1>
            <div class="btn_new">Communiqué de presse</div> + <div class="btn_new">Dossier de presse</div>
        </div>
    </section>
<!--
    <section class="section-musiciens" id="equipe">
        <div class="contenu__grid">
            <div class="musiciens__inner">

                <div class="musiciens__dep musiciens__dep--first">
                    <h2 class="musiciens__dep__title">
                        Communiqué de presse

                        <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                        <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                alt=""></span>
                    </h2>
                    <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                </div>
            </div>
        </div>
    </section>
-->


    <section class="section-musiciens" id="equipe">

      <?
         $args       =   array('post_type'       => 'ressource_presse',
                               'posts_per_page'  => -1,
                               'meta_key'        => 'type',
                               'meta_value'       => 'communique_presse',
                               'meta_compare'     => '==');
         $the_query  = new WP_Query($args);

      ?>
      <? if ( $the_query->have_posts() ) { ?>
        <div class="musiciens__inner">
            <div class="musiciens__dep musiciens__dep--first">
                <h2 class="musiciens__dep__title">
                    Communiqué de Presse
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
                                  <? the_title(); ?>
                              </h3>
                              <h4 class="musiciens__dep__item__fct">
                                  <? the_field('saison') ?>
                              </h4>
                          </a>
                      </li>
                    <? };?>
                </ul>
            </div>
        </div>
      <? }; ?>

      <?
         $args       =   array('post_type'       => 'ressource_presse',
                               'posts_per_page'  => -1,
                               'meta_key'        => 'type',
                               'meta_value'       => 'dossier_presse',
                               'meta_compare'     => '==');

         $the_query  = new WP_Query($args);

      ?>
      <? if ( $the_query->have_posts() ) { ?>
        <div class="musiciens__inner">
            <div class="musiciens__dep musiciens__dep--first">
                <h2 class="musiciens__dep__title">
                    Dossier Presse
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
                                  <? the_title(); ?>
                              </h3>
                              <h4 class="musiciens__dep__item__fct">
                                  <? the_field('saison') ?>
                              </h4>
                          </a>
                      </li>
                    <? };?>
                </ul>
            </div>
        </div>
      <? }; ?>

    </section>
    <section class="contact">
        <div class="contenu_grid">
            <div class="btn_contact"><a href="###"> Nous Contacter</a></div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
