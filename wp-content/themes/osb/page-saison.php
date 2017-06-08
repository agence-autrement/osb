<?
/*
Template Name: Page Saison
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="main_saison">

    <div class="filtreSelector">

            <form name="search_test" id="search_test">

                <select name="departement" id="departement" class="select_filter" size="5">
                    <option value="">Par lieu</option>
                    <option value="22">Côte d'Armor</option>
                    <option value="29">Finistère</option>
                    <option value="35">Ille-et-Vilaine</option>
                    <option value="56">Morbihan</option>
                </select>

                <select name="type" id="type" class="select_filter" size="6">
                    <option value="">Par Type</option>
                    <option value="symphonique">Symphonique</option>
                    <option value="musiq_de_chambre">Musique de chambre</option>
                    <option value="jeune_public">Jeune Public</option>
                    <option value="Chant">Chant</option>
                    <option value="Festival">Festival</option>
                </select>

                <select name="thematiques" id="thematiques" class="select_filter" size="4">
                    <option value="">Par Thématique</option>
                    <option value="les_essentiels">Les Essentiels</option>
                    <option value="nouveaux_horizons">Nouveaux Horizons</option>
                    <option value="taliesin">Taliesin</option>
                </select>

                <select name="compositeur" id="compositeur" class="select_filter" size="9">
                    <option value="">Compositeur</option>
                    <option value="Mozart">Mozart</option>
                    <option value="Haydn">Haydn</option>
                    <option value="Dvorak">Dvorak</option>
                    <option value="Britten">Britten</option>
                    <option value="Vivaldi">Vivaldi</option>
                    <option value="Glass">Glass</option>
                    <option value="Mendelssohn">Mendelssohn</option>
                    <option value="Bach">Bach"</option>
                </select>

                <select name="instrument" id="instrument" class="select_filter" size="9">
                    <option value="">Instruments</option>
                    <option value="Violon">Violon</option>
                    <option value="Piano">Piano</option>
                    <option value="Violoncelle">Violoncelle</option>
                    <option value="Trompette">Trompette</option>
                    <option value="Clarinette">Clarinette</option>
                    <option value="Hautbois">Hautbois</option>
                    <option value="Bandjo">Bandjo</option>
                    <option value="Harpe">Harpe</option>
                </select>

                <select name="artiste_calendrier" id="artiste_calendrier" class="select_filter" size="11">
                    <option value="">Artiste</option>
                    <option value="anne_gastinel">Anne Gastinel</option>
                    <option value="grant_llewellyn">Grant Llewellyn</option>
                    <option value="angelique_kidjo">Angélique Kidjo</option>
                    <option value="francois_rene_duchable">François-René Duchâble</option>
                    <option value="laurent_korcia">Laurent Korcia</option>
                    <option value="francois_dumont">François Dumont</option>
                    <option value="guillaume_saint_james">Guillaume Saint-James</option>
                    <option value="aurelien_azan_zielinski">Aurélien Azan Zielinski</option>
                    <option value="rhiannon_giddens">Rhiannon Giddens</option>
                    <option value="rudolf_piehlmayer">Rudolf Piehlmayer</option>
                </select>

                <select name="date_calendrier" id="date_calendrier" class="select_filter" size="2">
                    <option value="">Date</option>
                    <option value="date">Date</option>
                </select>

            </form>
    </div>

    <div id="clear_filters">Clear Filters</div>

    <div class="resultat">
        <div class="contenu_grid">
            <?
                displayAllDate();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
