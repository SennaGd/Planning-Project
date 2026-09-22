# TC-01 — Dashboard bekijken

## TC-01-01 — Student ziet Schiphol-stijl overzicht van activiteiten

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-01-01 — Student ziet Schiphol-stijl overzicht |
| **Scope** | Publiek dashboard (browser, student zonder account) |
| **Preconditions** | Webapplicatie is bereikbaar. Er staan één of meer lessen/activiteiten gepland. |

**Stappen**
1. Open het dashboard in een browser (telefoon of laptop) zonder in te loggen.
2. Wacht tot het overzicht geladen is.
3. Controleer de kolommen/velden van het overzicht.

**Verwacht resultaat**
- Het overzicht toont alle lessen/activiteiten zonder dat een account vereist is.
- Elke activiteit toont minimaal: Bestemming (Les), VluchtNummer (Klas), Airline (Docent), Gate (Lokaal), Tijd (Tijdstip).
- Activiteiten zijn gesorteerd op startdatum/tijd (oplopend) — acceptatie US.
- De gebruiker heeft een up-to-date, overzichtelijk beeld van de actuele lessen en activiteiten.

**Randgevallen / edge cases**
- **Lege planning:** Scherm toont geen activiteiten.

---

## TC-01-02 — Leerplein-scherm toont hetzelfde dashboard

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-01-02 — Fysiek leerplein-scherm |
| **Scope** | Display op leerplein |
| **Preconditions** | Fysieke scherm op het leerplein staat aan en opent de dashboard-URL. Activiteiten aanwezig. |

**Stappen**
1. Controleer dat het scherm op het leerplein het dashboard toont.
2. Vergelijk de zichtbare activiteiten met een browser op een laptop.

**Verwacht resultaat**
- Het leerplein-scherm toont het lesrooster in dezelfde Schiphol-stijl.
- Inhoud komt overeen met het browser-dashboard (zelfde activiteiten en velden).

**Randgevallen / edge cases**
- **Scherm uit / URL niet geladen:** Geen rooster zichtbaar.
- **Lange lijst activiteiten:** Overzicht blijft leesbaar / scrollbaar zonder layout-crash.

---

## TC-01-03 — Realtime update na nieuwe activiteit

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-01-03 — Automatische update bij nieuwe activiteit |
| **Scope** | Dashboard + realtime updates (Pusher) |
| **Preconditions** | Dashboard open in browser A. Docentaccount beschikbaar. Realtime/broadcasting volgens ontwerp actief. |

**Stappen**
1. Laat browser A open op het publieke dashboard.
2. Log als docent in (browser B) en maak een nieuwe activiteit aan met unieke omschrijving.
3. Kijk in browser A of het overzicht ververst zonder handmatige reload.

**Verwacht resultaat**
- De nieuwe activiteit verschijnt op het dashboard idealiter zonder pagina-reload.
- Sortering op starttijd blijft correct.
- Mechanisme volgens Docs: **Pusher**.

**Randgevallen / edge cases**
- **Realtime niet beschikbaar:** Update verschijnt pas na handmatige refresh.
- **Gelijktijdige open dashboards:** Alle open dashboards tonen dezelfde nieuwe activiteit.

---

# TC-02 — Filteren en zoeken

## TC-02-01 — Filteren op klas

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-02-01 — Filter op klas |
| **Scope** | Dashboard-filter |
| **Preconditions** | Dashboard open. Activiteiten voor minstens twee verschillende klassen aanwezig. |

**Stappen**
1. Noteer dat activiteiten van meerdere klassen zichtbaar zijn.
2. Selecteer via de filteropties één specifieke klas.
3. Controleer de zichtbare rijen.
4. Verwijder / reset het filter.

**Verwacht resultaat**
- Na selectie blijven alleen activiteiten van de gekozen klas(sen) zichtbaar.
- Na reset is weer de ongefilterde weergave zichtbaar.

**Randgevallen / edge cases**
- **Geen matchende klas:** Lege lijst met melding.
- **Meerdere klassen tegelijk geselecteerd (indien UI dit toelaat):** Alleen activiteiten van de geselecteerde klassen.

---

## TC-02-02 — Filteren op opleiding, groep en categorie

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-02-02 — Extra filters (opleiding / groep / categorie) |
| **Scope** | Dashboard-filters volgens user stories |
| **Preconditions** | Testdata met verschillende opleidingen, groepen en categorieën (globaal). |

