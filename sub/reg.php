<!-- sakums.php == reg.php -->
<?php

    # Tiek izveidots profils !!!!!!!!!!!!! NESTRĀDĀ VĒL !!!!!!!!!!!!
    # NEKAS NO $_POST NESTRĀDĀ
    /*
    if(isset($_POST['CE_V1']) && isset($_POST['CE_V2']) && isset($_POST['Iesniegt'])){
        $rangs = 0;

        $CE_Vertejums1 = $_POST['CE_V1'];
        if($CE_Vertejums1 == 'A'){
            $rangs = $rangs + 6;
        } else if ($CE_Vertejums1 == 'B'){
            $rangs = $rangs + 5;
        }else if ($CE_Vertejums1 == 'C'){
            $rangs = $rangs + 4;
        }else if ($CE_Vertejums1 == 'D'){
            $rangs = $rangs + 3;
        }else if ($CE_Vertejums1 == 'E'){
            $rangs = $rangs + 2;
        }else if ($CE_Vertejums1 == 'F'){
            $rangs = $rangs + 1;
        }

        $CE_Vertejums2 = $_POST['CE_V2'];
        if($CE_Vertejums2 == 'A'){
            $rangs = $rangs + 6;
        } else if ($CE_Vertejums2 == 'B'){
            $rangs = $rangs + 5;
        }else if ($CE_Vertejums2 == 'C'){
            $rangs = $rangs + 4;
        }else if ($CE_Vertejums2 == 'D'){
            $rangs = $rangs + 3;
        }else if ($CE_Vertejums2 == 'E'){
            $rangs = $rangs + 2;
        }else if ($CE_Vertejums2 == 'F'){
            $rangs = $rangs + 1;
        }
    }
    */


    if(isset($_POST['Vards'],$_POST['Uzvards'],$_POST['Pers_kods'],$_POST['studiju_programma'],$_POST['CE_P1'],$_POST['CE_V1'],$_POST['CE_P2'],$_POST['CE_V2'],$_POST['Vid'],$_POST['Iesniegt']) && !empty($_POST['Vards']) && !empty($_POST['Uzvards']) && !empty($_POST['Pers_kods']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2']) && !empty($_POST['Vid'])){
        $lietotajs_Vards = $_POST['Vards'];
        $lietotajs_Uzvards = $_POST['Uzvards'];
        $lietotajs_Pers_kods = $_POST['Pers_kods'];
        $lietotajs_studiju_programma = $_POST['studiju_programma'];
        $lietotajs_CE_P1 = $_POST['CE_P1'];
        $lietotajs_CE_V1 = $_POST['CE_V1'];
        $lietotajs_CE_P2 = $_POST['CE_P2'];
        $lietotajs_CE_V2 = $_POST['CE_V2'];

        $rangs = 0;

        $CE_Vertejums1 = $_POST['CE_V1'];
        if($CE_Vertejums1 == 'A'){
            $rangs = $rangs + 6;
        } else if ($CE_Vertejums1 == 'B'){
            $rangs = $rangs + 5;
        }else if ($CE_Vertejums1 == 'C'){
            $rangs = $rangs + 4;
        }else if ($CE_Vertejums1 == 'D'){
            $rangs = $rangs + 3;
        }else if ($CE_Vertejums1 == 'E'){
            $rangs = $rangs + 2;
        }else if ($CE_Vertejums1 == 'F'){
            $rangs = $rangs + 1;
        };

        $CE_Vertejums2 = $_POST['CE_V2'];
        if($CE_Vertejums2 == 'A'){
            $rangs = $rangs + 6;
        } else if ($CE_Vertejums2 == 'B'){
            $rangs = $rangs + 5;
        }else if ($CE_Vertejums2 == 'C'){
            $rangs = $rangs + 4;
        }else if ($CE_Vertejums2 == 'D'){
            $rangs = $rangs + 3;
        }else if ($CE_Vertejums2 == 'E'){
            $rangs = $rangs + 2;
        }else if ($CE_Vertejums2 == 'F'){
            $rangs = $rangs + 1;
        };

        $lietotajs_rangs = $rangs;
        $lietotajs_Vid = $_POST['Vid'];

        $param=array(
            array('s',$lietotajs_Vards),
            array('s',$lietotajs_Uzvards),
            array('s',md5('f^89#hJ!'.md5($lietotajs_Pers_kods))),
            array('s',$lietotajs_studiju_programma),
            array('s',$lietotajs_CE_P1),
            array('s',$lietotajs_CE_V1),
            array('s',$lietotajs_CE_P2),
            array('s',$lietotajs_CE_V2),
            array('s',$rangs),
            array('s',$lietotajs_Vid)
        );
        
        db::query("INSERT INTO lietotaji (`Vards`, `Uzvards`, `Pers_kods`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES(?,?,?,?,?,?,?,?,?,?)",$param);
    }

echo '
<!DOCTYPE HTML>
<html>
    <head>
        <title>Reģistrācija kursiem</title>
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
    </head>
    <body>
        <p>Reģistrēties studijām</p>
        <br \>
        <form action="" method="post">
                Vārds: <input type="text" placeholder="Vārds" name="Vards">
            <br />
                Uzvārds: <input type="text" placeholder="Uzvārds" name="Uzvards">
            <br />
                Personas kods: <input type="text" name="Pers_kods">
            <br />
                <label for="studiju_programma">Studiju programma:</label>
                <select id="studiju_programma" name="studiju_programma" onchange="updateOptions()">
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
            <br />
                Centralizēto eksāmenu līmenis:
                <br \>
                    <select id="CE_P1" disabled>
                        <option name="CE_P1" value="" selected disabled hidden>Izvēlies studiju programmu</option>
                    </select>
                    <!--Priekšments-->
                    <select id="CE_V1" name="CE_V1">
                        <option value="">Atzīmē CE #1 Līmeni</option>
                        <option value="F">F</option>
                        <option value="E">E</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="B">B</option>
                        <option value="A">A</option>
                    </select>
                    <!--
                    <input type="text" placeholder="Līmenis #1 CE" name="CE_V1">
                    -->
                    <!--līmenis-->
                <br \>
                    <select id="CE_P2" disabled>
                        <option value="" selected disabled hidden>Izvēlies studiju programmu</option>
                    </select>
                    <!--Priekšments-->
                    <select id="CE_V2" name="CE_V2">
                        <option value="" name="">Atzīmē CE #2 Līmeni</option>
                        <option value="F">F</option>
                        <option value="E">E</option>
                        <option value="D">D</option>
                        <option value="C">C</option>
                        <option value="B">B</option>
                        <option value="A">A</option>
                    </select>
                    <!--
                    <input type="text" placeholder="Līmenis #2 CE" name="CE_V2">
                    -->
                    <!--līmenis-->
            <br />
                Vidējā atzīme beidzot vidusskolu: <input type="number" placeholder="Ievadi vidējo atzīmi" name="Vid" value="">
            <br />
            <input type="submit" name="Iesniegt" value="Iesniegt">
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

            CE_P1 && CE_P2 variables:
                lang - svešvaloda;
                math - matemātika;
                LV - Latviešu valoda
        
        Vid - vidējā atzīme;
        Iesniegt - pogai;

        */


    </script>';
    
        # VAJADZĒS PĀRUNĀT REĢISTRĒŠANĀS SISTĒMU AR VOLKOVU
        # TDL: Sazināties ar Volkovu un sarunāt konsultācijas ar viņu


    /*if(isset($_POST['CE_V1']) && isset($_POST['CE_V2']) && isset($_POST['Iesniegt'])){
        echo '<p>CE_V1: '.$_POST['CE_V1'].'</p>';
        echo '<p>CE_V2: '.$_POST['CE_V2'].'</p>';
    }*/
    /*
    if(isset($_POST['Vid'], $_POST['Iesniegt'])){
        echo '<p>Vid: '.$_POST['Vid'].'</p>';
    };
    */
    /*
    if(isset($_POST['Vards'],$_POST['Uzvards'],$_POST['Pers_kods'],$_POST['studiju_programma'],$_POST['CE_P1'],$_POST['CE_V1'],$_POST['CE_P2'],$_POST['CE_V2'],$_POST['Vid'],$_POST['Iesniegt']) && !empty($_POST['Vards']) && !empty($_POST['Uzvards']) && !empty($_POST['Pers_kods']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2']) && !empty($_POST['Vid'])){
        echo $lietotajs_Vards, $lietotajs_Uzvards, $lietotajs_Pers_kods, $lietotajs_studiju_programma, $lietotajs_CE_P1, $lietotajs_CE_V1, $lietotajs_CE_P2, $lietotajs_CE_P2, $lietotajs_rangs, $lietotajs_Vid;
    };
    */
    echo '
</html>'; 
?>