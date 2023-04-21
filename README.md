Sistēma, kura ļauj elektroniski reģistrēties studijām:
-Ievades lauki
--Vārds
--Uzvārds
--Personas kods
--Studiju programma
--iespēja ievadīt 2 CE līmeņus
---Priekšmets1
---Līmenis1
---Priekšmets2
---Līmenis2
--Vidējā atzīme beidzot vidusskolu


Visi ievades lauki obligāti aizpildāmi. Pie datu nosūtīšanas programma pārbauda vai visi lauki ir aizpildīti.
Ja kāds lauks palicis neaizpildīts, programma izvada atbilstošu kļūdas paziņojumu.
Programma pieļauj vienam cilvēkam reģistrēties 2 studiju programmās (pārbaude pēc personas koda). /// Tiek pārbaudīts ar SQL teikumu
Ja lietotājs mēģina reģistrēties trešai programmai, programma izvada atbilstošu kļūdas paziņojumu. /// Jāpārbauda cik value jau ir konkrētam Personas kodam izmantojot SQL
Pēc veiksmīgas lietotāja reģistrācijas tiek izvadīts paziņojums par veiksmīgu reģistrāciju. /// Jāizvada arī Unique kods (md5 checksum personas kodam), kurā ir kriptēts personas kods nākamjiem soļiem

Programmai jānodrošina iespēja pēc lietotāja reģistrācijas jebkurā brīdī ļaut lietotājam aplūkot aktuālāko informāciju 
par savu reģistrāciju (ar lietotāja autorizāciju vai un unikāla koda ievadi vai kādu citu veidu, kurš nodrošina pietiekamu datu aizsardzību.) // Izmanto iepriekš ģenerētu checksum, lai piekļūtu informācijai

Aplūkojot savus reģistrācijas datus tiek izvadīta šāda informācija:
1) Datums, kurā reģistrējies
2) Studiju programma, kurā reģistrējies
3) Budžeta vietu skaits programmā
4) Pieteikumu skaits programmā
5) Uz tekošo brīdi lietotāja ranga numurs (kurš pēc kārtas uz tekošo brīdi ir lietotājs no visiem kuri reģistrējušies šai programmai.)
5.1.) Rangs veidojas pēc CE un to rezultātiem ar kādiem lietotājs reģistrējies (A-6punkti, B-5punkti utt.)
5.2.) Gadījumā ja diviem vai vairāk lietotājiem ir vienāds punktu skaits, augstāku vietu rangā ieņem tas, kuram augstāka vidējā atzīme beidzot vidusskolu.

---------------------------------------------< Editors notes >------------------------------------------------------------------
1.) Reģistrējoties tabulā jāizvada arī datums, kurā tika reģistrēts lietotājs
2.) Counts atsevišķai studiju programmai
3.) Parasts echo h1 header [Ja ir laika, pievienot funkciju, kas parāda lietotājam, vai tiks budžetā]
4.) Tas pats, kas 2. solī
5.) Reģistrējoties, tiks aprēķināts jau ranga numurs (parasti if-i)
5.2) Jāatrod SQL teikumu, kurā tiek sortots pēc viena main value (vērtējumu) ar pārbaudi, kas sakārto arī pēc vērtējuma, ja rangs ir vienāds ar citiem lietotājiem.


> Reģistratūra (DB)
    ID;
    Datums;
    Vārds;
    Uzvārds;
    MD5(Personas Kods);
    Studiju Programma;
    CE Priekšmets1;
    CE Līmenis1;
    CE Priekšmets2;
    CE Līmenis2;
    Rangs;
    Vidējā

> Plānojums mājas lapai:
Plānojums mājas lapai:

Ieejot saitē vai nu Autorizējas vai nu aizpilda formu. --> Tiek pārbaudīts vai visi lauki ir aizpildīti korekti, ja nē, atgriež atpakaļ ar paziņojumu, ka kaut kas nav aizpildīts -->
Tiek pārbaudīts kura reizi tiek pildīta anketa, vadoties pēc lietotāja šifrētā personas koda -->
Ja viss ir aizpildīts lietotājs tiek pārvietots uz jaunu lapu, kurā tiek izvadīts vienreizējs (tikai, ja pirmo reizi ir aizpildīta anketa) unikāls kods, caur kuru var ielagoties saitē -->
Saitē redzamās sadaļas:
	Rangs, ar dropdown menu, lai varētu apskatīties katra (lieotāja izvēlētās) studiju programmas rangus;
	Reģistrācija (tikai, tad ja nav aizpildīta reģistrācija vairāk kā 3);
	Iziet;