**Stappen**
1. Filter op opleiding; controleer resultaat.
2. Reset; filter op groep; controleer resultaat.
3. Reset; filter op categorie (globaal); controleer resultaat.
4. Verwijder het actieve filter opnieuw.

**Verwacht resultaat**
- Student ziet na elk filter alleen de gekozen subset.
- Filter kan weer worden weggehaald.

**Randgevallen / edge cases**

---

## TC-02-03 — Zoeken op bestemming of omschrijving

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-02-03 — Zoekveld dashboard |
| **Scope** | Zoeken in geladen activiteiten |
| **Preconditions** | Dashboard open. Bekende activiteit met herkenbare omschrijving (bijv. “Workshop”) en/of lokaalnaam. |

**Stappen**
1. Typ een zoekterm in het zoekveld (bijv. “Workshop” of een lokaalnaam).
2. Bevestig de zoekopdracht.
3. Controleer de tabelresultaten.
4. Zoek op een term die nergens voorkomt.

**Verwacht resultaat**
- Tabel toont alleen matchende activiteiten.
- Bij geen resultaten: melding “Geen activiteiten gevonden voor deze zoekopdracht”.

**Randgevallen / edge cases**
- **Lege zoekterm:** Alle activiteiten weer zichtbaar (of gedrag documenteren als niet gespecificeerd).

---

# TC-03 — Inloggen

## TC-03-01 — Succesvol inloggen als docent

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-03-01 — Docent login succesvol |
| **Scope** | Authenticatie docent |
| **Preconditions** | Bestaand docentaccount (aangemaakt door superbeheerder). Gebruiker op inlogpagina. |

**Stappen**
1. Vul correct e-mailadres en wachtwoord in.
2. Klik op de inlogknop.
3. Controleer de landingspagina / beheeromgeving.

**Verwacht resultaat**
- Gebruiker wordt doorverwezen naar de beheeromgeving.
- Docent heeft toegang tot docent-specifieke beheerfuncties (lessen/activiteiten beheren).

**Randgevallen / edge cases**
- **Spaties rond e-mail:** Noteer of login faalt of trimt (niet gespecificeerd).

---

## TC-03-02 — Succesvol inloggen als superbeheerder

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-03-02 — Superbeheerder login |
| **Scope** | Authenticatie superbeheerder |
| **Preconditions** | Superbeheerder-account bestaat. |

**Stappen**
1. Log in met superbeheerder-credentials.
2. Controleer beschikbare menu’s (o.a. docentenbeheer).

**Verwacht resultaat**
- Authenticatie slaagt; toegang tot superbeheerder-functies (docentenaccounts).
- Volgens projectplan is de superbeheerder niet verantwoordelijk voor activiteiten-CRUD — noteer werkelijk gedrag als de UI dit anders doet.

**Randgevallen / edge cases**
- **Rolverwarring:** Docent mag geen docentenaccounts beheren; superbeheerder wel.

---

## TC-03-03 — Mislukte login met onjuiste gegevens

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-03-03 — Onjuiste inloggegevens |
| **Scope** | Negatieve authenticatie |
| **Preconditions** | Inlogpagina open. |

**Stappen**
1. Vul een bestaand e-mailadres in met een fout wachtwoord.
2. Klik op inloggen.
3. Herhaal met een niet-bestaand e-mailadres.

**Verwacht resultaat**
- Toegang wordt geweigerd.
- Er verschijnt een foutmelding.
- Gebruiker blijft ongeauthenticeerd (geen beheeromgeving).

**Randgevallen / edge cases**
- **Lege velden:** Validatiefout; geen login.
- **Wachtwoorden in UI:** Plain text wachtwoord mag nergens zichtbaar zijn in schermen/responses.

---

# TC-04 — Activiteiten beheer

## TC-04-01 — Docent maakt activiteit aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-04-01 — Activiteit aanmaken |
| **Scope** | Beheeromgeving — create |
| **Preconditions** | Docent is succesvol ingelogd. Minstens één klas bestaat om te koppelen. |

**Stappen**
1. Open het formulier voor een nieuwe activiteit.
2. Vul verplichte velden in volgens: Bestemming (Les), VluchtNummer (Klas), Airline (Docent), Gate (Lokaal), Tijd; volgens US ook datum, starttijd, eindtijd, omschrijving, locatie, doelgroep/klas.
3. Verzend/sla op.
4. Open het publieke dashboard (andere tab/browser).

