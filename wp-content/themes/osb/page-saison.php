<?
/*
Template Name: Page Saison
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
    <section class="filtreSelector">
        <div class="contenu_grid">
            <div class="option_filtre">
                <div class="titre_opt">Trier par</div>
                <div class="show_filters">Masquer les filtres</div>
                <div id="clear_filters">Réinitialiser les filtres</div>
            </div>
            <form name="search_test" id="search_test" class="active">
                <div id="datepicker"></div>
                <select name="date_calendrier" id="date_calendrier" class="select_filter" size="9">

                    <option value="" class="first_opt">Date</option>
                    <option value="date" id="">Date</option>
                </select>
                <select name="departement" id="departement" class="select_filter" size="9">
                    <option value="" class="first_opt">Par lieu</option>
                    <option value="22">Côte d'Armor</option>
                    <option value="29">Finistère</option>
                    <option value="35">Ille-et-Vilaine</option>
                    <option value="56">Morbihan</option>
                </select>
                <select name="type" id="type" class="select_filter" size="9">
                    <option value="" class="first_opt">Type de spectacle</option>
                    <option value="symphonique">Symphonique</option>
                    <option value="musiq_de_chambre">Musique de chambre</option>
                    <option value="jeune_public">Jeune Public</option>
                    <option value="chant">Chant</option>
                    <option value="festival">Festival</option>
                </select>
                <select name="thematiques" id="thematiques" class="select_filter" size="9">
                    <option value="" class="first_opt">Thématique</option>
                    <option value="les_essentiels">Les Essentiels</option>
                    <option value="nouveaux_horizons">Nouveaux Horizons</option>
                    <option value="taliesin">Taliesin</option>
                </select>
                <select name="compositeur" id="compositeur" class="select_filter" size="9">
                    <option value="" class="first_opt">Compositeur</option>
                    <option value="mozart">Mozart</option>
                    <option value="haydn">Haydn</option>
                    <option value="dvorak">Dvorak</option>
                    <option value="britten">Britten</option>
                    <option value="vivaldi">Vivaldi</option>
                    <option value="glass">Glass</option>
                    <option value="mendelssohn">Mendelssohn</option>
                    <option value="bach">Bach"</option>
                </select>
                <select name="instruments_tag" id="instruments_tag" class="select_filter" size="9">
                    <option value="" class="first_opt">Instruments</option>
                    <option value="violon">Violon</option>
                    <option value="piano">Piano</option>
                    <option value="violoncelle">Violoncelle</option>
                    <option value="trompette">Trompette</option>
                    <option value="clarinette">Clarinette</option>
                    <option value="hautbois">Hautbois</option>
                    <option value="bandjo">Bandjo</option>
                    <option value="harpe">Harpe</option>
                </select>
                <select name="artistes_tag" id="artistes_tag" class="select_filter" size="9">
                    <option value="" class="first_opt">Artiste</option>
                    <option value="anne_gastinel">Anne Gastinel</option>
                    <option value="grant_llewellyn">Grant Llewellyn</option>
                    <option value="angelique_kidjo">Angélique Kidjo</option>
                    <option value="francois-rene_duchable">François-René Duchâble</option>
                    <option value="laurent_korcia">Laurent Korcia</option>
                    <option value="francois_dumont">François Dumont</option>
                    <option value="guillaume_saint-james">Guillaume Saint-James</option>
                    <option value="aurelien_azan_zielinski">Aurélien Azan Zielinski</option>
                    <option value="rhiannon_giddens">Rhiannon Giddens</option>
                    <option value="rudolf_piehlmayer">Rudolf Piehlmayer</option>
                </select>
            </form>
        </div>
    </section>
    <section class="resultat">
        <div class="contenu_grid">
            <?
            displayAllDate();
            ?>
        </div>
    </section>
</div>


<?php get_footer(); ?>
