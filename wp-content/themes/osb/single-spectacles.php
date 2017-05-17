<?php
/*
Event template

*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>


<div class="main">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

            <?php

            // check if the repeater field has rows of data
            if (have_rows('slides')):

                // loop through the rows of data
                while (have_rows('slides')) : the_row();

                    $imgID = get_sub_field('image');
                    ?>

                    <header class="article__header">
                        <div class="header__bg"
                             style="height:100vh; background-image: url('<?php echo $imgID['url']; ?>');"></div>


                        <? get_template_part('event-menu'); ?>

                    </header>

                    <?php


                endwhile;

            else :

                // no rows found

            endif;


            ?>


            <section class="entry-content cf">

                <section class="section-event-desc">
                    <div class="container">
                        <div class="row">

                            <div class="event-desc__inner">
                                <div class="col-sm-4">


                                    <?php
                                    $imgDesc = get_field('photo_description');
                                    ?>

                                    <div class="event-desc__image"
                                         style="background-image: url('<?php echo $imgDesc['url']; ?>');">
                                        <img class="event-desc__image__play"
                                             src="<?php echo get_template_directory_uri(); ?>/library/images/spotify_play.png"
                                             alt="spotify-play">
                                    </div>

                                    <div class="event-desc__spotify">
                                        <?php the_field('spotify') ?>
                                        <img class="event-desc__spotify__close"
                                             src="<?php echo get_template_directory_uri(); ?>/library/images/spotify_close.png"
                                             alt="spotify-stop">


                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="event-desc__content">
                                        <h1 class="event-desc__content__title"><?php echo get_the_title(); ?></h1>
                                        <p class="event-desc__content__text"><?php echo get_the_content(); ?></p>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="section-event-partners">
                    <div class="container">
                        <div class="row">
                            <div class="event-partners__inner">
                                <div class="col-sm-6 vcenter">


                                    <div class="event-partners__item">
                                        <?php
                                        $imgPart = get_field('logo_partenaire');
                                        ?>
                                        <img class="event-partners__item__img vcenter"
                                             src="<?php echo $imgPart['url']; ?>"
                                             alt="">
                                        <p class="event-partners__item__text vcenter">
                                            En partenariat avec<br>
                                            <?php

                                            // check if the repeater field has rows of data
                                            if (have_rows('partenaires')):

                                                // loop through the rows of data
                                                while (have_rows('partenaires')) : the_row();

                                                    // display a sub field value
                                                    echo get_sub_field('partenaire') . ", ";


                                                endwhile;

                                            else :

                                                // no rows found

                                            endif;


                                            ?>
                                        </p>


                                    </div>
                                </div><!--
                                        -->
                                <div class="col-sm-6 vcenter">
                                    <div class="event-partners__join">
                                        <p class="event-partners__join__text">
                                            Vous aussi, soutenez l'Orchestre<br>
                                            <span>Rejoignez-nous !</span>
                                        </p>
                                        <button class="event-partners__join__btn btn">Devenez mécène</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-event-focus">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="event-focus__title section-event-title">// Focus sur //
                                </p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="event-focus__inner">
                                <div class="col-sm-4">
                                    <?php
                                    $imgFocus = get_field('photo_focus');
                                    ?>

                                    <div class="event-focus__image"
                                         style="background-image: url('<?php echo $imgFocus['url']; ?>');">
                                    </div>


                                </div>
                                <div class="col-sm-8">
                                    <div class="event-focus__content">
                                        <h2 class="event-focus__content__name"><?php echo get_field('titre_focus'); ?> //</h2>
                                        <span class="event-focus__content__instru"> <?php echo get_field('instrument'); ?></span>
                                        <p class="event-focus__content__desc"><?php echo get_field('description_focus'); ?></p>
                                        <a href="<?php echo get_field('en_savoir_plus'); ?>" class="event-focus__content__more">En savoir plus à propos de <?php echo get_field('titre_focus'); ?></a>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-event-program">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="event-program-title section-event-title">
                                    // Programme //
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </section> <!-- end article section -->

            <footer class="article-footer">

            </footer>


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