**Verwacht resultaat**
- Activiteit wordt opgeslagen en is direct zichtbaar op alle dashboards.
- Realtime update merkbaar zonder handmatige refresh waar Pusher/realtime actief is.
- Ongeldige of incomplete invoer wordt niet opgeslagen.

**Randgevallen / edge cases**
- **Ontbrekende verplichte velden:** Validatiefout; data niet opgeslagen.
- **Ongeldige tijd:** Validatiefout; data niet opgeslagen.
- **Eindtijd eerder dan starttijd:** Mag niet worden opgeslagen.
- **Activiteit namens andere docent:** Projectplan staat toe dat een docent activiteiten aanmaakt in naam van andere docenten — test indien veld Airline/Docent vrij kiesbaar is.

---

## TC-04-02 — Docent past activiteit aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-04-02 — Activiteit wijzigen |
| **Scope** | Beheeromgeving — update |
| **Preconditions** | Docent ingelogd. Bestaande activiteit aanwezig. |

**Stappen**
1. Selecteer/open de bestaande activiteit.
2. Wijzig datum, start/eindtijd, omschrijving, locatie en/of klas/doelgroep.
3. Bevestig/sla op.
4. Controleer dashboard (homepagina) en later eventueel de agenda-feed.

**Verwacht resultaat**
- Gewijzigde gegevens worden getoond in beheer én op het dashboard / homepagina.
- Verwerking bij voorkeur onder 1 seconde.
- Realtime update naar open dashboards waar beschikbaar.

**Randgevallen / edge cases**
- **Gelijktijdig bewerken door andere docent:** Foutmelding dat de actie niet kon worden voltooid.
- **Wijzigen van activiteit van andere docent:** Wijziging slaagt; zichtbaar voor studenten.

---

## TC-04-03 — Docent zet activiteit op inactief

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-04-03 — Activiteit inactief zetten |
| **Scope** | Beheeromgeving — inactive; niet harde delete |
| **Preconditions** | Docent ingelogd. Te deactiveren activiteit bestaat en is zichtbaar op het dashboard. |

**Stappen**
1. Selecteer de activiteit in de beheeromgeving.
2. Klik op de knop om de activiteit op inactief te zetten.
3. Bevestig de actie.
4. Controleer het publieke dashboard / de homepagina.

**Verwacht resultaat**
- Systeem vraagt om bevestiging vóór deactiveren.
- Na bevestiging is de activiteit op inactief gezet.
- De wijziging wordt direct doorgespeeld naar de homepagina.
- Realtime update op open dashboards waar beschikbaar.

**Randgevallen / edge cases**
- **Annuleren van bevestiging:** Activiteit blijft actief/zichtbaar zoals voorheen.
- **Activiteit al weg / niet meer aanwezig door andere docent:** Melding dat de activiteit niet meer bestaat.

---

# TC-05 — Klassen


## TC-05-01 — Docent maakt unieke klas aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-05-01 — Klas aanmaken |
| **Scope** | Klasbeheer |
| **Preconditions** | Docent (of beheerder) is ingelogd in het beheerpaneel. |

**Stappen**
1. Navigeer naar klasbeheer.
2. Vul een nieuwe, nog niet bestaande klassennaam in.
3. Sla op.
4. Controleer of de klas selecteerbaar is bij het aanmaken van een activiteit.

**Verwacht resultaat**
- Nieuwe klas is beschikbaar in het systeem en kan gekoppeld worden aan activiteiten.
- Bij bestaande klasnaam: foutmelding; klas wordt niet dubbel aangemaakt.

**Randgevallen / edge cases**
- **Lege klassennaam:** Validatiefout.
- **Meerdere klassen in één keer:** Test indien UI batch-toevoegen ondersteunt; anders noteer als niet geïmplementeerd.

---

# TC-06 — Agenda-abonnement en QR-code


## TC-06-01 — Agenda-feed-link genereren

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-06-01 — Agenda-link genereren |
| **Scope** | Student abonnement zonder account |
| **Preconditions** | Publieke webapp open. Minstens één klas met activiteiten bestaat. |

**Stappen**
1. Vink één of meer klassen aan.
2. Klik op de knop om een agenda-link te genereren.
3. Controleer dat er een klikbare link (of downloadbaar abonnement) terugkomt.
4. Herhaal zonder klasselectie.

**Verwacht resultaat**
- Student krijgt een direct te koppelen kalender-/agenda-link.
- Geen account vereist.
- Zonder selectie: melding dat minimaal één klas moet worden aangevinkt; geen feed/link.

