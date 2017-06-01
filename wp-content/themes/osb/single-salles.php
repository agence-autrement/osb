<?php
/*
Salle

*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>


<div id="content">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">



            <div class="adress">

                <div class="adress__inner">
                    <div class="adress--left">

                        <div class="adress--left__inner">
                            <a class="adress__back" href="#"><img src="http://www.icon2s.com/img256/256x256-thin-back-previous35.png" alt=""></a>
                            <h2 class="adress__title"><?php echo get_field('ville_salle')?></h2>
                            <h3 class="adress__name"><?php echo get_field('nom_salle')?></h3>
                            <p class="adress__adress">
                                <?php echo get_field('adresse_salle')?><br>

                                <?php echo get_field('code_postale_salle')?> <span><?php echo get_field('ville_salle')?></span>
                            </p>
                            <a class="adress__tel" href="tel:0299275285">TEL : <?php echo get_field('telephone_salle')?></a>

                            <?php if (get_field('lien_billeterie_salle')) :?>
                            <div class="adress__links">
                                <a target="_blank" href="<?php echo get_field('lien_site_internet_salle')?>" class="adress__btn btn">Site Internet</a>
                                <a target="_blank" href="<?php echo get_field('lien_billeterie_salle')?>" class="adress__btn btn">Billeterie</a>
                            </div>

                                <?php else :?>

                                <div class="adress__links">
                                    <a target="_blank" href="<?php echo get_field('lien_site_internet_salle')?>" class="adress__btn adress__btn--only btn">Site Internet</a>
                                </div>




                            <?php endif; ?>

                        </div>
                    </div>


                </div>

            </div>


            <?php
            $bgAdress = get_field('fond_map_salle');
            ?>

            <div class="map" style="background-image: url('<?php echo $bgAdress['url']; ?>');">

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
