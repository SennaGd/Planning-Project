# Testplan Planning Project

## Inleiding
Het doel van dit testplan is het vaststellen van de teststrategie, de benodigde middelen en de planning van het testen. Dit document dient als richtlijn/gids voor de software developers ook er voor zullen zorgen dat het planning project zich voldoet aan alle gediende eisen. Dit document is opgesteld voor de testers en de opdrachtgevers. 

Dit document betreft de concept versie 1.0 van het testplan voor Planning-Project

## Opdrachtsformulering
Het doel van het testen is valideren dat studenten de lesplanning correct kunnen raadplegen en delen (via link en QR-code), en dat docenten op een geautoriseerde en foutloze wijze lessen kunnen beheren (aanmaken, aanpassen en verwijderen) binnen het Planning-Project. 
De tijdsduur van het testen verschilt over de gegeven functie van de tester, dit kan echter een rol als student of als docent zijn. 
- Testen als student: Circa 10 tot 20 minuten. Er wordt gekeken naar het raadplegen en opslaan van de lesplanning.
- Testen als docent: Circa 20 tot 30 minuten. Vanwege de aanvullende functionaliteiten die meegegeven worden als docent zijnde (zoals het aanmaken, aanpassen en verwijderen van lessen).


## Rapportage
Zodra er wordt getest zullen er twee documenten worden aangemaakt, dit zijn: het testrapport en het testresultaat. Deze documenten dienen als overzicht voor de product-owner, opdrachtgevers en software-developers. 


In het testrapport wordt er beschreven wat er is gebeurd tijdens het testen, waarom dit zo is gebeurt en als dit de gewenste situatie is die volgens de testcases beschreven staan. Door het schrijven van de testrapporten zullen software-ontwikkelaars hierop de software steeds meer verbeteren. En krijgen de productowners/opdrachtgevers hier een goed inzicht wat er is gebeurt tijdens het testen. 

Het testresultaat is een samenvatting van de behaalde en niet-behaalde testcases. Hierin wordt beschreven wat er wel en niet goed ging tijdens het testen. 

Het testrapport wordt door een software-ontwikkelaar bijgehouden tijdens het testen. Hierbij zal hij de acties van de tester beschrijven. Ook voor elk testrapport komt er een identificatie dit is als template: **Dag-Maand-Rapportnummer**.

