# Project Plan Lessenplanbord
Gemaakt door: Frank, Senna en Tiemen
Datum: 18-08-2026

## Inleiding 
Sinds het start van het nieuwe schooljaar zijn er veranderingen gemaakt in het rooster, en de manier van lesgeven. Deze veranderingen hebben er voor gezorgd dat studenten een slecht of geen overzicht hebben van de lessen die hen gegeven worden. Daarnaast moet elke student inloggen in Eduarte wat helaas niet mogelijk is voor sommige scholieren. En ook is het onpraktisch om elk lesuur steeds opnieuw in te loggen in Eduarte. 
In Eduarte staan alleen maar lesblokken, voor de Software Developers staan er lesblokken genaamd "Project". De studenten kunnen in dit blok meerdere activiteiten hebben zoals: Workshops, Uitleg, Vergaderingen en Presentaties. Dus voor de studenten in Software Development is het niet duidelijk wat zij daadwerkelijk gaan doen in een blokuur. 


## Projectomschrijving
### Doelstelling
Wij hebben opdracht gekregen om voor al deze problemen een globale oplossing te vinden, de opdachtgever (product owner) wilt een overzichtelijk dashboard waar studenten op een duidelijke manier kunnen zien waar en wanneer er welke les gegeven wordt. Ook komt het dashboard op het scherm te staan in op lesplein.

Ook zouden studenten zich kunnen abonneren op een of meerdere klassen. Zodat zij dan in hun kalender de lessen gemakkelijk kunnen zien.

### Resultaat
Als oplossing hebben wij een overzichtelijk dashboard bedacht. Wij gaan bezig met het maken van een vluchtinformatiebord in de stijl schiphol, dit zal zich worden weergegeven op het lesplein in de C afdeling. Ook kunnen de studenten de planning zien via hun telefoon of laptop.

Op dit informatiebord zal een student de volgende informatie vinden: Bestemming(Les), VluchtNummer(Klas), Airline(Docent), Gate(Lokaal) en Tijd(Tijdstip). 
Studenten kunnen zich ook abonneren op een of meerdere klassen. De klassen kan je selecteren met een knopje en dan vervolgens kan je abonneren op de klassen die de student heeft aangevinkt. Dit kan worden gedaan met een knopje en een QR-Code. Met de QR-Code zal de student of docent dit ook kunnen delen met een klas.
De studenten zullen deze planning kunnen bezoeken via hun internet-browser en hebben zelf geen account nodig (ook niet voor het abonneren).

Voor de docenten is er ook een omgeving om verschillende activiteiten aan te maken voor een aangegeven klas. Deze omgeving kunnen de docenten bezoeken na het inloggen in zijn/haar account. De docent kan ook activiteiten aanmaken in de naam van een andere docenten. Ook kunnen docenten deze activiteiten aanpassen en verwijderen, de docenten kunnen ook andere docenten hun les aanpassen en verwijderen. 

De docenten hun account wordt aangemaakt door een superbeheerder dit persoon zal alleen verantwoordelijk zijn voor het aanmaken voor de docent zijn account, dus niet voor het aanmaken of aanpassen van verschillende activiteiten.


### MoSCoW
| MUST HAVE | SHOULD HAVE | COULD HAVE | WON'T HAVE |
| --------- | ----------- | ---------- | ---------- | 
| dashboard             | Realtime Updates (laravel reverb) | Mobiele Weergave  | Export naar Excel  |
| beheer omgeving       | Login Omgeving | Thema Switch | Koppeling met Microsoft 365  |
| Gebruikers Rollen     | Activiteiten Beheer Omgeving | QR-code Kalender Abonnement                       | Foto van Docent |
| Kalender Abonnement   | Superbeheerder Omgeving | Dark Mode Switch | Agendaweergave naast Schiphol-weergave |
| Database              | | Kleurcodering per opleiding | |

### Randvoorwaarde
- Toegang tot server-pc

	om de website uiteindelijk op de server te hosten.
- AI/LLM Provider 

	om te helpen met het ontwikkelen van software. 
	en voor nieuwe ideen.
- Github repository (version control)

    om goed ons project op te slaan 
    als er iets kapot gaat wij een werkend backup hebben.
- Docent(en)

	om vragen te stellen.

### Risico Analyse
- Andere scholieren kunnen de roosters en activiteiten zien.

    terwijl zij niet op de school zitten.
- packages die er uit liggen (unsupported) 

    applicatie kan niet worden gebouwd waardoor de applicatie dus ook niet werkt
- Hacker komt in de docenten omgeving

    Datalek mogelijk en ongeldige planning
- QR-Code ongeldig

    Student of Docent kan activeit/klas niet delen of zelf scannen 