**Randgevallen / edge cases**
- **Meerdere klassen:** Feed/link dekt activiteiten van alle aangevinkte klassen.

---

## TC-06-02 — Agenda koppelen in externe agenda-apps

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-06-02 — Koppeling Apple / Outlook / Google Calendar |
| **Scope** | Externe kalenderconsumptie |
| **Preconditions** | Geldige agenda-feed/link voor een klas met bekende activiteiten. |

**Stappen**
1. Abonneer de feed in Apple Calendar (indien beschikbaar).
2. Abonneer dezelfde of een vergelijkbare feed in Outlook.
3. Abonneer in Google Calendar.
4. Controleer of activiteiten nuttige info tonen (tijd, locatie, omschrijving).

**Verwacht resultaat**
- Feed werkt met Apple Calendar, Outlook en Google Calendar (US; .ics of abonneer-URL).
- Getoonde informatie is bruikbaar voor de student (tijd/locatie/omschrijving).

**Randgevallen / edge cases**
- **Wijziging / toevoegen / inactief of verwijderen:** Bij volgende synchronisatie reflecteert de agenda de wijziging (US). Exacte sync-interval is niet gespecificeerd — noteer.

---

## TC-06-03 — QR-code genereren voor agenda-feed

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-06-03 — QR-code genereren |
| **Scope** | Delen van agenda-abonnement |
| **Preconditions** | Webapp open op browser of mobiel. |

**Stappen**
1. Selecteer gewenste klas(sen).
2. Klik op “Genereer QR-code”.
3. Controleer of een scannbare QR zichtbaar is.
4. Probeer zonder klas-selectie.

**Verwacht resultaat**
- QR-code verwijst naar de specifieke agenda-feed en is zichtbaar om te scannen/delen.
- Zonder selectie: foutmelding dat selectie verplicht is.
- Genereren voelt snel aan.

**Randgevallen / edge cases**
- **Delen met klasgenoten:** Andere student kan dezelfde QR gebruiken.

---

## TC-06-04 — QR-code scannen leidt naar abonneren

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-06-04 — QR scannen |
| **Scope** | Mobiele camera → kalender-abonnement |
| **Preconditions** | Geldige QR voor een klas/agenda-feed is beschikbaar. |

**Stappen**
1. Scan de QR met de camera van een mobiel apparaat.
2. Volg de geopende URL / kalender-flow in de browser/agenda-app.

**Verwacht resultaat**
- Apparaat opent de URL uit de QR.
- Browser/agenda regelt het abonneren op de feed.

**Randgevallen / edge cases**
- **Ongeldige of verlopen QR:** Foutpagina (404) in de mobiele browser.

---

# TC-07 — Superbeheerder en accountbeheer


## TC-07-01 — Superbeheerder bekijkt docentenaccounts

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-07-01 — Overzicht docenten |
| **Scope** | Superbeheerder gebruikersoverzicht |
| **Preconditions** | Superbeheerder is ingelogd. Er bestaan nul of meer docentaccounts. |

**Stappen**
1. Navigeer naar het gebruikersoverzicht.
2. Controleer de getoonde accounts (rol docent).

**Verwacht resultaat**
- Overzichtelijke lijst met geregistreerde docentenaccounts.
- Alleen toegankelijk voor superbeheerder-rol.

**Randgevallen / edge cases**
- **Geen docenten:** Lege tabel.
- **Docent probeert dezelfde URL:** Toegang geweigerd / geen menu.

---

## TC-07-02 — Superbeheerder maakt docentaccount aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-07-02 — Docentaccount aanmaken |
| **Scope** | User create |
| **Preconditions** | Superbeheerder ingelogd. |

**Stappen**
1. Open formulier “Nieuwe docent”.
2. Vul gebruikersnaam, e-mail, tijdelijk wachtwoord. Volgens ook voornaam en achternaam indien velden aanwezig.
3. Sla op.
4. Log uit en log in met het nieuwe docentaccount.

**Verwacht resultaat**
- Nieuw docentaccount bestaat; daarmee kan worden ingelogd.
- E-mail al in gebruik: validatiefout; geen tweede account.

**Randgevallen / edge cases**
- **Meerdere accounts in één keer:** Test indien UI batch ondersteunt; anders noteer.

---

## TC-07-03 — Superbeheerder past docentaccount aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-07-03 — Docentaccount wijzigen |
| **Scope** | User update |
| **Preconditions** | Superbeheerder ingelogd. Bestaand docentaccount. Tweede account met ander e-mail voor conflict-test. |

