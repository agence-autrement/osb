<?php get_header(); ?>
<?php get_sidebar(); ?>


<div id="content">
    <section id="landing">
        <div class="top_landing">
            <div class="contenu_grid">
                <ul id="calendrier_top">
                    <li>
                        <div class="content_date">
                            <div class="left_date">
                                <div class="type">Les essentiels #9</div>
                                <div class="titre">Beethoven le compagnon</div>
                                <div class="artiste">avec Cédric Thibergien</div>
                            </div>
                            <div class="right_date">
                                <div class="date_jours">16</div>
                                <div class="date_mois">Mars</div>
                                <div class="lieu">Rennes</div>
                            </div>
                        </div>
                        <div class="img_hover"></div>
                    </li>
                    <li>
                        <div class="left_date">
                            <div class="type">Les essentiels #9</div>
                            <div class="titre">Beethoven le compagnon</div>
                            <div class="artiste">avec Cédric Thibergien</div>
                        </div>
                        <div class="right_date">
                            <div class="date_jours">16</div>
                            <div class="date_mois">Mars</div>
                            <div class="lieu">Rennes</div>
                        </div>
                        <div class="img_hover"></div>
                    </li>
                    <li>
                        <div class="left_date">
                            <div class="type">Les essentiels #9</div>
                            <div class="titre">Beethoven le compagnon</div>
                            <div class="artiste">avec Cédric Thibergien</div>
                        </div>
                        <div class="right_date">
                            <div class="date_jours">16</div>
                            <div class="date_mois">Mars</div>
                            <div class="lieu">Rennes</div>
                        </div>
                        <div class="img_hover"></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <? get_template_part('calendrier_view'); ?>


    <section class="call_to_action">
        <div class="contenu_grid">
            <div id="left_callto">
               <div>Entreprises, soutenez l'Orchestre</div>
               <div>Rejoignez-nous !</div>
               <a class="btn_savoir" href="###">En savoir +</a>
            </div>

            <!--

            <div id="slider_callto">
                <span class="previous_btn">left</span>
                <span class="next_btn">right</span>
                <div class="slideshow">
                    <ul class="slider">
                        <li><img src="<?php bloginfo("template_url") ?>/library/images/logo_slide.png" alt="" /></li>
                        <li><img src="<?php bloginfo("template_url") ?>/library/images/logo_slide.png" alt="" /></li>
                        <li><img src="<?php bloginfo("template_url") ?>/library/images/logo_slide.png" alt="" /></li>
                        <li><img src="<?php bloginfo("template_url") ?>/library/images/logo_slide.png" alt="" /></li>
                    </ul>
                </div>
            </div>

            -->

        </div>
    </section>
    <section id="articles">
        <div class="contenu_grid">
            <div id="first_article">
                <div class="first_article_thumbnail"></div>
                <div class="first_article_content">
                    <div class="titre">+ Saison Piccolo</div>
                    <div class="extrait_1"></div>
                    <div class="extrait_2"></div>
                    <div class="tarif"></div>
                    <a class="btn_savoir" href="###">En savoir +</a>
                </div>
            </div>
            <div id="second_article">
                <div class="second_article_thumbnail"></div>
                <div class="second_article_content">
                    <div class="titre">+ Le Jacobins</div>
                    <div class="extrait_1"></div>
                    <a class="btn_savoir" href="###">En savoir +</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
