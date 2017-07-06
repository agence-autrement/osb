<?
/*
Template Name: Page Ressources Publiques
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">

    <section class="section-header-ressources section-header-rp">

        <div class="contenu_grid">


            <div class="header-ressources__inner">
                <h1 class="header-ressources__title">Ressources <span>publiques</span></h1>

                <div class="header-ressources__content">
                    <a href="#" class="header-ressources__btn btn">Biographie</a><span>+</span>
                    <a href="#" class="header-ressources__btn btn">Note Musicologique</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-artistes">
        <div class="artistes__inner">

          <?
             $args       =   array('post_type'       => 'ressources_publiques',
                                   'posts_per_page'  => -1,
                                   'meta_key'        => 'categorie_rp',
                                   'meta_value'       => 'bio',
                                   'meta_compare'     => '==',
                                   'orderby'         => 'title',
                                   'order'            => 'ASC',);
             $the_query  = new WP_Query($args);
          ?>
          <? if ( $the_query->have_posts() ) { ?>

            <h2 class="artistes__title">// Les Biographies //</h2>

            <div class="artistes__dep">
                <h2 class="artistes__dep__title">
                    Artistes <span>de A à Z</span>
                </h2>
                <ul class="artistes__dep__cities">
                    <? while (  $the_query->have_posts()) { $the_query->the_post(); ?>
                        <a class="artistes__dep__city artistes__dep__city--line" href="<?php echo site_url('angelique-kidjo') ?>">
                            <li> <div class="artistes__dep__city__inner"><? the_title(); ?></div></li>
                        </a>
                    <? };?>
                  </ul>
              </div>
          <? }; ?>

          <?
             $args       =   array('post_type'       => 'ressources_publiques',
                                   'posts_per_page'  => -1,
                                   'meta_key'        => 'categorie_rp',
                                   'meta_value'       => 'note',
                                   'meta_compare'     => '==',
                                   'orderby'         => 'title',
                                   'order'            => 'DESC',);
             $the_query  = new WP_Query($args);
          ?>
          <? if ( $the_query->have_posts() ) { ?>

            <h2 class="artistes__title">// Les notes musicologiques //</h2>

            <div class="artistes__dep">
                <h2 class="artistes__dep__title">
                    œuvres
                </h2>
                <ul class="artistes__dep__cities">
                    <? while (  $the_query->have_posts()) { $the_query->the_post(); ?>
                        <a class="artistes__dep__city artistes__dep__city--line" href="<?php echo site_url('angelique-kidjo') ?>">
                            <li> <div class="artistes__dep__city__inner"><? the_title(); ?></div></li>
                        </a>
                    <? };?>
                  </ul>
              </div>
          <? }; ?>

        </div>
    </section>


</div>

<?php get_footer(); ?>
