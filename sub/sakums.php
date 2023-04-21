<?php

echo '
<!DOCTYPE HTML>
<html>
    <head>
        <title>Reģistrācija kursiem</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="../js/script.js"></script>
    </head>
    <body>
        <p>Reģistrēties studijām</p>
        <br \>
        <form>
            <div id="vards">
                Vārds: <input type="text" placeholder="Vārds" name="vards">
            </div>
            <div id="uzvards">
                Uzvārds: <input type="text" placeholder="Uzvārds" name="uzvards">
            </div>
            <div id="personas_kods">
                Personas kods: <input type="text" name="Pers_kods">
            </div>
            <div id="stud_program">
                <label for="studiju_programma">Studiju programma:</label>
                <select id="studiju_programma" onchange="updateOptions()">
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
                        <option value="sakumsk_skol">Sākumizglītības skolotājs</option>
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
                <select id="CE_P1" disabled>
                    <option value="" selected disabled hidden>Izvēlies studijju programmu</option>
                </select>
                <!--Priekšments--><input type="text" placeholder="Līmenis"><!--līmenis-->
                <br \>
                <select id="CE_P2" disabled>
                    <option value="" selected disabled hidden>Izvēlies studijju programmu</option>
                </select>
                <!--Priekšments--><input type="text" placeholder="Līmenis""><!--līmenis-->
            </div>
            <div id="avg_atzime">
                Vidējā atzīme beidzot vidusskolu: <input type="number" placeholder="Ievadi vidējo atzīmi">
            </div>
            <input type="button" value="Iesniegt">
        </form>
    </body>

    <!-- // Kad lietotājs reģistrējoties izvēlas kādu no studiju programmām, automātiski šis script liek izvēlēties CE priekšmetu, kurā ir iepieciešams ievadīt CE līmeni -->
    <script>
        function updateOptions() {
            var firstDropdown = document.getElementById("studiju_programma");
            var secondDropdown = document.getElementById("CE_P1");
            var thirdDropdown = document.getElementById("CE_P2");
            
            // Clear existing options
            secondDropdown.innerHTML = "";
            thirdDropdown.innerHTML = "";
            
            // Add new options based on first dropdown selection
            if (firstDropdown.value == "IT" || firstDropdown.value == "vied_tech" || firstDropdown.value == "vides_tech") {
                var option1 = document.createElement("option");
                option1.value = "math";
                option1.innerHTML = "Matemātika";
                secondDropdown.appendChild(option1);
                
                var option2 = document.createElement("option");
                option2.value = "lang";
                option2.innerHTML = "Svešvaloda";
                thirdDropdown.appendChild(option2);
            } else if (firstDropdown.value == "baltu_val" || firstDropdown.value == "eu_val" || firstDropdown.value == "new_media") {
                var option1 = document.createElement("option");
                option1.value = "LV";
                option1.innerHTML = "Latviešu valoda";
                secondDropdown.appendChild(option1);
                
                var option2 = document.createElement("option");
                option2.value = "lang";
                option2.innerHTML = "Svešvaloda";
                thirdDropdown.appendChild(option2);
            } else if (firstDropdown.value == "logop" || firstDropdown.value == "soc_darb" || firstDropdown.value == "pirmsk_skol" || firstDropdown.value == "sakumsk_skol" || firstDropdown.value == "skolot") {
                var option1 = document.createElement("option");
                option1.value = "LV";
                option1.innerHTML = "Latviešu valoda";
                secondDropdown.appendChild(option1);
                
                var option2 = document.createElement("option");
                option2.value = "math";
                option2.innerHTML = "Matemātika";
                thirdDropdown.appendChild(option2);
            } else if (firstDropdown.value == "buisness" || firstDropdown.value == "kult_vad" || firstDropdown.value == "tour_vad") {
                var option1 = document.createElement("option");
                option1.value = "LV";
                option1.innerHTML = "Latviešu valoda";
                secondDropdown.appendChild(option1);
                
                var option2 = document.createElement("option");
                option2.value = "math";
                option2.innerHTML = "Matemātika";
                thirdDropdown.appendChild(option2);
            } else {
                var option1 = document.createElement("option");
                option1.innerHTML = "Izvēlies studijju programmu";
                secondDropdown.appendChild(option1);

                var option2 = document.createElement("option");
                option2.innerHTML = "Izvēlies studijju programmu";
                thirdDropdown.appendChild(option2);
            }
        }
        
        /*Pieejamie variable:
        
        lang - svešvaloda;
        math - matemātika;
        LV - Latviešu valoda

        CE_P1 - Priekšmets #1
        CE_P2 - Priekšmets #2
        CE_V1 - Priekšmeta #1 vērtējums
        CE_V2 - Priekšmeta #2 vērtejums
        */


    </script>
</html>'; 
?>