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
                    <option value="chant">Chant</option>
                    <option value="festival">Festival</option>
                </select>

                <select name="thematiques" id="thematiques" class="select_filter" size="4">
                    <option value="">Par Thématique</option>
                    <option value="les_essentiels">Les Essentiels</option>
                    <option value="nouveaux_horizons">Nouveaux Horizons</option>
                    <option value="taliesin">Taliesin</option>
                </select>

                <select name="compositeur" id="compositeur" class="select_filter" size="9">
                    <option value="">Compositeur</option>
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
                    <option value="">Instruments</option>
                    <option value="violon">Violon</option>
                    <option value="piano">Piano</option>
                    <option value="violoncelle">Violoncelle</option>
                    <option value="trompette">Trompette</option>
                    <option value="clarinette">Clarinette</option>
                    <option value="hautbois">Hautbois</option>
                    <option value="bandjo">Bandjo</option>
                    <option value="harpe">Harpe</option>
                </select>

                <select name="artistes_tag" id="artistes_tag" class="select_filter" size="11">
                    <option value="">Artiste</option>
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
                // displayAllDate();
                var_dump(queryAllDate());
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
