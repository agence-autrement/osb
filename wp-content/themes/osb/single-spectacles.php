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
                             style="height:90vh; background-image: url('<?php echo $imgID['url']; ?>'); background-position: center center; background-size: cover;position:relative">

                            <h1 class="header__title"><?php echo get_the_title(); ?></h1>
                            <div class="header__logo">
                                <?php
                                $imgPart = get_field('logo_partenaire');
                                ?>
                                <a target="_blank" href="<?php echo get_field('liens_partenaire') ?>"><img class="header__logo__img"
                                     src="<?php echo $imgPart['url']; ?>"
                                     alt=""></a>

                            </div>
                        </div>

                        <? get_template_part('event-menu'); ?>

                    </header>

                    <?php


                endwhile;

            else :

                // no rows found

            endif;


            ?>


            <section class="entry-content cf">

                <section class="section-event-desc" id="resume">
                    <div class="contenu_grid">

                        <div class="event-desc__inner">
                            <div class="event-desc--left">


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
                                <div class="legende_photo"><? the_field('legende_photo') ?></div>


                            </div>
                            <div class="event-desc--right">
                                <div class="event-desc__content">
                                    <h1 class="event-desc__content__title"><?php echo get_the_title(); ?></h1>
                                    <p class="event-desc__content__text"><?php echo get_the_content(); ?></p>
                                    <div class="event-desc__instru">
                                        <?php

                                        // check if the repeater field has rows of data
                                        if (have_rows('artistes')):

                                            // loop through the rows of data
                                            while (have_rows('artistes')) : the_row();

                                                ?>

                                                <span
                                                    class="event-desc__instru__inst"><?php echo get_sub_field('instrument'); ?>
                                                    :</span>
                                                <span
                                                    class="event-desc__instru__name"> <?php echo get_sub_field('artiste'); ?>
                                                    //</span>


                                                <?php


                                            endwhile;

                                        else :

                                            // no rows found

                                        endif;


                                        ?>
                                    </div>


                                </div>

                            </div>


                        </div>
                    </div>
                </section>


                <section class="section-event-program" id="programme">
                    <div class="contenu_grid">

                        <p class="event-program__title section-event-title">
                            // Programme //
                        </p>


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
                                    echo "<div class=\"event-program__grid--4\"><h3 class=\"event-program__name\" >" . get_sub_field('nom_artiste') . "</h3><h4 class=\"event-program__subname\" >" . get_sub_field('sous_titre_artiste') . "</h4><a href=" . get_sub_field('en_savoir_plus_artiste') . " \"\" class=\"event-program__more\" >en savoir +</a></div>";


                                elseif ($tprogCount & 1 && $tprogCount > 2):
                                    echo "<div class=\"event-program__grid--4\"><h3 class=\"event-program__name\" >" . get_sub_field('nom_artiste') . "</h3><h4 class=\"event-program__subname\" >" . get_sub_field('sous_titre_artiste') . "</h4><a href=" . get_sub_field('en_savoir_plus_artiste') . " \"\" class=\"event-program__more\" >en savoir +</a></div>";

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


                <section class="section-event-focus" id="focus">
                    <div class="contenu_grid">

                        <p class="event-focus__title section-event-title">// Focus sur //
                        </p>

                        <div class="event-focus__inner">
                            <div class="event-focus--left">
                                <?php
                                $imgFocus = get_field('photo_focus');
                                ?>

                                <div class="event-focus__image"
                                     style="background-image: url('<?php echo $imgFocus['url']; ?>');">
                                </div>

                            </div>
                            <div class="event-focus--right">
                                <div class="event-focus__content">
                                    <h2 class="event-focus__content__name"><?php echo get_field('titre_focus'); ?>
                                        // <span
                                            class="event-focus__content__instru"> <?php echo get_field('instrument'); ?></span>
                                    </h2>

                                    <p class="event-focus__content__desc"><?php echo get_field('description_focus'); ?></p>
                                    <a href="<?php echo get_field('en_savoir_plus'); ?>"
                                       class="event-focus__content__more">En savoir plus à propos
                                        de <?php echo get_field('titre_focus'); ?></a>

                                    <? if(get_field('en_savoir_plus_bis')){ ?>
                                        <a href="<?php echo get_field('en_savoir_plus_bis'); ?>"
                                           class="event-focus__content__more">En savoir plus à propos
                                            de <?php echo get_field('titre_focus'); ?>
                                        </a>
                                    <? } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-event-partners">
                    <div class="contenu_grid">
                        <div class="event-partners__inner">

                            <?php
                            // check if the repeater field has rows of data
                            if (!have_rows('partenaires')):?>
                                <div class="event-partners--center">
                                    <div class="event-partners__join">
                                        <p class="event-partners__join__text">
                                            Vous aussi, soutenez l'Orchestre<br>
                                            <span>Rejoignez-nous !</span>
                                        </p>
                                        <button class="event-partners__join__btn btn"><a href="<?php echo site_url('mecenat-particulier') ?>" target="_blank">Devenez mécène</a</button>

                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="event-partners--left vcenter">


                                    <div class="event-partners__item">
                                        <?php
                                        $imgPart = get_field('logo_partenaire');
                                        ?>
                                        <a target="_blank" href="<?php echo get_field('liens_partenaire') ?>"><img class="event-partners__item__img vcenter"
                                             src="<?php echo $imgPart['url']; ?>"
                                             alt=""></a>
                                        <p class="event-partners__item__text vcenter">
                                            <? the_field('type_partenariat'); ?><br>
                                            <?php

                                            // check if the repeater field has rows of data
                                            if (have_rows('partenaires')):

                                                // loop through the rows of data
                                                while (have_rows('partenaires')) : the_row();

                                                    // display a sub field value
                                                    echo get_sub_field('partenaire') . " ";


                                                endwhile;

                                            else :

                                                // no rows found

                                            endif;


                                            ?>
                                        </p>


                                    </div>
                                </div><!--
                                        -->
                                <div class="event-partners--right vcenter">
                                    <div class="event-partners__join">
                                        <p class="event-partners__join__text">
                                            Vous aussi, soutenez l'Orchestre<br>
                                            <span>Rejoignez-nous !</span>
                                        </p>
                                        <button class="event-partners__join__btn btn"><a href="<?php echo site_url('mecenat-particulier') ?>" target="_blank">Devenez mécène</a></button>

                                    </div>
                                </div>

                            <? endif;


                            ?>


                        </div>
                    </div>
                </section>


                <?php $imgFondDate = get_field('image_de_fond_date');
                ?>


                <section class="section-event-date" id="date"
                         style="background-image: url('<?php echo $imgFondDate['url']; ?>'); background-position: center center; background-size: cover;">

                    <div class="contenu_grid">


                        <p class="event-date__title section-event-title">
                            // Dates / Billetterie //
                        </p>

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

                            setlocale(LC_ALL, 'fr_FR.utf8');

                            $day = "%A";
                            $dayNumber = "%d";
                            $month = "%B";

                            // loop through the rows of data
                            while (have_rows('representations')) : the_row();


                                $unixtimestamp = strtotime(get_sub_field('date'));

                                if (get_sub_field('lien_billeterie')):
                                    echo "<div class=\"event-date__grid--3\"><div class=\"event-date__item\"><div class=\"event-date__item__inner\"><p class=\"event-date__date\" >" . strftime($day, $unixtimestamp) . "<br>" . strftime($dayNumber, $unixtimestamp) . " " . strftime($month, $unixtimestamp) . "<br><span>" . get_sub_field('heure') . "</span></p><h3 class=\"event-date__city\" >" . get_sub_field('ville') . "</h3><h4 class=\"event-date__place\" >" . get_sub_field('lieu') . "</h4><a href=" . get_sub_field('lien_billeterie') . " class=\"event-date__btn btn\" >Réserver</a></div></div></div>";

                                else:

                                    echo "<div class=\"event-date__grid--3\"><div class=\"event-date__item\"><div class=\"event-date__item__inner\"><p class=\"event-date__date\" >" . strftime($day, $unixtimestamp) . "<br>" . strftime($dayNumber, $unixtimestamp) . " " . strftime($month, $unixtimestamp) . "<br><span>" . get_sub_field('heure') . "</span></p><h3 class=\"event-date__city\" >" . get_sub_field('ville') . "</h3><h4 class=\"event-date__place\" >" . get_sub_field('lieu') . "</h4><p class=\"event-date__other\">Réservation à partir du 1er septembre</p></div></div></div>";

                                endif;

                            endwhile;
                        else :
                            // no rows found
                        endif;
                        ?>
                    </div>
                </section>


                <? get_template_part('vous-aimerez') ?>


                <?php if (get_field('video_bonus') && (have_rows('gallerie_bonus'))): ?>


                    <section class="section-event-media">
                        <div class="contenu_grid">


                            <p class="event-media__title section-event-title">
                                // Bonus //
                            </p>


                            <div class="event-media--left">

                                <div class="event-media__item">
                                    <?php echo get_field('video_bonus') ?>
                                </div>
                            </div>
                            <div class="event-media--right">
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
                    </section>
                <?php endif; ?>


                <?php if (get_field('video_bonus') && (!have_rows('gallerie_bonus'))): ?>


                    <section class="section-event-media">
                        <div class="contenu_grid">


                            <p class="event-media__title section-event-title">
                                // Bonus //
                            </p>


                            <div class="event-media--center">

                                <div class="event-media__item">
                                    <?php echo get_field('video_bonus') ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <?php if (!get_field('video_bonus') && (have_rows('gallerie_bonus'))): ?>


                    <section class="section-event-media">
                        <div class="contenu_grid">


                            <p class="event-media__title section-event-title">
                                // Bonus //
                            </p>


                            <div class="event-media--center">
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
                    </section>
                <?php endif; ?>


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
