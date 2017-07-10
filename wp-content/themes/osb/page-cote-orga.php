<?
/*
Template Name: Page Cote orga
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
                        <h2 class="orch__name">L'équipe<br> de l'OSB</h2>

                        <a href="#equipe" class="orch__title">en savoir +</a>

                    </div>
                </div>

                <div class="orch--right">

                    <div class="orch--right__inner">
                        <h2 class="orch__name">l'OSB au<br>Couvent<br>des Jacobins</h2>

                        <a href="#jacobin" class="orch__title">en savoir +</a>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php if (have_rows('partie')){ ?>

      <section class="section-musiciens" id="equipe">

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

                                  <img class="musiciens__dep__item__img" src="<? the_sub_field('photo') ?>" alt="">
                                  <h3 class="musiciens__dep__item__title musiciens__dep__item__title--orga">
                                      <? the_sub_field('nom') ?>
                                  </h3>
                                  <h4 class="musiciens__dep__item__fct">
                                      <? the_sub_field('role') ?>
                                  </h4>
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




    <section>

      <div class="musiciens__contact">
        <p class="musiciens__contact__title">Contact Administration</p>
        <div class="musiciens__contact__text"><a href="mailto:contact@o-s-b.fr">contact@o-s-b.fr</a> / <a
                href="tel:0299275285">02 99 275 285</a></div>
      </div>

    </section>

    <section class="section-orga-sep">
        <div class="contenu_grid">
            <div class="orga-sep__inner">
                <h4 class="orga-sep__title">L’ORCHESTRE SYMPHONIQUE DE BRETAGNE<br> AU COUVENT DES JACOBINS</h4>
                <p class="orga-sep__text">
                    AU COUVENT DES JACOBINS À partir de janvier 2018, l’Orchestre Symphonique de Bretagne se produira
                    dans un nouveau lieu au cœur de la ville de Rennes, le Couvent des Jacobins, centre des congrès de
                    Rennes Métropole, afin d’accueillir le public dans un auditorium à l’acoustique idéal, au sein d’un
                    bâtiment historique dont l’aura rayonnera bien au-delà de Rennes, permettant la venue d’artistes
                    prestigieux, de renommée internationale
                </p>
            </div>
        </div>
    </section>

    <section class="section-orga-jac" id="jacobin">
        <div class="contenu__grid">
            <div class="orga-jac__inner">

                <div class="orga-jac__l1">

                    <div class="orga-jac__left">

                        <p class="orga-jac__text">
                            La première pierre du Couvent des Jacobins est posée en 1369, dans ce qui est alors le
                            Faubourg
                            Saint Malo, en présence du Duc de Bretagne. Il devient alors un bâtiment incontournable et
                            un
                            témoin de l’histoire de la ville et de la Bretagne. Placé sous la protection ducale dès le
                            début
                            des travaux, le couvent accueille le 17 novembre 1491 les fiançailles d’Anne de Bretagne à
                            Charles VII, marquant ainsi le premier pas de l’union de la France et de la Bretagne, par un
                            traité qui est resté célèbre. Lieu de pèlerinage important, puis centre d’étude aux XVIème
                            et
                            XVIIème siècles, dont le rayonnement intellectuel dépasse les frontières de la région, le
                            Couvent des Jacobins est, comme de nombreux bâtiments religieux, saisi lors de la Révolution
                            française, et affecté à des missions militaires.
                        </p>

                        <p class="orga-jac__text">
                            Le couvent est inscrit à l’inventaire supplémentaire des Monuments historiques en septembre
                            1986. Il est classé Monument historique en mai 1991. En 2002, il devient propriété de Rennes
                            Métropole. Deux biennales d’art contemporain ont eu lieu après l’achat du site par Rennes
                            Métropole en 2002.
                        </p>


                    </div>

                    <div class="orga-jac__right">

                        <p class="orga-jac__title">Un bâtiment<br> chargé<br> d’histoire
                            <span class="orga-jac__cross"><img
                                    src="<?php echo get_template_directory_uri(); ?>/library/images/croix_jaune.svg"
                                    alt=""></span>
                        </p>

                        <img src="<?php echo get_template_directory_uri(); ?>/library/images/jac-cote-orga.jpg"
                             alt="" class="orga-jac__img">

                    </div>

                </div>


                <div class="orga-jac__l2">

                    <div class="orga-jac__left">

                        <p class="orga-jac__title">L'OSB<br>au Centre des<br>congrès des<br>Jacobins
                            <span class="orga-jac__cross"><img
                                    src="<?php echo get_template_directory_uri(); ?>/library/images/croix_jaune.svg"
                                    alt=""></span>
                        </p>

                        <img src="<?php echo get_template_directory_uri(); ?>/library/images/instr-cote-orga.jpg"
                             alt="" class="orga-jac__img">


                    </div>

                    <div class="orga-jac__right">
                        <p class="orga-jac__text orga-jac__text--intro">
                            Par Hervé Letort, vice-président de Rennes métropole en charge de la Culture, de la
                            Communication et de la Citoyenneté
                        </p>


                        <p class="orga-jac__text">
                            L'accueil de l'Orchestre Symphonique de Bretagne au Centre de congrès des Jacobins constitue
                            pour Rennes Métropole une mission importante et l'une des priorités du cahier des charges de
                            Destination Rennes, société publique locale exploitante. La conception technique et
                            architecturale de l'équipement répond aux exigences liées à l'accueil de l'orchestre qui a
                            été associé à toutes les étapes d'élaboration du projet.
                        </p>

                        <p class="orga-jac__text">
                            Les deux auditoriums de 1000 et 300 places offriront au public rennais et régional un
                            nouveau lieu de diffusion musicale de très grande qualité et des espaces de convivialité,
                            dans un site patrimonial exceptionnel. Je souhaite que cet investissement ambitieux,
                            indispensable au plein épanouissement de notre orchestre, puisse lui permettre de toucher un
                            public élargi et plus nombreux et de recevoir dans les prochaines années de nouvelles
                            équipes artistiques nationales et internationales.
                        </p>


                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
