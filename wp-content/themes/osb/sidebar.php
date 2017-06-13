<!-- SOUS-MENU "MON ESPACE" -->
<div class="sidebar_soutenir sidebar__all">

    <div class="section_espaceosb" id="particulier">
        <div class="espaceosb__inner">
            <p class="espaceosb__title">Particuliers</p>
            <p class="espaceosb__subtitle">Soutenez l'orchestre</p>
            <p class="espaceosb__content">Adhérez au Cercle Concerto et bénéficiez d’une relation privilégiée avec l’OSB tout au long de l’année..</p>
            <a class="btn_savoir" href="<?php echo site_url('mecenat-particulier') ?>">En savoir +</a>
        </div>
    </div>
    <div class="section_espaceosb" id="don">

        <div class="espaceosb__inner">
            <p class="espaceosb__title">Don en ligne</p>
            <p class="espaceosb__subtitle">Soutenez un projet</p>
            <p class="espaceosb__content">Soutenez les projets de l’OSB, notamment l’éducation artistique et culturelle.</p>
            <a class="btn_savoir" href="###">Faire un don</a>
        </div>

    </div>
    <div class="section_espaceosb" id="entreprise">

        <div class="espaceosb__inner">
            <p class="espaceosb__title">Entreprises</p>
            <p class="espaceosb__subtitle">Devenez mécène</p>
            <p class="espaceosb__content">Associez votre nom et votre image à l'Orchestre Symphonique de Bretagne en
                devenant mécène. Vous pouvez également organiser des événements prestigieux dans nos
                infrastructures..</p>
            <a class="btn_savoir" href="###">En savoir +</a>
        </div>

    </div>
</div>

<!-- SOUS-MENU "ACTIONS CULTURELLES" -->

<div class="sidebar_actions_culturelles sidebar__all">
    <div class="sidebar_actions_culturelles__inner">
        <div>
            <ul>
                <li><a href="<?php echo site_url('concerts-scolaires') ?>">Concerts Scolaires</a></li>
                <li><a href="<?php echo site_url('venir-en-groupe') ?>">Venir en Groupe</a></li>
                <li><a href="<?php echo site_url('les-poles') ?>">Les pôles</a></li>
                <li><a href="###">Conférences / Concerts</a></li>
                <li><a href="<?php echo site_url('master-classes') ?>">Masterclasses</a></li>
                <li><a href="<?php echo site_url('accessibilite') ?>">Accessibilité</a></li>
            </ul>
        </div>
    </div>
</div>
</div>

<!-- SOUS-MENU "LA SAISON" -->

<div class="sidebar_saison sidebar__all">
    <a target="_blank" href="<? bloginfo('template_url') ?>/library/images/OSB_Brochure1718_BD_96.pdf"><img class="sidebar_saison__img"
                    src="<?php echo get_template_directory_uri(); ?>/library/images/mockup-brochure.png"
                    alt="mockup-brochure"></a>
    <div class="sidebar_saison__inner">
        <div>
            <ul>
                <li><a href="<?php echo site_url('saison') ?>">Toute la saison</a></li>
                <li><a href="<?php echo site_url('saison') ?>?type=symphonique">Symphonique</a></li>
                <li><a href="<?php echo site_url('jeune-public') ?>">Jeune Public</a></li>
                <li><a href="<?php echo site_url('saison') ?>?type=musiq_de_chambre">Musique de Chambre</a></li>
                <li><a href="###">Artiste Invité</a></li>
                <li><a href="<?php echo site_url('orchestre-invite') ?>">OSB Invité</a></li>
            </ul>
        </div>
    </div>

</div>

<!-- SOUS-MENU "DECOUVRIR" -->

<div class="sidebar_decouvrir sidebar__all">
    <div class="sidebar_decouvrir__inner">
        <div>
            <ul>
                <li><a href="<?php echo site_url('cote-orchestre') ?>">Côté Orchestre</a></li>
                <li><a href="<?php echo site_url('cote-pratique') ?>">Côté Pratique</a></li>
                <li><a href="<?php echo site_url('cote-orga') ?>">Côté Organisation</a></li>
                <li><a href="<?php echo site_url('historique') ?>">Historique</a></li>
            </ul>
        </div>
    </div>

</div>


<!-- SOUS-MENU "RESSOURCES" -->

<div class="sidebar_ressources sidebar__all">
    <div class="sidebar_ressources__inner">
        <div>
            <ul>
                <li><a href="<?php echo site_url('ressources-publiques') ?>">Publiques</a></li>
            </ul>
        </div>
    </div>
</div>


<!-- MENU PRINCIPAL -->
<div class="sidebar_1">
    <div class="content_side">
        <div class="top">
            <a href="<?php echo site_url('abonnement') ?>" id="abonnement">s'abonner</a>
        </div>
        <div class="middle">
            <div id="logo_sidebar"><a href="<? echo get_home_url(); ?>">OSB</a></div>
            <ul id="reseaux_sociaux">
                <li><a target="_blank" href="https://www.facebook.com/orchestresymphoniquebretagne/"><img src="<? bloginfo('template_url') ?>/library/images/fb_h.svg" alt=""></a></li>
                <li><a target="_blank" href="https://www.instagram.com/orchestresymphoniquedebretagne/"><img src="<? bloginfo('template_url') ?>/library/images/instagram_h.svg" alt=""></a></li>
                <li><a target="_blank" href="https://twitter.com/l_osb"><img src="<? bloginfo('template_url') ?>/library/images/tw_h.svg" alt=""></a></li>
            </ul>
        </div>
        <div class="bot">
            <nav id="side_nav">
                <ul>
                    <li id="saison"><a href="###">La saison</a></li>
                    <li id="decouvrir"><a href="###">Découvrir</a></li>
                    <li id="actions_culturelles"><a href="###">Action culturelle</a></li>
                    <li><a target="_blank" href="https://indiv.themisweb.fr/0504/fProduitAutonome.aspx?idstructure=0504 ">Boutique</a></li>
                </ul>
            </nav>
            <a id="bouton_sidebar" href="###">Nous soutenir</a>
            <div class="ressource"><a href="<?php echo site_url('ressources-publiques') ?>">/// ressources ///</a></div>
        </div>
    </div>
</div>