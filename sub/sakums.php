<?php

echo '
    <head>
        <title>Reģistrācija kursiem</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <p>Reģistrēties studijām</p>
        <br \>
        <form>
            <div id="vards">
                Vārds: <input type="text" placeholder="Vārds">
            </div>
            <div id="uzvards">
                Uzvārds: <input type="text" placeholder="Uzvārds">
            </div>
            <div id="pers_kods">
                Personas kods: <input type="text">
            </div>
            <div id="stud_program">
                <label for="studiju_programma">Studiju programma:</label>
                <select id="studiju_programma">
                    <option value="">--Izvēlies studiju programmu--</option>
                    <optgroup label="Dabas un inženierzinātņu fakultāte">
                        <option value="IT">Informācijas tehnoloģijas</option>
                        <option value="vied_tech">Viedās tehnoloģijas</option>
                        <option value="vides_tech">Vides inovāciju tehnoloģijas</option>
                    </optgroup>
                    <optgroup label="Humanitāro un mākslas zinātņu fakultāte">
                        <option value="baltu_val">Baltu filoloģija, kultūra un komunikācija</option>
                        <option value="eu_val">Eiropas valodu un kultūras studijas</option>
                        <option value="new_media">Jauno mediju māksla un dizains</option>
                    </optgroup>
                    <optgroup label="Pedagoģijas un sociālā darba fakultāte">
                        <option value="logop">Logopēdija</option>
                        <option value="soc_darb">Sociālais darbinieks</option>
                        <option value="pirmsk_skol">Pirmsskolas skolotājs</option>
                        <option value="sākumsk_skol">Sākumizglītības skolotājs</option>
                        <option value="skolot">Skolotājs</option>
                    </optgroup>
                    <optgroup label="Vadības un sociālo zinātņu fakultāte">
                        <option value="buisness">Biznesa un organizācijas vadība</option>
                        <option value="kult_vad">Kultūras vadība</option>
                        <option value="tour_vad">Tūrisma un rekreācijas vadība</option>
                    </optgroup>
                </select>
            </div>
            <div id="CE_level">
                Centralizēto eksāmenu līmenis:
                <br \>
                <input type="text" placeholder="Priekšmets"><!--Priekšments--><input type="text" placeholder="Līmenis"><!--līmenis-->
                <br \>
                <input type="text" placeholder="Priekšmets"><!--Priekšments--><input type="text" placeholder="Līmenis"><!--līmenis-->
            </div>
            <div id="avg_atzime">
                Vidējā atzīme beidzot vidusskolu: <input type="number" placeholder="Ievadi vidējo atzīmi">
            </div>
            <input type="button" value="Iesniegt">
        </form>
    </body>'; 
?>