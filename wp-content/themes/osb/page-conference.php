<?
/*
Template Name: Page Conférence / Concert
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">


    <section class="top_page_action">
        <div class="contenu_grid">

            <h1 class="title">
                Conférence<br>
                <span>Concert</span>
            </h1>
            <div class="tag">
                <div class="btn_red"><a href="http://www.leschampslibres.fr/pied-de-page/contact/">L'heure musicale aux champs libres</a></div>
                <div class="btn_savoir_plus"><a href="#more">En savoir +</a></div>
            </div>
            <div class="intro_text">
                Cette saison, les Champs Libres accueillent l’Orchestre Symphonique de Bretagne pour une nouvelle session de conférence-concert. Quelques jours avant le concert, chefs, solistes et compositeurs viendront partager avec vous leur passion, leur enthousiasme. Ce moment, permettra d’aborder directement avec les interprètes, l’œuvre qu’ils nous offriront.            </div>
        </div>
    </section>

    <section class="content_right">
        <div class="contenu_grid">
            <div class="left_content">
                <div class="titre_content">
                    <h2>
                        Rhiannon<br>
                        Giddens
                    </h2>
                    <span class="croix_rouge"></span>
                </div>
                <img src="<? bloginfo('template_url') ?>/library/images/giddens_freedom.jpg" alt="">
            </div>
            <div class="right_content">
                <span class="croix_noir"></span>
                <div class="titre_right_text">Entre blues et ballades irlandaises</div>
                <div class="txt_right_content">
                    Ne manquez surtout pas Rhiannon Giddens, artiste incontournable de la saison 2017-2018. C’est à l’invitation de Grant Llewellyn que Rhiannon Giddens, double lauréate des Grammy Awards, viendra en Bretagne interpréter ses chansons, inspirées du gospel, du bluegrass rocailleux des montagnes, du folk américain et de la musique celte. Originaire de Caroline du Nord, Giddens, d’ascendance afro-américaine et irlandaise, s’est tournée vers un répertoire charriant avec lui les histoires douloureuses de l’esclavage, de la guerre civile, de la lutte pour les droits civiques, sans oublier les ballades irlandaises de ses ancêtres. Révélée par les frères Coen dans leur ﬁlm Inside Llewyn Davis, Rhiannon Giddens, qui joue du banjo et du ﬁddle, est surtout une chanteuse à la voix puissante, pleine de virtuosité et de lyrisme.
                </div>
                <div class="qui">
                    <div class="titre_qui">
                        <b>ORCHESTRE SYMPHONIQUE DE BRETAGNE</b>
                    </div>
                    <div class="qui_qui">
                        <ul>
                            <li>// Direction : Déborah Waldman</li>
                            <li>// Chant, Banjo, Fiddle : Rhiannon Giddens</li>
                            <li>// Animation : Arnaud Wassmer</li>
                        </ul>
                    </div>
                </div>
                <div class="inscrire">
                    <div class="ligne_un">
                        <div class="date">Vendredi 22 Septembre</div><span> // </span><div class="heure">12h30</div>
                    </div>
                    <div class="ligne_deux">
                        <div class="ville">Rennes</div><span> // </span><div class="salle">Les Champs Libres</div>
                    </div>
                    <div class="btn_inscription"><a href="<?php echo site_url('spectacles') ?>/celtic-blues/#date">Réserver</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="contenu_grid">
            <div class="btn_contact"><a href="http://www.leschampslibres.fr/pied-de-page/contact/" target="_blank" >Réserver</a></div>
        </div>
    </section>
</div>

<?php get_footer(); ?>