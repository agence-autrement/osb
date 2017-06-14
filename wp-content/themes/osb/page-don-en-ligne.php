<?
/*
Template Name: Page Don en ligne
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">

    <section class="top_page_mecenat">
        <div class="contenu_grid">
            <div class="title">Don en ligne <br> <span>soutnez les projets <br>de l'OSB</span></div>

        </div>
    </section>

    <section class="form form--adh">
        <div class="contenu_grid">
            <div class="form__inner">
                <div class="form__title">

                </div>
                <div class="ami formule">
                    <div class="titre">Coût réel de votre don</div>
                    <ul>
                        <li>Fidèles spectateurs de l’Orchestre Symphonique de Bretagne, prenez part à la vie de l’orchestre en le soutenant.</li>

                        <li class="enterdon">Entrez le montant de votre don</li>
                        <input type="text" id="calcul">
                        <li id="span__calc">Calculer</li>

                        <li>Votre don apès défiscalisation ne vous coûtera que <b><span id="resCalc"></span>€</b></li>
                    </ul>


                </div>

                <div class="form__right">

                </div>
            </div>
        </div>
    </section>

    <section class="section-hello">
        <div class="contenu_grid">


            <div class="hello__inner">


                <iframe id="haWidget" src="https://www.donnerenligne.fr/orchestre-symphonique-de-bretagne/faire-un-don" style="width:100%;height:2000px;border:none;"></iframe>


            </div>
    </section>


</div>

<?php get_footer(); ?>
