<?
/*
Template Name: Page Ressource Presses
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">

    <section class="top_page_disco">
        <div class="contenu_grid">
            <div class="abonne_plus_book">Presse</div>
            <div class="btn_new">Communiqué de presse</div> + <div class="btn_new">Dossier de presse</div>
        </div>
    </section>
<!--
    <section class="section-musiciens" id="equipe">
        <div class="contenu__grid">
            <div class="musiciens__inner">

                <div class="musiciens__dep musiciens__dep--first">
                    <h2 class="musiciens__dep__title">
                        Communiqué de presse

                        <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                        <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                alt=""></span>
                    </h2>
                    <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                </div>
            </div>
        </div>
    </section>
-->

    <section class="section-musiciens" id="equipe">
        <div class="contenu__grid">
            <div class="musiciens__inner">

                <div class="musiciens__dep musiciens__dep--first">
                    <h2 class="musiciens__dep__title">
                        Dossier Presse

                        <span class="musiciens__dep__title__cross musiciens__dep--first__title__cross">+</span>
                        <span class="musiciens__dep__title__arrow musiciens__dep--first__title__arrow"><img
                                src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg"
                                alt=""></span>
                    </h2>
                    <span class="musiciens__dep__separator musiciens__dep--first__separator"></span>
                    <ul class="musiciens__dep__items musiciens__dep--first__items">
                        <li class="musiciens__dep__item">
                            <a href="http://o-s-b.fr/wp-content/uploads/2017/06/Dossier-de-presse-2017-2018-vdef.pdf">
                                <img class="musiciens__dep__item__img"
                                     src="<?php echo get_template_directory_uri(); ?>/library/images/pdf.jpg"
                                     alt="">
                                <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                    Dossier de presse
                                </h3>
                                <h4 class="musiciens__dep__item__fct">
                                    Saison 2015-2016
                                </h4>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="contenu_grid">
            <div class="btn_contact"><a href="###"> Nous Contacter</a></div>
        </div>
    </section>

</div>

<?php get_footer(); ?>