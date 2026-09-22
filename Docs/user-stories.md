Titel:
scenario:
acceptatiecriteria:

# Planning Project User stories
gemaakt door Frank

## Wat zijn user stories?
Een user story is een korte, simpele omschrijving van een functionaliteit. Het zorgt ervoor dat de echte behoeften worden achterhaald. Ten opzichte van een use-case table focust een user story zich op de gebruiker en of hij/zij het doel behaalt, in plaats van dat het systeem technisch in orde is.

- rol: de gebruiker type.
- actie: wat wilt er behaald worden?
- reden: waarom wilt de gebruiker dit behalen?
- acceptatiecriteria: wat de gebruiker nu moet kunnen doen.

## Titel: student opent dashboard
**scenario:**<br>Als student zijnde wil ik een volledig overzicht van alle activiteiten ziel zodat ik weet waar ik hoelaat moet zijn.
## **acceptatiecriteria**:
-	Wanneer de student de omgeving opent moet die gelijk een overzicht krijgen van alle lessen, activiteiten en toetsen te zien.
- 	De activiteiten worden gesorteerd op startdatum/tijd.
-	Het overzicht wordt automatisch geüpdatet wanneer er een verandering en of een nieuwe activiteit wordt toegevoegd.

## Titel: Student filtert activiteiten
**scenario:** <br> Als student wil ik activiteiten kunnen filteren op klas/categorie zodat ik alleen die activiteiten zie die door mij gekozen zijn.
## acceptatiecriteria:
-	de student kan filteren op klas
-	de student kan filteren op opleiding
-	de student kan filteren op groep
-	de student kan filteren categorie (globaal)
-	na het selecteren van een filter ziet de student alleen nog maar de door hen gekozen categorie
-	de student kan het filter ook weer weg halen

## Titel: Student abonneert zich op planning
**scenario:** <br> als student wil ik mij kunnen abonneren op mijn planning, zodat ik mijn activiteiten automatisch in mijn agenda kan bekijken.
## acceptatiecriteria:
-	de student kan abonneren op een categorie die dan in hen uitgekozen agenda-app
-	de informatie die aan de agenda app gegeven wordt is nuttig voor de student.

## Titel: Student gebruikt de planning in agenda
**scenario:** <br> Als student wil ik mijn planning kunnen toevoegen aan mijn eigen agenda, zodat mijn schoolactiviteiten automatisch in mijn agenda verschijnen.
## acceptatiecriteria:
-	de planning kan worden gekoppeld via een agenda app die het .ics formaat accepteert
-	De feed kan worden gebruikt met Apple Calendar.
-	De feed kan worden gebruikt met Outlook.
-	De feed kan worden gebruikt met Google Calendar.
-	Wanneer er een wijziging is in planning wordt dat automatisch gesynchroniseerd.
-	Wanneer er een activiteit wordt toegevoegd wordt dat automatisch gesynchroniseerd.
-	Wanneer er een activiteit wordt verwijderd wordt dat automatisch gesynchroniseerd.

## Titel: Docent voegt activiteit toe
**scenario:** <br> Als docent wil ik een activiteit kunnen toevoegen zodat studenten kunnen zien wat er gepland staat
## acceptatiecriteria:
-	De docent kan een datum invoeren.
-	De docent kan een starttijd invoeren.
-	De docent kan een eindtijd invoeren.
-	De docent kan een omschrijving invoeren.
-	De docent kan een locatie invoeren.
-	De docent kan een doelgroep of klas selecteren.
-	Wanneer alle verplichte gegevens correct zijn ingevuld, kan de activiteit worden opgeslagen
-	De nieuwe activiteit verschijnt vervolgens op het dashboard.

## Titel: docent wijzigt activiteit
**scenario:** <br> Als docent wil ik een bestaande activiteit kunnen wijzigen, zodat de planning actueel blijft
## acceptatiecriteria:
-	De docent kan een bestaande activiteit openen.
-	De docent kan de datum wijzigen.
-	De docent kan de start en eindtijd wijzigen.
-	De docent kan de omschrijving wijzigen.
-	De docent kan de locatie wijzigen.
-	De docent kan de doelgroep of klas wijzigen.
-	Na het opslaan worden de gewijzigde gegevens weergegeven.
-	De wijzigingen worden uiteindelijk ook verwerkt in de planning van studenten.
     Titel: docent verwijderd activiteit
     scenario: Als docent wil ik een activiteit kunnen verwijderen, zodat geannuleerde of fout aangemaakte activiteiten niet meer zichtbaar zijn.
     acceptatiecriteria:
-	De docent kan een activiteit selecteren.
-	De docent kan kiezen om de activiteit te verwijderen.
-	Het systeem vraagt om bevestiging voordat de activiteit wordt verwijderd.
-	Na bevestiging wordt de activiteit verwijderd.
-	De verwijderde activiteit is niet meer zichtbaar op het dashboard.
-	De verwijderde activiteit wordt bij de volgende agenda synchronisatie niet meer weergegeven op de gebruikers hun gelinkte agenda's.

<!-- ## Titel: Docent beheert tijdsblok
**scenario:** <br> Als docent wil ik tijdsblokken kunnen toevoegen, wijzigen en verwijderen, zodat ik de beschikbare planning tijden kan beheren
## acceptatiecriteria:
-	De docent kan een nieuw tijdsblok toevoegen.
-	De docent kan een bestaand tijdsblok wijzigen.
-	De docent kan een bestaand tijdsblok verwijderen.
-	Een tijdsblok bevat minimaal een begin en eindtijd.
-	De eindtijd kan niet eerder zijn dan de begintijd. -->

## Titel: SuperBeheerder maakt een account aan
**scenario:** <br> Als SuperBeheerder is het mijn taak om accounts voor docenten aan te maken. <br> **acceptatiecriteria:**
-	De beheerder kan de voornaam van de docent invoeren
-	De beheerder kan de achternaam van de docent invoeren.
-	De beheerder kan een wachtwoord van de docent invoeren.
-	De beheerder kan het e-mailadres van de docent invoeren.

## Titel: Student zoekt een activiteit
**scenario:** <br> Als student zijnde moet ik activiteiten opzoeken zodat ik weet wanneer ik een toets heb bijvoorbeeld.
## acceptatiecriteria:
-	De student kan een klas naam invullen en die activiteiten voor zich krijgen
-	De student kan de naam van een docent invullen en die activiteiten voor zich krijgen
-	De student kan een groep invullen en die activiteiten voor zich krijgen
-	De student kan een categorie invullen en die activiteiten voor zich krijgen.
