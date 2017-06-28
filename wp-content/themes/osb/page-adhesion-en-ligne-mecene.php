<?
/*
Template Name: Page Adhesion en ligne mecene
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">

    <section class="top_page_mecenat">
        <div class="contenu_grid">

            <h1 class="title">Concerto, <br> <span>le cercle des amis<br>de l'OSB</span></h1>


        </div>
    </section>

    <section class="form form--adh">
        <div class="contenu_grid">
            <div class="form__inner">
                <div class="form__title">
                    <h2>
                        // Adhésion en ligne //
                    </h2>
                </div>
                <div class="ami formule--text formule" id="mecene-txt">
                    <div class="encadre">60€ et plus</div>
                    <div class="titre">Mécène</div>
                    <div class="sous_titre_cadre">(100€ et plus en duo)</div>
                    <ul>
                        <li>Les contreparties « Ami », plus : Présentation de saison en avant-première par l’administrateur général</li>
                        <li class="plus">+</li>
                        <li>Accès gratuit aux concerts commentés une fois par an</li>
                        <li class="plus">+</li>
                        <li>… d’autres surprises tout au long de l’année…</li>
                    </ul>


                </div>

                <div id="visuel-mecene">

                    <img src="<? bloginfo('template_url') ?>/library/images/adhesion-mecene.jpg" alt="">

                </div>
            </div>
        </div>
    </section>

    <section class="section-hello">
        <div class="contenu_grid">


            <div class="hello__inner">


                <iframe id="haWidget"
                        src="https://www.helloasso.com/associations/orchestre-symphonique-de-bretagne/adhesions/concerto-le-cercle-des-amis-de-l-osb/widget"
                        style="width:100%;height:2000px;border:none;"></iframe>


            </div>
    </section>


</div>

<?php get_footer(); ?>
