<?
/*
Template Name: Page Saison
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div class="main_saison">

    <div class="filtreSelector">
        <ul>
            <li><button class="first_btn">Par type</button></li>
            <li><button value="symphonique">Symphonique</button></li>
            <li><button value="musiq_de_chambre">MusiQ de chambre</button></li>
            <li><button value="artiste_invite">Artiste invité</button></li>
            <li><button value="jeune_public">Jeune public</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Par lieu</button></li>
            <li><button value="22">Côte d'Armor</button></li>
            <li><button value="29">Finistère</button></li>
            <li><button value="35">Ille-et-Vilaine</button></li>
            <li><button value="56">Morbihan</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Par date</button></li>
            <li><button value="test3">Date#1</button></li>
            <li><button value="test3">Date#2</button></li>
            <li><button value="test3">Date#3</button></li>
            <li><button value="test3">Date#4</button></li>
            <li><button value="test3">Date#5</button></li>
            <li><button value="test3">Date#6</button></li>
            <li><button value="test3">Date#7</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Instruments</button></li>
            <li><button value="violon">Violon</button></li>
            <li><button value="piano">Piano</button></li>
            <li><button value="harpe">Harpe</button></li>
            <li><button value="violoncelle">Violoncelle</button></li>
            <li><button value="guitare">Guitare</button></li>
            <li><button value="triangle">Triangle</button></li>
            <li><button value="xylophone">Xylophone</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Compositeur</button></li>
            <li><button>Mozart</button></li>
            <li><button>Beethoven</button></li>
            <li><button>Gainsbourg</button></li>
            <li><button>Chopin</button></li>
            <li><button>Schubert</button></li>
            <li><button>Vivaldi</button></li>
            <li><button>Tchaikovsky</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Festivals</button></li>
            <li><button>Interceltique</button></li>
            <li><button>Rive Gauche</button></li>
            <li><button>Filets Bleus</button></li>
        </ul>
        <ul>
            <li><button class="first_btn">Tête d'affiche</button></li>
            <li><button>A. Kidjo</button></li>
            <li><button>A. Gastinel</button></li>
            <li><button>D. Pregent</button></li>
        </ul>
    </div>
    <div id="plus_de_tag">+ de critères</div>
    <div id="clear_filters">Clear Filters</div>



    <div class="resultat">
        <?
            $table = querySaison();
            var_dump($table);
        ?>
    </div>
</div>

<?php get_footer(); ?>
