<section id="plugin_calendar">
    <div class="contenu_grid calendar">
        <div id="selector">
            <div class="gauche_select">
                <button class="btn_select btn_gauche" value="submit_theme">Thématique</button>
                <button class="btn_select btn_gauche" value="submits_lieu">Par lieu</button>
                <button class="btn_select btn_gauche" value="datepicker">Par date</button>
                <button class="btn_select btn_gauche" value="submit_type">Par type</button>
            </div>
            <div class="droite_select">
                <div class="submits_lieu" style="display: none;">
                    <? getInputByLieu(); ?>
                </div>
                <div class="submit_theme" style="display: none;">
                    <button class="btn_select btn_droite theme" value="les_essentiels">Les Essentiels</button>
                    <button class="btn_select btn_droite theme" value="nouveaux_horizons">Nouveaux Horizons</button>
                    <button class="btn_select btn_droite theme" value="taliesin">Taliesin</button>
                </div>
                <div class="submit_type" style="display: none;">
                    <button class="btn_select btn_droite type_calendar" value="symphonique">Symphonique</button>
                    <button class="btn_select btn_droite type_calendar" value="musiq_de_chambre">Musique de chambre</button>
                    <button class="btn_select btn_droite type_calendar" value="artiste_invite">Artiste invité</button>
                    <button class="btn_select btn_droite type_calendar" value="jeune_public">Jeune public</button>
                </div>
            </div>
            <div class="datepicker">
                <span id="close"></span>
                <div id="datepicker"></div>
                <input type="text" id="date_value" name="date" readonly >
            </div>
        </div>
        <div id="resultAjax">
            <? resultDateDefault(); ?>
        </div>
    </div>
</section>