## Afbakening
Het systeem dat wordt getest is het Planning project in de [Opdrachtsformulering](##Opdrachtsformulering) wordt beschreven wat er wordt getest, dit kopje gaat over wat er wordt getest, hoe er wordt getest. Hierbij is het handig om het document [[testcases]] erbij te houden.

Belangrijke informatie:
1. De tester maakt gebruik van zijn/haar apparaat. Dit is bij voorkeur een laptop maar mag ook een telefoon/tablet zijn, Als de tester een telefoon/tablet gebruikt zullen de tests van de QR-Codes niet getest kunnen worden (TC-06-03/04).
2. De tester krijgt een van drie rollen: Student, Docent, Beheerder

__Student:__
De tester zal de lesplanning kunnen raadplegen op de lesplanning en zich kunnen abboneren op klas(sen) door gebruikt te maken van een directe link of QR-Code.
De student zal ook kunnen filteren en zoeken op klassen,lokalen omschrijvingen.

__Docent:__
De tester zal alle activeiten van de docent kunnen bekijken, aanpassen, aanmaken en verwijderen. Ook zal er worden getest op het aanmaken van klassen die de docent dan weer vervolgens bij activiteiten kan gebruiken.

__Superbeheerder__
De tester zal alle docentenaccounts kunnen bekijken, aanpassen, aanmaken en verwijderen. 
## Taken en Verantwoordelijkheden

## Overzicht producten, kwaliteitseisen en stopcriteria
__Hieronder bevindt zich een samengevatte lijst van de testcases, de tester zal moeten testen op al deze cases.__

Voor de testcases TC-08-01 en TC-08-02 hoeft de tester niet te testen. Dit zijn geen belangrijke eisen en zullen al gerealiseerd worden door de ontwikkelaars.

--- 
TC-01-01 - Dashboard bekijken | Student
De tester wordt gevraagd om het dashboard te openen via de browser. Hiervoor krijgt de student de benodigde informatie:

De link: http://www.madebytiemen.nl/planning 

--- 
TC-01-03 - Realtime update na nieuwe activiteit | Student & Docent
De tester's kijken of er realtime updates worden gegeven naar het dashboard. 
De _testgever_ voegt een nieuwe activiteit toe.
De student kijkt of de activiteit automatisch zich laat zien.

---
TC-02-01 - Filteren op klas | Student
De tester zoekt voor alle activiteiten van twee klassen, dit doet hij met de filter knop.

---
TC-02-02 - Filteren op opleiding, groepen en categorie | Student
De tester 

---
TC-02-03 - Zoeken op bestemming (lokaal) of omschrijving
De tester zoekt voor lessen in een lokaal of omschrijving dat gegeven wordt door de testgever, wanneer de tester dit doet zal hij alle lessen in dat lokaal of omschrijving kunnen raadplegen.

---
TC-03-01 - Inloggen als docent | Docent
De tester krijgt accountgegevens van de testgever. De tester zal zich moeten inloggen zonder enige hulp, de enige informatie dat de tester heeft is dat hij moet inloggen.
Als de tester heeft ingelogd zal hij zich in de beheeromgeving als docent bevinden.

---
TC-03-02 - Inloggen als superbeheerder | Beheerder
De tester krijgt accountgegevens van de testgever. De tester zal zich moeten inloggen zonder enige hulp. 
Als de tester heeft ingelogd zal hij zich in de beheeromgeving als superbeheerder bevinden.

---
TC-03-03 - Mislukte login met onjuiste gegevens | Student / Docent / Superbeheerder
De tester zal moeten proberen om in te loggen zonder accountgegevens. Hierbij zal er een foutmelding moeten komen dat de tester niet kan inloggen.

---
TC-04-01 - Maakt activiteit aan | Docent
De tester is ingelogd als docent en bevind zich in de beheeromgeving. De tester zal een activiteit moeten toevoegen aan het systeem. Hierbij test de tester de verplichte velden, tegen lege informatie. 
Als alles is ingevult voegt de docent een activiteit aan en krijgt dit te zien in de beheeromgeving.

---
TC-04-02 - Past activiteit aan | Docent
De tester is ingelogd als docent, hij krijgt een overzicht met verschillende activiteiten die hij zal moeten aanpassen. 

---
TC-04-03 - Zet activiteit op inactief | Docent
De tester bevindt zich in de beheeromgeving als docent met een overzicht van verschillende activiteiten. Hierbij moet de tester een activiteit op inactief zetten. Daarna gaat de docent naar het dashboard en kijkt of de activiteit op inactief staat.

---
TC-05-01 - Maakt unieke klas aan | Docent
De tester bevindt zich in de beheeromgeving als docent. Hierbij krijgt de tester opdracht dat hij een nieuwe klas moet aanmaken. De tester navigeert zelf naar het menu om een klas toe te voegen en zal de forms testen op lege inputs. 
Als dit successvol gaat komt er een nieuwe klas bij te staan in de database/omgeving.

---
TC-06-01 - Agenda-abbonement | Student
De tester krijgt taak om zich te abonneren op een klas, hierbij maakt de tester gebruik van de kalender-abbenementen knop. De tester doet dit direct via de abboneer knop 
Als dit goed gaat zal de tester de activiteiten van de geselecteerde klassen in de agenda krijgen.

---
TC-06-02 - Agenda koppelen in externe agenda-apps | Student
De tester zal een link moeten krijgen voor de activiteiten van de geselecteerde klas(sen). Hierbij maakt de tester gebruik van de kalenderabbenementen knop en genereerd hij een link die de tester dan in zijn calenderapp zet.

---
TC-06-03 - QR-Code genereren voor agenda-feed | Student
De tester zal een QR-Code moeten genereren die de tester kan delen met andere mensen (studenten). 

TC-06-04 - QR-Code scannen leidt naar abboneren | Student
De tester heeft een QR-Code gegenereed. De tester scanned de QR-Code en zal een .ics bestand kunnen downloaden, vervolgens opent de tester het bestand en zal de lesplanning in de agenda van de tester bevinden.

---
TC-07-01 - Superbeheerder bekijkt docentenaccounts | Superbeheerder
De tester is ingelogd als superbeheerder. Hier zal de tester zich naar het docentenoverzicht gaan en de lijst met alle docentenaccounts te zien krijgen.

---
TC-07-02 - Maakt docentenaccount aan | Superbeheerder
De tester krijgt als opdracht om een docentenaccount aan te maken, de tester test of de docentenaccounts succesvol aangemaakt zijn door zich in te loggen zodra de tester deze heeft aangemaakt.

---
TC-07-03 - Past docentenaccount aan  | Superbeheerder
De tester moet een docentenaccount die hij heeft aangemaakt in *TC-07-02* en probeert de naam en/of wachtwoord aan te passen. Zodra de tester dit heeft uitgevoerd zal de tester uitloggen als superbeheerder en inloggen in het aangepaste docentenaccount. 

---
TC-07-04 - Verwijderd docentenaccount  | Superbeheerder
De tester verwijderd een docentenaccount en probeert daarna in te loggen in het verwijderde account.

---
TC-07-05 - Past eigen account aan | Docent
De tester krijgt opdracht om zijn docentenaccount aan te passen. Hierbij past de tester de gebruikersnaam en/of e-mail aan. Zodra dit gedaan logged de tester eerst uit en probeert daarna in het aangepaste account in te loggen.

---


## Testomgeving
De tester zal zijn eigen laptop, tablet of telefoon kunnen gebruiken bij het testen, idealiter een laptop en telefoon sinds de tester dan ook de QR-Code's kan testen.

De tester zal we webapplicatie kunnen bezoeken via de browser. De link wordt gegeven zodra het testen begint.

## Versiebeheer
Voor elke test wordt er een nieuw document getypt, hier kan natuurlijk wel een template voor worden gebruikt. Maar zal de testgever de informatie: datum, rapportnummer, naam van tester in dit document zetten. Hiermee voorkomen wij dat er kopieen worden gemaakt of dubbele bestanden ingeleverd worden.


