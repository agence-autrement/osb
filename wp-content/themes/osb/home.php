<?
/*
Template Name: Page d'Accueil
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <section id="landing">
        <div class="top_landing">
            <div class="contenu_grid">
                <?
                $table          = queryAllDate();
                usort($table, "sortByDate");
                $delete_if_less = date("Y-m-d");
                $clear_date     = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
                $sliced         = array_slice($clear_date, 0, 3);

                echo '<ul id="calendrier_top">';

                foreach($sliced as $table_un => $values){
                    setlocale(LC_ALL, "fr_FR.UTF-8");
                    $timestamp          = $values['date_calendrier'];
                    $translate_Day      = strftime ( '%e' , strtotime($timestamp));
                    $translate_Month    = strftime ( '%B' , strtotime($timestamp));
                    if($values['thematiques'] == 'les_essentiels'){
                        $btn_color = "bot_date--yellow";
                    }elseif($values['thematiques'] == 'nouveaux_horizons'){
                        $btn_color = "bot_date--green";
                    }else{
                        $btn_color = "bot_date--blue";
                    };
                    echo '<li class="fiche__item">'; ?>
                    <div class="left_date">
                        <div class="type type--yellow">
                            <?
                                if($values['thematiques'] == 'les_essentiels'){
                                    echo 'Les Essentiels';
                                }elseif($values['thematiques'] == 'nouveaux_horizons'){
                                    echo 'Nouveaux Horizons';
                                }elseif($values['thematiques'] == 'taliesin'){
                                    echo 'Taliesin';
                                };
                            ?>
                        </div>
                        <div class="titre"><? echo $values['titre_calendrier']; ?></div>
                    </div>
                    <div class="right_date">
                        <div class="date_jours">
                            <? if ($translate_Day == '1') {
                                echo $translate_Day;
                                echo "<sup>er</sup>";
                            } else {
                                echo $translate_Day;
                            } ?>
                        </div>
                        <div class="date_mois"><? echo $translate_Month; ?></div>
                        <div class="lieu"><? echo $values['ville_calendrier']; ?></div>
                    </div>
                    <div class="img_hover" style="background-image: url('<? echo $values['image_vignette'] ?>')">
                        <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
                        <a href="<? the_permalink($values['id_calendrier']) ?>#date" target="_blank" class="bot_date <? echo $btn_color; ?>" >Réserver</a>
                    </div>
                    <?
                    echo '</li>';
                };
                echo '</ul>';
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="slideshow_landing">
            <ul class="slider_landing">
                <li class="first">
                    <div class="content_slide">
                        <a href="<? bloginfo('template_url') ?>/library/images/OSB_Brochure1718_BD_96.pdf"" class="download_home">Télécharger la brochure</a>
                        <a href="<? bloginfo('template_url') ?>/library/images/OSB_BULLETIN_ABONNEMENTS.pdf" class="download_home">Télécharger le bulletin d'abonnement</a>
                    </div>
                </li>
                <? displayHomeEventSlide(); ?>
            </ul>
        </div>

    </section>

    <? get_template_part('calendrier_view'); ?>

    <section class="call_to_action">
        <div class="contenu_grid">

            <div id="left_callto">
                <div>Entreprises, soutenez l'Orchestre</div>
                <div>Rejoignez-nous !</div>
                <a class="btn_savoir" href="<?php echo site_url('mecenat-pro') ?>">En savoir +</a>
                <div id="slider_callto">
                    <span class="previous_btn previous_btn--home">left</span>
                    <span class="next_btn next_btn--home">right</span>
                    <div class="slideshow slideshow--home">
                        <ul class="slider">
                            <li><img src="<?php bloginfo("template_url") ?>/library/images/bpo_fondation_entreprise.png" alt=""/></li>
                            <li><img src="<?php bloginfo("template_url") ?>/library/images/sncf_fondation.png" alt=""/></li>
                            <li><img src="<?php bloginfo("template_url") ?>/library/images/caisse_depot.jpg" alt=""/></li>
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
                        Piccolo, ce sont des concerts conçus pour toute la famille, adultes comme enfants à partir de 7
                        ans. Commenté par un musicien ou un comédien, qui donne des clés d’écoute de la musique, le
                        concert se veut un temps de découverte de la musique, d’échange et de convivialité.
                    </div>

                    <div class="extrait_2">
                        Une heure
                        avant le concert, participez à un atelier de pratique instrumentale, pour mettre les sens en
                        éveil et préparer à l’écoute du concert (Réservation auprès de la billetterie, 02 99 275 275)
                    </div>
                    <div class="tarif">
                        Tarif unique : 5 euros
                    </div>
                    <a class="btn" href="<?php echo site_url('jeune-public') ?>">En savoir +</a>
                </div>
            </div>
            <div id="second_article">
                <div class="second_article_thumbnail"></div>
                <div class="second_article_content">
                    <div class="titre_article">+ Les Jacobins</div>
                    <div class="extrait_1">
                        La première pierre du Couvent des Jacobins est posée en 1369, dans ce qui est alors le Faubourg Saint Malo, [...]
                    </div>
                    <div class="extrait_2">
                        Ce n’était pas un rêve. Sa chambre, une vraie chambre humaine, juste un peu trop petite, était
                        là tranquille entre les quatre murs qu’il connaissait bien.
                    </div>
                    <div class="tarif">
                        Tarif unique : 5 euros
                    </div>
                    <a class="btn" href="<?php echo site_url('cote-orga') ?>#jacobin">En savoir +</a>
                </div>
            </div>
        </div>
    </section>



</div>

<?php get_footer(); ?>
