<?php
/*
Event template

*/
?>

<?php get_header(); ?>

<?php get_sidebar(); ?>


<div id="content">
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
                                <div class="col-sm-offset-1 col-sm-4">


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
                                <div class="col-sm-6">
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
                                <div class="col-sm-offset-1 col-sm-5 vcenter">


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
                                <div class="col-sm-5 vcenter">
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
                                <div class="col-sm-offset-1 col-sm-4">
                                    <?php
                                    $imgFocus = get_field('photo_focus');
                                    ?>

                                    <div class="event-focus__image"
                                         style="background-image: url('<?php echo $imgFocus['url']; ?>');">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="event-focus__content">
                                        <h2 class="event-focus__content__name"><?php echo get_field('titre_focus'); ?>
                                            //</h2>
                                        <span
                                            class="event-focus__content__instru"> <?php echo get_field('instrument'); ?></span>
                                        <p class="event-focus__content__desc"><?php echo get_field('description_focus'); ?></p>
                                        <a href="<?php echo get_field('en_savoir_plus'); ?>"
                                           class="event-focus__content__more">En savoir plus à propos
                                            de <?php echo get_field('titre_focus'); ?></a>
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
                                <p class="event-program__title section-event-title">
                                    // Programme //
                                </p>
                            </div>
                        </div>

                        <?php

                        // check if the repeater field has rows of data
                        $tprogCount = 0;
                        if (have_rows('programme')):
                            $i = 0;
                            while (have_rows('programme')): the_row();
                                $i++;
                            endwhile;
                            $tprogCount = $i;
                        endif;


                        ?>
                        <?php
                        if (have_rows('programme')):

                            // loop through the rows of data
                            while (have_rows('programme')) : the_row();

                                if ($tprogCount == 1):
                                    echo "<div class=\"event-program__grid--4\"> <h3 class=\"event-program__name\">" . get_sub_field('nom_artiste') . "</h3></div>";


                                elseif ($tprogCount % 2 == 0):
                                    echo "<div class=\"event-program__grid--4\"><div class=\"event-program__item\"><h3 class=\"event-program__name\" >" . get_sub_field('nom_artiste') . "</h3><h4 class=\"event-program__subname\" >" . get_sub_field('sous_titre_artiste') . "</h4><a href=" . get_sub_field('en_savoir_plus_artiste') . " class=\"event-program__more\" >en savoir +</a></div></div>";


                                elseif ($tprogCount & 1 && $tprogCount > 2):
                                    echo "<div class=\"event-program__grid--4\"><h3 class=\"event-program__name\" >" . get_sub_field('nom_artiste') . "</h3><h4 class=\"event-program__subname\" >" . get_sub_field('sous_titre_artiste') . "</h4><a href=" . get_sub_field('en_savoir_plus_artiste') . " class=\"event-program__more\" >en savoir +</a></div>";

                                endif;
                                ?>
                                <?php
                            endwhile;
                        else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                </section>


                <?php $imgFondDate = get_field('image_de_fond_date');
                ?>


                <section class="section-event-date"
                         style="background-image: url('<?php echo $imgFondDate['url']; ?>');">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">

                                <p class="event-date__title section-event-title">
                                    // Dates / Billeterie //
                                </p>
                            </div>
                        </div>

                        <?php

                        // check if the repeater field has rows of data
                        $dateCount = 0;
                        if (have_rows('representations')):
                            $i = 0;
                            while (have_rows('representations')): the_row();
                                $i++;
                            endwhile;
                            $dateCount = $i;
                        endif;


                        ?>
                        <?php
                        if (have_rows('representations')):

                            setlocale(LC_ALL, 'fr_FR');

                            $day = "%A";
                            $dayNumber = "%d";
                            $month = "%B";

                            // loop through the rows of data
                            while (have_rows('representations')) : the_row();


                                $unixtimestamp = strtotime(get_sub_field('date'));
                                echo "<div class=\"event-date__grid--3\"><div class=\"event-date__item\"><div class=\"event-date__item__inner\"><p class=\"event-date__date\" >" . strftime($day, $unixtimestamp) . "<br>" . strftime($dayNumber, $unixtimestamp) . " " . strftime($month, $unixtimestamp) . "<br><span>" . get_sub_field('heure') . "h</span></p><h3 class=\"event-date__city\" >" . get_sub_field('ville') . "</h3><h4 class=\"event-date__place\" >" . get_sub_field('lieu') . "</h4><a href=" . get_sub_field('lien_billeterie') . " class=\"event-date__btn btn\" >Réserver</a></div></div></div>";

                            endwhile;
                        else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                </section>

                <section class="section-event-joinus">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="event-joinus__title">
                                    Rejoignez-nous !
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-2">
                                <a class="event-joinus__btn btn" href="#">
                                    Particulier
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="event-joinus__btn btn" href="#">
                                    Professionnel
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="event-joinus__btn event-joinus__btn--third btn" href="#">
                                    Don en ligne
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <? resultSugg() ?>
                <section class="section-event-media">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">

                                <p class="event-media__title section-event-title">
                                    // Bonus //
                                </p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-offset-1 col-sm-5">
                                <div class="event-media__item">
                                    <?php echo get_field('video_bonus') ?>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <span class="previous_btn previous_btn--bonus">left</span>
                                <span class="next_btn next_btn--bonus">right</span>
                                <div class="slideshow slideshow--bonus">
                                    <ul class="slider slider--bonus">

                                        <?php

                                        // check if the repeater field has rows of data
                                        if (have_rows('gallerie_bonus')):

                                            // loop through the rows of data
                                            while (have_rows('gallerie_bonus')) : the_row();

                                                $imgBonus = get_sub_field('image_bonus');


                                                ?>

                                                <li><img src="<?php echo $imgBonus['sizes']['thumb-395'] ?>" alt="">
                                                </li><?php

                                            endwhile;

                                        else :

                                        endif;

                                        ?>

                                    </ul>
                                </div>
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
