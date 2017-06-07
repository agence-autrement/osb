<?
/*
Template Name: Page poles
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="top_page_action"
             style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/masterclasses_slide.jpg"
    ');">
    <div class="contenu_grid">
        <? if (have_rows('actions')) { ?>
            <div class="index">

            </div>
        <? }; ?>
        <div class="title">Les pôles<br>
            <span>artistique</span> & <span>culturels</span>
        </div>
        <div class="tag">
            <div class="btn_red"><a href="<? the_sub_field('lien_du_bouton'); ?>">Trasnmettre son savoir-faire</a></div>

            <div class="btn_savoir_plus"><a href="<? the_field('lien_en_savoir'); ?>">En savoir +</a></div>
        </div>
        <div class="intro_text">
            <p>Pour faire évoluer son projet et répondre au mieux aux attentes des publics aux quatre coins de la
                Bretagne, l’Orchestre souhaite créer un Pôle artistique et culturel dans chaque département breton.
                L’Orchestre Symphonique de Bretagne entend ainsi répondre à cet objectif double de démocratisation
                culturelle et de rayonnement sur la Bretagne en s’associant aux structures locales : collectivités,
                écoles de musique, structures culturelles, autour de projets au long cours. Un Pôle repose sur trois
                notions essentielles, la diffusion de grandes œuvres du répertoire classique au plus près des habitants,
                la pratique collective de la musique et la rencontre avec ceux qui la font.</p>
        </div>
    </div>
    </section>

    <section class="poles poles--first">
        <div class="contenu_grid">
            <div class="poles--first__left">
                <img class="poles--first__img"
                     src="<?php echo get_template_directory_uri(); ?>/library/images/poles_1.png" alt="">


            </div>

            <div class="poles--first__right">
                <h2 class="poles--first__title">
                    COMMUNAUTÉ DE COMMUNES AU PAYS DE LA ROCHE AUX FÉES (35)
                    <span class="croix_noir"></span>
                </h2>
                <p class="poles--first__text">
                    Autour du projet pédagogique du Hang’Art, établissement d’enseignements artistiques, et de son
                    orchestre, le Symphopop, de la saison culturelle de la Communauté de communes, des établissements
                    scolaires de secteur et du réseau des bibliothèques, un partenariat fort se construit depuis 2016
                </p>
                <p class="poles--first__text">
                    Cette première année s’est déroulée au rythme de la création du spectacle musical « Le Léopard et le
                    Chasseur » d’après une fable de Rudyard Kipling avec le comédien Richard Dubelski et un trio de
                    l’Orchestre. De nombreuses classes ont suivi de près ce cheminement jusqu’à sa création en mai 2017
                    à la salle Sévigné de Martigné Ferchaud. Pour cette deuxième saison c’est le Symphopop qui sera au
                    cœur du Pôle et les musiciens de l’OSB accompagneront les jeunes musiciens en herbe jusqu’à ce
                    qu’ils se présentent en première partie du concert de l’OSB dirigé par Aurélien Azan Zielinski à la
                    salle du Gentieg de Janzé, le vendredi 13 avril 2018.
                </p>
            </div>


        </div>
    </section>

    <section class="poles-fiche">

        <div class="contenu_grid">
            <p class="section-event-title">// Voir la fiche spectacle //</p>


            <div class="poles-fiche__item"
                 style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/poles_1.png')">
                <div class="left_date">
                    <div class="type type--blue">Création Jeune Public</div>
                    <div class="titre">Le léopard et<br>le chasseur</div>
                    <a href="http://osb.dev:8888/spectacles/beethoven-le-compagnon/" class="link_calendrier">EN SAVOIR
                        +</a>
                </div>
                <div class="right_date">
                    <div class="date_jours">
                        18
                    </div>
                    <div class="date_mois">nov</div>
                    <div class="lieu">Rennes</div>
                </div>

                <a class="bot_date bot_date--blue"
                   href="https://indiv.themisweb.fr/0504/fListeManifs.aspx?idstructure=0504" target="_blank">
                    Réserver
                </a>

            </div>
        </div>

    </section>

    <section class="poles poles--second">
        <div class="contenu_grid">

            <div class="poles--second__right">
                <h2 class="poles--second__title">
                    DINAN AGGLOMÉRATION (22)
                    <span class="croix_noir"></span>
                </h2>
                <p class="poles--second__text">
                    Après trois années riches de rencontres musicales autour de l’expérience Classe d’O, l’OSB, le
                    Kiosque, Conservatoire à rayonnement Intercommunal, et le service culturel de l’agglomération ont
                    souhaité poursuivre leur jumelage. C’est autour de l’écriture musicale de Benoît Menut, compositeur
                    associé de l’OSB depuis 3 saisons que se poursuit notre compagnonnage. Les élèves du Kiosque et les
                    enseignants vibreront tout au long de l’année au son d’une musique écrite spécialement pour eux par
                    ce jeune compositeur talentueux honoré en 2016 du Grand Prix SACEM de la musique Symphonique. Il
                    sera en résidence sur l’Agglomération pour plusieurs semaines pendant lesquelles il transmettra son
                    goût de la musique et de la composition à trois classes situées dans trois écoles de Dinan
                    Agglomération. De nombreux rendez-vous seront proposés au public dont vous serez informés tout au
                    long de la saison. L’Orchestre se produira également à Léhon le 17 Mai 2018 pour un concert de
                    musique de chambre avec la soliste associée à l’Orchestre Anne Gastinel et un programme dans lequel
                    la musique Benoît Menut aura une place de choix.
                </p>

            </div>

            <div class="poles--second__left">
                <img class="poles--second__img"
                     src="<?php echo get_template_directory_uri(); ?>/library/images/poles_1.png" alt="">


            </div>


        </div>
    </section>


    <section class="poles-fiche">

        <div class="contenu_grid">
            <p class="section-event-title">// Voir la fiche spectacle //</p>


            <div class="poles-fiche__item"
                 style="background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/poles_1.png')">
                <div class="left_date">
                    <div class="type type--blue">Musique de chambre</div>
                    <div class="titre">Carte blanche</div>
                    <div class="artiste">avec Anne Gastinel</div>
                    <a href="http://osb.dev:8888/spectacles/beethoven-le-compagnon/" class="link_calendrier">EN SAVOIR
                        +</a>
                </div>
                <div class="right_date">
                    <div class="date_jours">
                        17
                    </div>
                    <div class="date_mois">Mai</div>
                    <div class="lieu">Léhon</div>
                </div>

                <a class="bot_date bot_date--blue"
                   href="https://indiv.themisweb.fr/0504/fListeManifs.aspx?idstructure=0504" target="_blank">
                    Réserver
                </a>

            </div>
        </div>

    </section>

    <section class="poles-more">
        <p class="poles-more__text">
            D’autres Pôles sont en cours d’élaboration.<br> Pour suivre de près la vie des Pôles et l’avènement de nouvelles
            expériences musicales, suivez-nous..
        </p>
    </section>

</div>
<?php get_footer(); ?>
