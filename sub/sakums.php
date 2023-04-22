<!-- sakums.php == reg.php -->
<?php

# Tiek izveidots profils !!!!!!!!!!!!! NESTRĀDĀ VĒL !!!!!!!!!!!!
if(isset($_POST['Vards'],$_POST['Uzvards'],$_POST['Pers_kods'],$_POST['studiju_programma'],$_POST['CE_P1'],$_POST['CE_V1'],$_POST['CE_P2'],$_POST['CE_V2'],$_POST['Vid'],$_POST['Iesniegt']) && !empty($_POST['Vards']) && !empty($_POST['Uzvards']) && !empty($_POST['Pers_kods']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2']) && !empty($_POST['Vid'])){
    $rangs = 0;
    if($_POST['CE_V1'] == 'A'){
        $rangs = $rangs + 6;
    } else if ($_POST['CE_V1'] == 'B'){
        $rangs = $rangs + 5;
    }else if ($_POST['CE_V1'] == 'C'){
        $rangs = $rangs + 4;
    }else if ($_POST['CE_V1'] == 'D'){
        $rangs = $rangs + 3;
    }else if ($_POST['CE_V1'] == 'E'){
        $rangs = $rangs + 2;
    }else if ($_POST['CE_V1'] == 'F'){
        $rangs = $rangs + 1;
    };

    if($_POST['CE_V2'] == 'A'){
        $rangs = $rangs + 6;
    } else if ($_POST['CE_V2'] == 'B'){
        $rangs = $rangs + 5;
    }else if ($_POST['CE_V2'] == 'C'){
        $rangs = $rangs + 4;
    }else if ($_POST['CE_V2'] == 'D'){
        $rangs = $rangs + 3;
    }else if ($_POST['CE_V2'] == 'E'){
        $rangs = $rangs + 2;
    }else if ($_POST['CE_V2'] == 'F'){
        $rangs = $rangs + 1;
    };

	$param=array(
        array('s',$_POST['Vards']),
        array('s',$_POST['Uzvards']),
		array('s',md5('f^89#hJ!'.md5($_POST['Pers_kods']))),
        array('s',$_POST['studiju_programma']),
        array('s',$_POST['CE_P1']),
        array('s',$_POST['CE_V1']),
        array('s',$_POST['CE_P2']),
        array('s',$_POST['CE_V2']),
        array('s',$rangs),
        array('s',$_POST['Vid'])
	);
	
	db::query("INSERT INTO lietotaji (`Vards`, `Uzvards`, `Pers_kods`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES(?,?,?,?,?,?,?,?,?,?)",$param);
}


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
                Vārds: <input type="text" placeholder="Vārds" name="Vards">
            </div>
            <div id="uzvards">
                Uzvārds: <input type="text" placeholder="Uzvārds" name="Uzvards">
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
                    <!--Priekšments-->
                    <select id="CE_V1>
                        <option value=""></option> <!--Kaut kas nestrādā ar pirmo selection-->
                        <option value="">Atzīmē CE #1 Līmeni</option>
                        <option value="F">F</option>
                        <option value="E">E</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="B">B</option>
                        <option value="A">A</option>
                    </select>
                    <!--līmenis-->
                <br \>
                    <select id="CE_P2" disabled>
                        <option value="" selected disabled hidden>Izvēlies studijju programmu</option>
                    </select>
                    <!--Priekšments-->
                    <select id="CE_V2>
                        <option value=""></option> <!--Kaut kas nestrādā ar pirmo selection-->
                        <option value="">Atzīmē CE #2 Līmeni</option>
                        <option value="F">F</option>
                        <option value="E">E</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="B">B</option>
                        <option value="A">A</option>
                    </select>
                    <!--<input type="text" placeholder="Līmenis #2 CE" name="CE_V2">-->
                    <!--līmenis-->
            </div>
            <div id="avg_atzime">
                Vidējā atzīme beidzot vidusskolu: <input type="number" placeholder="Ievadi vidējo atzīmi" name="Vid">
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
        
        /*Pieejamie variable (priekš PHP un DB):
        
        Vards
        Uzvards
        Pers_kods

            IT
            vied_tech
            vides_tech

            baltu_val
            eu_val
            new_media

            logop
            soc_darb
            pirmsk_skol
            sakumsk_skol
            skolot

            buisness
            kult_vad
            tour_vad

        CE_P1 - Priekšmets #1
        CE_P2 - Priekšmets #2
        CE_V1 - Priekšmeta #1 vērtējums
        CE_V2 - Priekšmeta #2 vērtejums

            lang - svešvaloda;
            math - matemātika;
            LV - Latviešu valoda
        
        Vid - vidējā atzīme;
        Iesniegt - pogai;

        */


    </script>
</html>'; 
?>