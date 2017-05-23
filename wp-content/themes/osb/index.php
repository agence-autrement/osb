<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <section id="landing">
        <div class="top_landing">
            <div class="contenu_grid">
                <?
                $table          = queryPosts();
                usort($table, "sortByDate");
                $delete_if_less = date("Y-m-d");
                $clear_date     = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
                $sliced         = array_slice($clear_date, 0, 3);

                echo '<ul id="calendrier_top">';

                    foreach($sliced as $table_un => $values){
                    setlocale(LC_ALL, "fr_FR");
                    $timestamp          = $values['date_calendrier'];
                    $translate_Day      = strftime ( '%e' , strtotime($timestamp));
                    $translate_Month    = strftime ( '%B' , strtotime($timestamp));

                    echo '<li>'; ?>
                        <div class="left_date">
                            <div class="type"><? echo $values['cat_calendrier']; ?></div>
                            <div class="titre"><? echo $values['titre_calendrier']; ?></div>
                            <div class="artiste"><? echo $values['artiste_calendrier']; ?></div>
                        </div>
                        <div class="right_date">
                            <div class="date_jours">
                               <? if($translate_Day == '1'){ echo $translate_Day; echo "<sup>er</sup>"; }else{ echo $translate_Day; } ?>
                            </div>
                            <div class="date_mois"><? echo $translate_Month; ?></div>
                            <div class="lieu"><? echo $values['ville_calendrier'];?></div>
                        </div>
                        <div class="img_hover" style="background-image: url('<? echo $values['thumbnail_calendrier'] ?>')"></div>
                        <?
                        echo '</li>';
                        };
                    echo '</ul>';
                    wp_reset_postdata();
                    ?>
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
            </div>
        </div>
    </section>





    <section id="articles">
        <div class="contenu_grid">
            <div id="first_article">
                <div class="first_article_thumbnail"></div>
                <div class="first_article_content">
                    <div class="titre_article">+ Saison Piccolo</div>
                    <div class="extrait_1">
                        En se réveillant un matin après des rêves agités, Gregor Samsa se retrouva, dans son lit, métamorphosé en un monstrueux insecte. Il était sur le dos, un dos aussi dur qu’une carapace, et, en relevant un peu la tête, il vit, bombé, brun, cloisonné par des [...]
                    </div>
                    <div class="extrait_2">
                        Ce n’était pas un rêve. Sa chambre, une vraie chambre humaine, juste un peu trop petite, était là tranquille entre les quatre murs qu’il connaissait bien.
                    </div>
                    <div class="tarif">
                        Tarif unique : 5 euros
                    </div>
                    <a class="btn" href="###">En savoir +</a>
                </div>
            </div>
            <div id="second_article">
                <div class="second_article_thumbnail"></div>
                <div class="second_article_content">
                    <div class="titre_article">+ Le Jacobins</div>
                    <div class="extrait_1">
                        En se réveillant un matin après des rêves agités, Gregor Samsa se retrouva, dans son lit, [...]
                    </div>
                    <div class="extrait_2">
                        Ce n’était pas un rêve. Sa chambre, une vraie chambre humaine, juste un peu trop petite, était là tranquille entre les quatre murs qu’il connaissait bien.
                    </div>
                    <div class="tarif">
                        Tarif unique : 5 euros
                    </div>
                    <a class="btn" href="###">En savoir +</a>
                </div>
            </div>
        </div>
    </section>




</div>

<?php get_footer(); ?>
