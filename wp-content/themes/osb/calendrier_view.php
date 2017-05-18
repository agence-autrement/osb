<section id="plugin_calendar">
    <div class="contenu_grid calendar">
        <div id="selector">
            <div class="gauche">
                <button class="tte" value="submit_theme">Thématique</button>
                <button class="tte" value="submits_lieu">Par lieu</button>
                <button class="tte" value="datepicker">Par date</button>
                <button class="tte" value="submit_type">Par type</button>
            </div>
            <div class="droite">
                <div class="submits_lieu" style="display: none;">
                    <? getInputByLieu(); ?>
                </div>
                <div class="submit_theme" style="display: none;">
                    <ul>
                        <button>Theme #1</button>
                        <button>Theme #2</button>
                        <button>Theme #3</button>
                        <button>Theme #4</button>
                    </ul>
                </div>
                <div class="submit_type" style="display: none;">
                    <ul>
                        <button>Type #1</button>
                        <button>Type #2</button>
                        <button>Type #3</button>
                        <button>Type #4</button>
                    </ul>
                </div>
            </div>
            <div class="datepicker" style="display: none;">
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
