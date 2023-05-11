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
    /*if(AUTORIZEJIES==1){
        $reg_lietotaja_dati=db::query("SELECT DISTINCT Vards, Uzvards, Pers_kods, unique_lietotajs FROM `lietotaji`
        WHERE unique_lietotajs LIKE '".$_SESSION['id']."'");
        foreach($reg_lietotaja_dati as $dati){
            echo `<h1>`.$dati['Vards'].'</h1>';
        }
    };*/
    if(AUTORIZEJIES == 1){
        //echo `<h1>`.$_SESSION['id'].'</h1>';
        if(isset($_POST['studiju_programma']) && isset($_POST['CE_P1']) && isset($_POST['CE_V1']) && isset($_POST['CE_P2']) && isset($_POST['CE_V2']) && isset($_POST['Iesniegt']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2'])){
            $reg_lietotaja_dati=db::query("SELECT DISTINCT Vards, Uzvards, Pers_kods, unique_lietotajs, Vid FROM `lietotaji`
            WHERE unique_lietotajs LIKE '".$_SESSION['id']."'");
            foreach($reg_lietotaja_dati as $dati){
                $lietotajs_Vards = $dati['Vards'];
                $lietotajs_Uzvards = $dati['Uzvards'];
                $lietotajs_Pers_kods = $dati['Pers_kods'];
                $unique_lietotajs = $dati['unique_lietotajs'];
                $lietotajs_Vid = $dati['Vid'];
            }
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

            
            $param=array(
                array('s',$lietotajs_Vards),
                array('s',$lietotajs_Uzvards),
                array('s',$lietotajs_Pers_kods),
                array('s',$unique_lietotajs),
                array('s',$lietotajs_studiju_programma),
                array('s',$lietotajs_CE_P1),
                array('s',$lietotajs_CE_V1),
                array('s',$lietotajs_CE_P2),
                array('s',$lietotajs_CE_V2),
                array('i',$rangs),
                array('i',$lietotajs_Vid)
            );
            

                $ierakstu_skaits=db::query("SELECT COUNT(unique_lietotajs) as 'Reg_skaits' FROM lietotaji
                WHERE unique_lietotajs LIKE '".$unique_lietotajs."'");
                foreach($ierakstu_skaits as $ieraksts){
                    $skaits = $ieraksts['Reg_skaits'];
                }
                //echo "<h1>".$skaits."</h1>";
                if($skaits < 2 && ($lietotajs_CE_P1 != $lietotajs_CE_P2)){
                    db::query("INSERT INTO lietotaji (`Vards`, `Uzvards`, `Pers_kods`, `unique_lietotajs`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES(?,?,?,?,?,?,?,?,?,?,?)",$param);
                    echo '<h1> Veiksmīgi tiki reģistrēts kursam: '.$lietotajs_studiju_programma.'</h1>';
                } else if($skaits > 2) {
                    echo '<h1 style="color: red"> Tu jau esi reģisrējies maksimāli atļautās trīs reizes!</h1>';
                } else if($lietotajs_CE_P1 == $lietotajs_CE_P2) {
                    echo '<h1 style="color: red"> Pārliecinies, vai abi CE priekšmeti ir dažādi!</h1>';
                }
        }
    } else {
        if(isset($_POST['Vards']) && isset($_POST['Uzvards']) && isset($_POST['Pers_kods']) && isset($_POST['studiju_programma']) && isset($_POST['CE_P1']) && isset($_POST['CE_V1']) && isset($_POST['CE_P2']) && isset($_POST['CE_V2']) && isset($_POST['Vid']) && isset($_POST['Iesniegt']) && !empty($_POST['Vards']) && !empty($_POST['Uzvards']) && !empty($_POST['Pers_kods']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2']) && !empty($_POST['Vid'])){
            $lietotajs_Vards = $_POST['Vards'];
            $lietotajs_Uzvards = $_POST['Uzvards'];
            $lietotajs_Pers_kods = $_POST['Pers_kods'];
            $lietotajs_studiju_programma = $_POST['studiju_programma'];
            $lietotajs_CE_P1 = $_POST['CE_P1'];
            $lietotajs_CE_V1 = $_POST['CE_V1'];
            $lietotajs_CE_P2 = $_POST['CE_P2'];
            $lietotajs_CE_V2 = $_POST['CE_V2'];
            $unique_lietotajs = $_POST['Pers_kods'];

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
                array('s',md5('pers_kods'.md5($lietotajs_Pers_kods))),
                array('s',md5('f^89#hJ!'.md5($unique_lietotajs))),
                array('s',$lietotajs_studiju_programma),
                array('s',$lietotajs_CE_P1),
                array('s',$lietotajs_CE_V1),
                array('s',$lietotajs_CE_P2),
                array('s',$lietotajs_CE_V2),
                array('i',$rangs),
                array('i',$lietotajs_Vid)
            );
            
            if(isset($_POST['Pers_kods']) && !empty($_POST['Pers_kods'])){
                $sifrets_lietotajs = md5('f^89#hJ!'.md5($lietotajs_Pers_kods));
                $ierakstu_skaits=db::query("SELECT COUNT(unique_lietotajs) as 'Reg_skaits' FROM lietotaji
                WHERE unique_lietotajs LIKE '".$sifrets_lietotajs."'");
                foreach($ierakstu_skaits as $ieraksts){
                    $skaits = $ieraksts['Reg_skaits'];
                }
                //echo "<h1>".$skaits."</h1>";
                if($skaits < 2 && ($lietotajs_Vid <= 10 || $lietotajs_Vid>0) && ($lietotajs_CE_P1 != $lietotajs_CE_P2)){
                    db::query("INSERT INTO lietotaji (`Vards`, `Uzvards`, `Pers_kods`, `unique_lietotajs`, `Stud_prog`, `CE_P1`, `CE_V1`, `CE_P2`, `CE_V2`, `Rangs`, `Vid`) VALUES(?,?,?,?,?,?,?,?,?,?,?)",$param);
                    echo '<h1> Veiksmīgi tiki reģistrēts kursam: '.$lietotajs_studiju_programma.'</h1>';
                } else if($skaits > 2) {
                    echo '<h1 style="color: red"> Tu jau esi reģisrējies maksimāli atļautās trīs reizes!</h1>';
                } else if($lietotajs_Vid >= 10 || $lietotajs_Vid<1) {
                    echo '<h1 style="color: red"> Nepareizi ievadīta vidējā atzīme!</h1>';
                } else if($lietotajs_CE_P1 == $lietotajs_CE_P2) {
                    echo '<h1 style="color: red"> Pārliecinies, vai abi CE priekšmeti ir dažādi!</h1>';
                }
            }
        }
    }

echo '
<!DOCTYPE HTML>
<html>
   <!-- <style>
    * { 
        outline: 1px solid red;
        outline-offset: -1px;
    }
    </style>-->
    <head>
        <title>Reģistrācija kursiem</title>
        <link rel="stylesheet" type="text/css" href="/css/styles.css">
        <!-- // Kad lietotājs reģistrējoties izvēlas kādu no studiju programmām, automātiski šis script liek izvēlēties CE priekšmetu, kurā ir iepieciešams ievadīt CE līmeni -->
        <script>
        $(document).ready(function() {
            // Saglabā oriģinālās opcijas 2. un 3. dropdown menu
            var originalOptions1 = $(`#CE_P1 option`).clone();
            var originalOptions1 = $(`#CE_P2 option`).clone();
    
            $(`#studiju_programma`).change(function() {
                // Saņem pirmā dropdown menu value
                var selectedValue = $(this).val();
                
                // Noņem visas opcijas no abiem dropdown
                $(`#CE_P1`).empty();
                $(`#CE_P2`).empty();
    
                if (selectedValue == `IT` || selectedValue == `vied_tech` || selectedValue == `vides_tech`) {
                    $(`#CE_P1`).append(originalOptions.filter(`[value="lang"]`));
                    $(`#CE_P2`).append(originalOptions.filter(`[value="math"]`));
                } else if (selectedValue == `baltu_val` || selectedValue == `eu_val` || selectedValue == `new_media`) {
                    $(`#CE_P1`).append(originalOptions.filter(`[value="lang"]`));
                    $(`#CE_P2`).append(originalOptions.filter(`[value="LV"]`));
                } else if (selectedValue == `logop` || selectedValue == `soc_darb` || selectedValue == `pirmsk_skol` || selectedValue == `sakumsk_skol` || || selectedValue == `skolot`) {
                    $(`#CE_P1`).append(originalOptions.filter(`[value="math"]`));
                    $(`#CE_P2`).append(originalOptions.filter(`[value="LV"]`));
                } else if (selectedValue == `buisness` || selectedValue == `kult_vad` || selectedValue == `tour_vad`) {
                    $(`#CE_P1`).append(originalOptions.filter(`[value="math"]`));
                    $(`#CE_P2`).append(originalOptions.filter(`[value="LV"]`));
                }
            });
        });
          
            
            /*Pieejamie variable (priekš PHP un DB):
            
            Vards
            Uzvards
            Pers_kods
            unique_lietotajs
    
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
    
    
        </script>
    </head>
    <body style="background-color:#D6EAF8;">
        <h2 style="text-align: center; "><i>Reģistrēties studijām</i></h2>
        <br \>
        <form action="" method="post" style="text-align: center;">';
        if(AUTORIZEJIES==0){
            echo '
                Vārds: <input type="text" style="text-align: center" placeholder="Vārds" name="Vards">
            <br />
                Uzvārds: <input type="text" style="text-align: center" placeholder="Uzvārds" name="Uzvards">
            <br />
                Personas kods: <input type="text" style="text-align: center" name="Pers_kods" placeholder="Personas kods">
            <br />';
        }
            echo '
                <label for="studiju_programma">Studiju programma:</label>
                <select style="text-align: center" id="studiju_programma" name="studiju_programma" onchange="updateOptions()">
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
                    <select style="text-align: center" id="CE_P1" name="CE_P1">
                        <option value="math">Matemātika</option>
                        <option value="lang">Svešvaloda</option>
                        <option value="LV">Latviešu valoda</option>
                    </select>
                    <!--Priekšments-->
                    <select style="text-align: center" id="CE_V1" name="CE_V1">
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
                    <select style="text-align: center" id="CE_P2" name="CE_P2">
                        <option value="math">Matemātika</option>
                        <option value="lang">Svešvaloda</option>
                        <option value="LV">Latviešu valoda</option>
                    </select>
                    <!--Priekšments-->
                    <select style="text-align: center" id="CE_V2" name="CE_V2">
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
            <br />';
            if(AUTORIZEJIES==0){
                echo '
                Vidējā atzīme beidzot vidusskolu: <input type="number" style="text-align: center; width: 144px" placeholder="Ievadi vidējo atzīmi" name="Vid" value="" min="1" max="10">';
            } echo '
            <br />
            <input type="submit" name="Iesniegt" value="Iesniegt">
        </form>
    </body>';
    
        # VAJADZĒS PĀRUNĀT REĢISTRĒŠANĀS SISTĒMU AR VOLKOVU
        # TDL: Sazināties ar Volkovu un sarunāt konsultācijas ar viņu


    /*if(isset($_POST['CE_V1']) && isset($_POST['CE_V2']) && isset($_POST['Iesniegt'])){
        echo '<p>CE_V1: '.$_POST['CE_V1'].'</p>';
        echo '<p>CE_V2: '.$_POST['CE_V2'].'</p>';
    }*/
    /*
    if(isset($_POST['Iesniegt'])){
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

        echo '<p>'.$lietotajs_Vards.', '.$lietotajs_Uzvards.', '.$lietotajs_Pers_kods.', '.$lietotajs_studiju_programma.', '.$lietotajs_CE_P1.', '.$lietotajs_CE_V1.', '.$lietotajs_CE_P2.', '.$lietotajs_CE_V2.', '.$lietotajs_rangs.', '.$lietotajs_Vid.'';
    };*/

    /*
    if(isset($_POST['Vards'],$_POST['Uzvards'],$_POST['Pers_kods'],$_POST['studiju_programma'],$_POST['CE_P1'],$_POST['CE_V1'],$_POST['CE_P2'],$_POST['CE_V2'],$_POST['Vid'],$_POST['Iesniegt']) && !empty($_POST['Vards']) && !empty($_POST['Uzvards']) && !empty($_POST['Pers_kods']) && !empty($_POST['studiju_programma']) && !empty($_POST['CE_P1']) && !empty($_POST['CE_V1']) && !empty($_POST['CE_P2']) && !empty($_POST['CE_V2']) && !empty($_POST['Vid'])){
        echo $lietotajs_Vards, $lietotajs_Uzvards, $lietotajs_Pers_kods, $lietotajs_studiju_programma, $lietotajs_CE_P1, $lietotajs_CE_V1, $lietotajs_CE_P2, $lietotajs_CE_P2, $lietotajs_rangs, $lietotajs_Vid;
    };
    */
    if(isset($_POST["Pers_kods"]) && !empty($_POST["Pers_kods"])){
        /*$sifrets_lietotajs = md5('f^89#hJ!'.md5($lietotajs_Pers_kods));
        $ierakstu_skaits=db::query("SELECT COUNT(Pers_kods) as 'Reg_skaits' FROM lietotaji
        WHERE Pers_kods LIKE '".$sifrets_lietotajs."'");*/
        $sifrets_lietotajs = md5('f^89#hJ!'.md5($lietotajs_Pers_kods));
        $ierakstu_skaits=db::query("SELECT COUNT(unique_lietotajs) as 'Reg_skaits' FROM lietotaji
        WHERE unique_lietotajs LIKE '".$sifrets_lietotajs."'");
        foreach($ierakstu_skaits as $ieraksts){
            $skaits = $ieraksts['Reg_skaits'];
        }
        if($skaits <= 1 && ($lietotajs_CE_P1 != $lietotajs_CE_P2)){
            echo '<br>
            <h2>Tavs unikālais kods ir: '.$sifrets_lietotajs.'<h2>
            <h3>Neaizmirsti šo kodu saglabāt</h3>';
        }
    };
    echo '
</html>'; 
?>