<?
/*
Template Name: Page Cote Orchestre
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
    <section class="section-orch">
        <div class="contenu_grid">

            <div class="orch__inner">
                <div class="orch--left">

                    <div class="orch--left__inner">
                        <h2 class="orch__name">Les musiciens<br> de l'OSB</h2>

                        <a href="#musiciens" class="orch__title">en savoir +</a>

                    </div>
                </div>

                <div class="orch--right">

                    <div class="orch--right__inner">
                        <h2 class="orch__name">Recrutement</h2>

                        <a href="#recrutement" class="orch__title">en savoir +</a>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-orch-bg">
        <div class="contenu_grid">
            <div class="orch-bg__inner">
                <div class="orch-bg__left">
                    <h3 class="orch-bg__title">
                        Les musiciens<br> de l'OSB
                    </h3>
                </div>

                <div class="orch-bg__right">
                    <p class="orch-bg__text">
                        <span class="black_cross"></span>
                        Les musiciens sont de véritables passeurs de musique, engagés dans la transmission d’un
                        patrimoine précieux et universel. Chaque année, que ce soit au travers de concerts, de
                        rencontres, d’ateliers ou de master classes, ils vont à la rencontre de près de 60 000
                        spectateurs, dans toute la Bretagne, des métropoles aux plus petites communes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <?php if (have_rows('partie')){ ?>

      <section class="section-musiciens" id="musiciens">

          <div class="contenu__grid">
              <div class="musiciens__inner">

                  <div class="musiciens__dep musiciens__dep">

                      <? while ( have_rows('partie') ) : the_row(); ?>

                        <h2 class="musiciens__dep__title">
                            <? the_sub_field('titre') ?>
                            <span class="musiciens__dep__title__cross musiciens__dep__title__cross">+</span>
                            <span class="musiciens__dep__title__arrow musiciens__dep__title__arrow">
                              <img src="<?php echo get_template_directory_uri(); ?>/library/images/arrow-rouge.svg" alt="">
                            </span>
                        </h2>

                        <?php if (have_rows('personne')){ ?>

                          <span class="musiciens__dep__separator musiciens__dep__separator"></span>

                          <ul class="musiciens__dep__items musiciens__dep__items">

                            <? while ( have_rows('personne') ) : the_row(); ?>

                              <li class="musiciens__dep__item">
                                  <h3 class="musiciens__dep__item__title">
                                      <? the_sub_field('nom') ?>
                                  </h3>
                              </li>

                            <? endwhile; ?>

                          </ul>

                        <?php }; ?>


                      <? endwhile; ?>

                  </div>

              </div>
          </div>
      </section>

    <?php }; ?>


    <section class="section-orch-sep" id="recrutement">
        <div class="contenu_grid">
            <div class="orch-sep__inner">
                <div class="orch-sep__left">
                    <h3 class="orch-sep__title">
                        L'Orchestre<br>Symphonique<br>de Bretagne<br>recrute
                    </h3>
                </div>

                <div class="orch-sep__right">
                    <p class="orch-sep__text">
                        <span class="black_cross"></span>
                        RETROUVEZ LES OFFRES D’EMPLOI DE<br> L’ORCHESTRE SYMPHONIQUE DE BRETAGNE<br> DANS CETTE RUBRIQUE
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-recru">
        <div class="contenu_grid">
            <div class="recru__inner">

            </div>
        </div>
    </section>


    <section class="section-recru">
        <div class="contenu_grid">
            <div class="recru__inner">

                <p class="recru__title">
                    Violon supersoliste / Konzertmeister

                </p>

                <div class="recru__item">
                    <p class="recru__item__title">
                        Fiche individuelle d'inscription
                    </p>



                    <p class="recru__item__subtitle">
                        L’Orchestre Symphonique de Bretagne recrute sur concours un violon supersoliste.

                    </p>

                    <p class="recru__item__subtitle">
                        Date des épreuves : 27 & 28 octobre 2017 à Rennes, date limite d’inscription : 17 octobre 2017

                    </p>

                    <p class="recru__item__text">
                        Inscription en ligne ou par retour du formulaire papier à l’adresse suivante : Orchestre Symphonique de Bretagne<br>42A rue Saint Melaine
                        35108 <br>Rennes Cedex
                    </p>

                    <p class="recru__item__text">
                        Renseignements : <a href="mailto:raymond@o-s-b.fr">raymond@o-s-b.fr</a>
                    </p>

                    <a id="postule-fr" class="btn recru__btn" href="#form_fr">Je postule</a>
                </div>

                <div class="recru__item">
                    <p class="recru__item__title">
                        Application form
                    </p>



                    <p class="recru__item__subtitle">
                        The Orchestre Symphonique de Bretagne recruits through audition process a konzertmeister.

                    </p>

                    <p class="recru__item__subtitle">
                        Audition will be set on the 27th and 28th of october, 2017 in Rennes. Please return your application form before the 13th of October.

                    </p>

                    <p class="recru__item__text">
                        Apply online or by returning the form downloadable to the following address : Orchestre Symphonique de Bretagne<br>42A rue Saint Melaine
                        35108 <br>Rennes Cedex
                    </p>

                    <p class="recru__item__text">
                        Informations : <a href="mailto:raymond@o-s-b.fr">raymond@o-s-b.fr</a>
                    </p>

                    <a id="postule-uk" class="btn recru__btn" href="#form_uk">Apply</a>
                </div>


                <div class="recru__fr" id="form_fr">
                    <? echo do_shortcode('[contact-form-7 id="671" title="Contact form Recrutement fr"]'); ?>


                    <div class="recru__docs">
                        <div class="contenu_grid">
                            <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017-fiche-inscription-violon-super-solo.pdf" class="recru__doc">Fiche d'inscription violon supersoliste</a>
                            <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017-reglement-concours-violon-super-solo.pdf" class="recru__doc">Règlement concours violon supersoliste</a>
                            <!-- <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017_Programme_concours_violon_super-solo.pdf" class="recru__doc">Programme concours violon supersoliste</a> -->
                            <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/Traits_d-orchestre-Orchestral_excerpts-audition.pdf" class="recru__doc">Traits d'orchestre concours violon supersoliste</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="recru__uk" id="form_uk">
                <? echo do_shortcode('[contact-form-7 id="672" title="Contact form recrutement uk"]'); ?>


                <div class="recru__docs">
                    <div class="contenu_grid">
                        <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017-application-form-konzertmeister.pdf" class="recru__doc">Application Form Konzertmeister</a>
                        <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017_notice-of-audition-konzertmeister.pdf" class="recru__doc">Notice of Audition Konzertmeister</a>
                       <!-- <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/2017_Concertmaster_audition_program.pdf" class="recru__doc">Konzertmeister Audition program</a> -->
                        <a target="_blank" href="http://o-s-b.fr/wp-content/uploads/2017/06/Traits_d-orchestre-Orchestral_excerpts-audition.pdf" class="recru__doc">Orchestral Excerpts</a>
                    </div>
                </div>
            </div>


        </div>
</div>
</section>


</div>

<script>
    jQuery(document).ready(function ($) {


        $('#postule-fr').on('click', function () {
            $('.recru__uk').hide();
            $('.recru__fr').show();

        })

        $('#postule-uk').on('click', function () {
            $('.recru__fr').hide();
            $('.recru__uk').show();

        })
    });



</script>

<?php get_footer(); ?>
