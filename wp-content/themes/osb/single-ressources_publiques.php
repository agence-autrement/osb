<?php
/*
Ressource Publique

*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>


<div id="content">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">


            <section class="rp">

                <div class="rp__inner">

                <div class="rp__top">
                    <div class="rp__top__back">
                          <a class="rp__back" href="#"><img
                                                    src="<?php bloginfo("template_url") ?>/library/images/fleche_rouge.svg" alt=""></a><span>Retour fiche spectacle</span>
                    </div>

                    <a href="<?php echo site_url('ressources-publiques') ?>" class="rp__top__ress__btn btn">Toutes les ressources</a>
                </div>






                    <?php if (get_field('categorie_rp') == 'Biographie') : ?>
                        <button class="rp__cat"><?php echo get_field('categorie_rp') ?></button>
                        <h1 class="rp__title"><?php echo get_the_title() ?></h1>
                        <h2 class="rp__fct"><?php echo get_field('fonction_rp') ?></h2>

                        <div class="rp__content">

                            <?php the_content() ?>
                        </div>

                    <?php else : ?>
                        <button class="rp__cat"><?php echo get_field('categorie_rp') ?></button>
                        <h1 class="rp__title"><?php echo get_the_title() ?></h1>
                        <h2 class="rp__fct">(<?php echo get_field('annee_de_naissance_rp') ?> - <?php echo get_field('annee_de_mort_rp') ?>)</h2>

                        <div class="rp__content">
                            <p class="rp__content__intro">
                                <?php echo get_field('intro_rp') ?>
                            </p>
                            <?php the_content() ?>
                        </div>


                    <?php endif; ?>


                </div>

            </div>





        </article>

    <?php endwhile; ?>

    <?php else : ?>

        <article id="post-not-found" class="hentry cf">
            <header class="article-header">
                <h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
            </header>
            <section class="entry-content">
                <p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
            </section>
            <footer class="article-footer">
                <p><?php _e('This is the error message in the single-custom_type.php template.', 'bonestheme'); ?></p>
            </footer>
        </article>

    <?php endif; ?>

</div>


<?php get_footer(); ?>
