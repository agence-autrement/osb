<?
/*
Template Name: Page Mécénat
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">

    <section class="top_page_action">
        <div class="contenu_grid">
            <div class="title">Concerto, <br> <span>le cercle des amis de l'OSB</span></div>
            <div class="btn_savoir_plus"><a href="#rejoindre">En savoir +</a></div>
            <div class="intro_text">
                Spectateur(trice) de l'Orchestre Symphonique de Bretagne, vous souhaitez apporter votre soutien aux activités de l'OSB et bénéficier d'avantages exclusifs ? Rejoignez Concerto, le Cercle des Amis de l'OSB !
                <span class="black_cross"></span>
            </div>
        </div>
    </section>
    <section class="pourquoi_rejoindre" id="rejoindre">
        <div class="contenu_grid">
            <div class="rejoindre">
                <div class="align">
                    <div class="titre_pourquoi">
                        Pourquoi nous rejoindre ?
                    </div>
                    <div class="txt_pourquoi">
                        Concerto vous propose une relation privilégiée avec l’OSB, et rassemble des membres qui encouragent la démarche citoyenne de l’Orchestre.
                    </div>
                </div>
            </div>
            <div class="rejoindre">
                <div class="align">
                    <div class="titre_pourquoi">
                        À quoi sert votre adhésion ?
                    </div>
                    <div class="txt_pourquoi">
                        L’OSB a besoin de vous pour soutenir deux projets phares de la saison 2017-2018 :<br>
                        <span class="norm">
                            + les activités de la Fabrik, le service dédié à l’éducation artistique et culturelle ;<br>
                            + la résidence artistique d’Anne Gastinel.<br><br>
                        </span>
                        Vous serez informé(e) par nos équipes de l’utilisation des fonds. <br>
                        Par exemple, 500€ récoltés = 1 intervention musicale par 5 musiciens dans une école, un hôpital ou un centre pénitentiaire.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="don">
        <div class="ami formule">
            <div class="encadre">30€</div>
            <div class="titre">Ami</div>
            <ul>
                <li>Invitation aux soirées + (5 fois par an)</li>
                <li class="plus">+</li>
                <li>Une affiche dédicacée par le directeur musical</li>
                <li class="plus">+</li>
                <li>Mention de votre nom dans les remerciements publiés sur notre site web</li>
            </ul>
            <div class="btn_don"><a href="<?php echo site_url('adhesion-en-ligne-ami') ?>">Adhérer</a></div>
            <div class="hover_don formule">
                <div class="encadre">Votre Adhésion comprend</div>
                <ul>
                    <li>Une cotisation de 30€ à concerto</li>
                    <li class="plus">+</li>
                    <li>Un don qui bénéficie de la déductibilité fiscale à hauteur de 66%, selon l'article 200 du code général des Impôts. La réduction fiscale s'élève à 75% si vous êtes imposable à l'impôt de solidarité sur la fortune dans la limite de 50 000€</li>
                </ul>
                <div class="btn_don"><a href="<?php echo site_url('adhesion-en-ligne-ami') ?>">Adhérer</a></div>
            </div>
        </div>
        <div class="ami formule center">
            <div class="encadre">60€ et plus</div>
            <div class="titre">
                <div>Mécène</div>
                <div class="sous_titre_cadre">(100€ et plus en duo)</div>
            </div>
            <ul>
                <li>Les contreparties « Ami », plus : Présentation de saison en avant-première par l’administrateur général</li>
                <li class="plus">+</li>
                <li>Accès gratuit aux concerts commentés une fois par an</li>
                <li class="plus">+</li>
                <li>… d’autres surprises tout au long de l’année…</li>
            </ul>
            <div class="btn_don"><a href="###">Adhérer</a></div>
            <div class="hover_don formule">
                <div class="encadre">Votre Adhésion comprend</div>
                <ul>
                    <li>Une cotisation de 30€ à concerto</li>
                    <li class="plus">+</li>
                    <li>Un don qui bénéficie de la déductibilité fiscale à hauteur de 66%, selon l'article 200 du code général des Impôts. La réduction fiscale s'élève à 75% si vous êtes imposable à l'impôt de solidarité sur la fortune dans la limite de 50 000€</li>
                </ul>
                <div class="btn_don"><a href="###">Adhérer</a></div>
            </div>
        </div>
        <div class="ami formule bg_jaune">
            <div class="titre">Don en ligne</div>
            <ul>
                <li>Fidèles spectateurs de l’Orchestre Symphonique de Bretagne, prenez part à la vie de l’orchestre en le soutenant.</li>

                <li class="enterdon">Entrez le montant de votre don</li>
                <input type="text" id="calcul">
                <li id="span__calc">Calculer</li>

                <li>Votre don apès défiscalisation ne vous coûtera que <b><span id="resCalc"></span>€</b></li>
                <div class="btn_don"><a href="<?php echo site_url('don-en-ligne') ?>">Don en ligne</a></div>

            </ul>


        </div>

    </section>
    <section class="participez_creation">
        <div class="contenu_grid">
            <div class="content_titre">
                <div class="titre_crea">Participez à la création d'une oeuvre <span class="yellow_cross"></span></div>
                <div class="sous_titre_crea">aux côté de l'OSB</div>
            </div>
            <div class="content_text">
                <span class="black_cross"></span>
            L’Orchestre Symphonique de Bretagne participe tous les ans à l’enrichissement du répertoire symphonique, par une politique de commandes de nouvelles oeuvres à de jeunes compositeurs. Au cours de la saison musicale 2017-2018, l’OSB a notamment le plaisir de travailler avec deux compositeurs en résidence, Benoît Menut et Julien Gauthier. Leurs oeuvres Anita et Symphonie Australe seront créées par l’Orchestre en avril 2018 dans le cadre du concert « Les 40èmes Rugissants », dédié à la mer et à l’océanographe Anita Conti. Associez-vous à cette création et devenez mécène de deux nouvelles oeuvres, dont les premières notes seront entendues en exclusivité à Rennes ! Votre soutien permet de faire vivre la création artistique et d’enrichir le répertoire musical.
            </div>
        </div>
    </section>
    <section class="soutenir">
        <div class="contenu_grid">
            <div class="gallerie">
                <div class="thumb">
                    <img src="<? bloginfo('template_url') ?>/library/images/menut.jpg" alt="">
                </div>
                <div class="miniatures">
                    <img src="<? bloginfo('template_url') ?>/library/images/anita_conti.jpg" alt="">
                </div>
            </div>
            <div class="content_text">
                <div>
                    Nous avons besoin de <b>5 000€</b> pour soutenir le financement de la commande de ces deux nouvelles oeuvres (composition, création publique, actions de médiation).
                    En remerciement, vous recevrez des contreparties exclusives !
                </div>
                <div class="btn_soutient"><a href="###">Faire un don</a></div>

                <div class="img_soutient">
                    <a target="_blank" href="https://www.sacem.fr/"><img src="<? bloginfo('template_url') ?>/library/images/sacem_blanc.svg" alt=""></a>
                    <img src="<? bloginfo('template_url') ?>/library/images/copie_prive.svg" alt="">

                </div>
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="contenu_grid">
            <div class="btn_contact"><a href="mailto:Tith@o-s-b.fr">Nous contacter</a></div>
        </div>
    </section>
    <? get_template_part('joinUs'); ?>
</div>

<script>
    /*
     * Calcul don
     */


    var inputTarg = document.getElementById("calcul")
    var btncalc = document.getElementById("span__calc")
    var resCalc = document.getElementById("resCalc")


    btncalc.addEventListener('click', function () {
        var inputCalc = document.getElementById("calcul").value
        var egal = inputCalc * 0.44;
        console.log(egal)
        resCalc.innerHTML = egal;
    })
</script>

<?php get_footer(); ?>
