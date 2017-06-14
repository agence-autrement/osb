<?
/*
Template Name: Mecenat pro
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action"
             style="background-position :center center; background-size: cover; background-image:url('<?php echo get_template_directory_uri(); ?>/library/images/slide-synfonia.jpg');">
        <div class="contenu_grid">
            <? if (have_rows('actions')) { ?>
                <div class="index">

                </div>
            <? }; ?>
            <div class="title">Cercle<br>
                <span>Symphonia</span>
            </div>
            <div class="tag">
                <div class="btn_red"><a href="<? the_sub_field('lien_du_bouton'); ?>">Club d'entreprises de L'OSB</a>
                </div>

<!--                <div class="btn_savoir_plus"><a href="#poles">En savoir +</a></div>-->
            </div>
            <div class="intro_text">
                <p>L’Orchestre Symphonique de Bretagne révèle, dans notre région et au-delà, l’excellence et
                    l’innovation
                    avec audace. Vous représentez une entreprise active qui incarne les valeurs de modernité et
                    d’exigence
                    dans ses métiers ? Rejoignez le Cercle Symphonia qui regroupe un réseau d’entreprises dynamiques et
                    citoyennes qui participent au rayonnement et au développement économique de la Bretagne. A nos
                    côtés,
                    mettez votre entreprise sur le devant de la scène !</p>
            </div>
        </div>
    </section>

    <section class="section-mecenat-quote">
        <div class="mecenat-quote__inner">
            <p class="mecenat-quote__text">« Chaque euro investi dans les arts génère 7 euros dans l’économie locale
                ».</p>
            <p class="mecenat-quote__text--l2">Grant Llewellyn, directeur musical de l’OSB</p>
        </div>
    </section>

    <section class="section-mec-avan">
        <h2 class="mec-avan__title">// Vos avantages //</h2>
        <div class="mec-avan__inner">
            <div class="mec-avan__item">
                <h3 class="mec-avan__item__title">Des opportunités de relations publiques prestigieuse</h3>
                <p class="mec-avan__item__text">
                    NOUS SOMMES À VOTRE ÉCOUTE POUR IMAGINER UN PARTENARIAT SUR-MESURE ET PARTAGER AVEC VOS CLIENTS ET
                    COLLABORATEURS, DES MOMENTS EXCEPTIONNELS EN MUSIQUE :
                </p>

                <p class="mec-avan__item__text mec-avan__item__text--light">
                    concerts privés, découverte des coulisses, rencontre avec le directeur musical…
                </p>
            </div>
            <div class="mec-avan__item center">
                <h3 class="mec-avan__item__title">Une communication ciblée</h3>
                <p class="mec-avan__item__text">
                    TOUT AU LONG DE L’ANNÉE, VALORISEZ VOTRE IMAGE À NOS CÔTÉS ET BÉNÉFICIEZ D’UNE VISIBILITÉ DANS NOS
                    SUPPORTS DE COMMUNICATION :
                </p>

                <p class="mec-avan__item__text mec-avan__item__text--light">
                    brochure de saison (diffusion régionale), site web, programmes de salle (distribués lors des
                    concerts), ﬂyers (diffusion Rennes Métropole)…
                </p>
            </div>
            <div class="mec-avan__item">
                <h3 class="mec-avan__item__title">Un engagement qui apporte du sens au projet de l’OSB</h3>
                <p class="mec-avan__item__text">
                    LE CERCLE SYMPHONIA SOUTIENT LE PROJET CULTUREL DE L’OSB, EN PARTICULIER LES ACTIONS D’ÉDUCATION,
                    LES TOURNÉES ET LA POLITIQUE DISCOGRAPHIQUE.
                </p>

                <p class="mec-avan__item__text mec-avan__item__text--light">
                    Chaque membre du Cercle a la possibilité de choisir un projet spéciﬁque auquel attribuer son don,
                    selon sa stratégie de communication ou sa politique générale.
                </p>
            </div>


        </div>
    </section>

    <section class="section-mec-rec">

        <div class="contenu_grid contenu_grid--o">
            <div class="mec-rec__inner">
                <div class="mec-rec__left">
                    <p class="mec-rec__title">Dolce, un<br> premier<br> engagement<br> à 4 000€
                        <span class="yellow_cross"></span>
                    </p>

                </div>

                <div class="mec-rec__right">
                    <p class="mec-rec__subtitle">
                        <span class="black_cross"></span>
                        EN REMERCIEMENT DE VOTRE SOUTIEN, VOUS ACCÉDEZ AUX PRESTATIONS SUIVANTES :
                    </p>

                    <div class="mec-rec__content">


                        <p class="mec-rec__content__l1">2 abonnements par saison</p>
                        <p class="mec-rec__content__l2">Pour votre entreprise</p>

                        <p class="mec-rec__content__l1">DES SOIRÉES VIP AVEC L’OSB</p>
                        <p class="mec-rec__content__l2">POUR LES MEMBRES DU CERCLE OSB ET LEURS CONVIVES</p>

                        <p class="mec-rec__content__l1">1 PAGE CONSACRÉE À VOTRE ENTREPRISE</p>
                        <p class="mec-rec__content__l2">DANS LA REVUE DES MÉCÈNES DE L’OSB</p>

                        <p class="mec-rec__content__l1">DES BILLETS À PRIX RÉDUITS</p>
                        <p class="mec-rec__content__l2">POUR TOUS VOS COLLABORATEURS</p>

                        <p class="mec-rec__content__l1">1 INVITATION AU DÎNER ANNUEL SYMPHONIA</p>
                        <p class="mec-rec__content__l2">ACCESSIBLE AUX DIRIGEANTS DES ENTREPRISES MEMBRES DU CERCLE, EN
                            PRÉSENCE DE L’ADMINISTRATEUR GÉNÉRAL DE L’OSB</p>

                        <p class="mec-rec__content__l3">
                            L’OSB propose des cotisations qui ressemblent à chacun de ses membres (nous contacter pour
                            connaître les autres niveaux d’adhésion).
                        </p>

                        <a class="mec-rec__content__btn btn" href="mailto:Tith@o-s-b.fr">Nous contacter</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-mec-logo">

        <div class="contenu_grid">
            <p class="mec-logo__title">// Ils sont membres de symphonia //</p>

            <div class="mec-logo__inner">
                Méçène fondateur
                <ul class="mec-logo__items">


                    <li class="mec-logo__item"><a
                            href="http://www.ouest.banquepopulaire.fr/portailinternet/Editorial/VotreBanque/Pages/votrebanque_nousconnaitre_mecenat_culturel.aspx"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/bpo_fondation_entreprise.png"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.engie.com/engagements/solidarite/fondation/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/engie.png"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a
                            href="https://site.arkea-banque-ei.com/nous-decouvrir/qui-sommes-nous"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/arkea.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="https://www.fondation-sncf.org/fr/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/sncf_fondation.png"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a
                            href="http://www.huchet-sa.fr/content/20-votre-concession-bmw-huchet-sas"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/huchet.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.cressardetlegoff.com/#cabinet"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/cressard_le_goff.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.kermarrec.fr/le-groupe/historique/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/kermarrec.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.ere-lgv-bpl.com/lgv-bpl"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/eiffage.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a
                            href="http://www.banquepopulaire.fr/portailinternet/Editorial/VotreBanque/Pages/fondation-entreprise.aspx"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/bpo_fondation_entreprise2.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.net-plus.fr/mecenat/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/net_plus.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href=""><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/entheos_petit.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.fitsa-group.com/philosophie/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/fit.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a
                            href="http://www.stg-logistique.fr/fr/groupe/histoire-valeurs.html"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/stg.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.caissedesdepots.fr/mecenat"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/caisse_depot.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a
                            href="http://www.icade.fr/rse/strategie-gouvernance-rse/politique-engagements-rse"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/icade.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.rse-egis.fr/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/egis.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://corporate.airfrance.com/fr/engagements"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/airfrance.jpg"
                                alt=""></a></li>
                    <li class="mec-logo__item"><a href="http://www.lecoq-gadby.com/"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/coq_gadby.jpg"
                                alt=""></a></li>
                </ul>
            </div>


        </div>

    </section>
    <? get_template_part('joinUs'); ?>
    <section class="section-mec-orga">

        <div class="contenu_grid">
            <div class="mec-orga__inner">

                <p class="mec-orga__title">
                    Organisez vos évènements à l’OSB
                </p>

                <p class="mec-orga__text">
                    Partenaire idéal pour l’organisation de vos événements, l’Orchestre Symphonique de Bretagne dispose
                    d’une équipe à votre écoute pour créer des rendez-vous inoubliables, autour d’une programmation
                    musicale ambitieuse et originale, à travers la Bretagne :
                </p>

                <ul>
                    <li class="mec-orga__items">
                        Accueil personnalisé
                    </li>
                    <li class="mec-orga__items">
                        Organisation de cocktails selon vos souhaits
                    </li>

                    <li class="mec-orga__items">
                        Tariﬁcation préférentielle pour les réservations de groupe et les enregistrem ents (CD, DVD)…

                    </li>

                </ul>

            </div>

            <div class="btn_contact"><a href="mailto:Tith@o-s-b.fr">Nous contacter</a></div>
        </div>
    </section>


</div>
<?php get_footer(); ?>