**Stappen**
1. Selecteer een docentaccount.
2. Wijzig gebruikersnaam en/of e-mail.
3. Sla op.
4. Probeer e-mail te zetten op een e-mail dat al bij een andere gebruiker hoort.

**Verwacht resultaat**
- Geldige wijzigingen worden opgeslagen.
- Conflict-e-mail: validatiefout; geen overwrite.

**Randgevallen / edge cases**
- **Wachtwoord reset door superbeheerder:** Niet expliciet genoemd alleen gebruikersnaam/e-mail genoemd.

---

## TC-07-04 — Superbeheerder verwijdert docentaccount

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-07-04 — Docentaccount verwijderen |
| **Scope** | User delete |
| **Preconditions** | Superbeheerder ingelogd. Te verwijderen docentaccount bestaat. |

**Stappen**
1. Klik op Verwijderen bij het docentaccount.
2. Bevestig in het pop-upvenster.
3. Probeer opnieuw in te loggen met dat account.
4. Probeer het eigen superbeheerder-account te verwijderen.

**Verwacht resultaat**
- Na bevestiging is het docentaccount definitief verwijderd; login met die credentials faalt.
- Poging eigen superbeheerder-account te verwijderen: systeem weigert.

**Randgevallen / edge cases**
- **Annuleren pop-up:** Account blijft bestaan.

---

## TC-07-05 — Docent past eigen account aan

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-07-05 — Eigen profiel/wachtwoord wijzigen |
| **Scope** | Docent instellingen |
| **Preconditions** | Docent is ingelogd. |

**Stappen**
1. Navigeer naar instellingen.
2. Wijzig gebruikersnaam en/of e-mail; sla op.
3. Wijzig wachtwoord met correct huidig wachtwoord; log opnieuw in met nieuw wachtwoord.
4. Probeer wachtwoord te wijzigen met onjuist huidig wachtwoord.

**Verwacht resultaat**
- Eigen accountgegevens zijn succesvol bijgewerkt.
- Login met nieuw wachtwoord lukt.
- Onjuist huidig wachtwoord: actie geweigerd.

**Randgevallen / edge cases**
- **E-mail conflict met ander account:** Verwacht validatiefout.

---

# TC-08 — Autorisatie en niet-functionele eisen


## TC-08-01 — Student heeft geen beheertoegang

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-08-01 — Publieke gebruiker vs beheer |
| **Scope** | Autorisatie |
| **Preconditions** | Niet-ingelogde browser. Bekende beheer-URL’s (login, activiteitenbeheer, gebruikersbeheer). |

**Stappen**
1. Open het publieke dashboard — controleer alleen-lezen activiteiten.
2. Probeer direct beheer-URL’s te openen zonder login.
3. Log in als docent en controleer dat activiteiten-CRUD / inactief zetten beschikbaar is.
4. Log in als superbeheerder en controleer docentenbeheer.

**Verwacht resultaat**
- Studenten/publiek: alle lessen/activiteiten bekijken, filteren/zoeken, agenda/QR — geen account nodig.
- Docent: lessen/activiteiten toevoegen, aanpassen, inactief zetten; eigen account aanpassen; geen (of beperkte) docentenadmin.
- Superbeheerder: docentenaccounts beheren.
- Docenten mogen volgens projectplan ook activiteiten van anderen aanpassen — consistent houden met TC-04.

**Randgevallen / edge cases**
- **Risico “andere scholieren zien roosters”:** Publieke toegang is by design; noteer privacy-acceptatie.
- **Hacker in docentomgeving (risico):** Alleen kwalitatief — sessie na logout ongeldig; geen plain-text wachtwoorden in UI.

---

## TC-08-02 — Responsetijden (kwalitatieve check)

| Veld | Inhoud |
| :--- | :--- |
| **Titel / ID** | TC-08-02 — Response onder drempels |
| **Scope** |  |
| **Preconditions** | Normale testdataset. |

**Stappen**
1. Laad dashboard; noteer of lijst binnen ~2 seconden zichtbaar is.
2. Als docent: sla een activiteit op of zet er één op inactief; noteer of response ~≤1 seconde voelt en of realtime-update volgt.
3. Login; noteer of response ~≤1 seconde voelt.

**Verwacht resultaat**
- Dashboard/lijst: bij voorkeur < 2 s.
- Docentacties/login: bij voorkeur < 1 s.

**Randgevallen / edge cases**
- **Grote hoeveelheid activiteiten:** Gedrag/performance niet gekwantificeerd.

---