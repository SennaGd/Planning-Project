# Project Lessenplanbord
Gemaakt door: Frank, Senna en Tiemen
Datum: 18-08-2026

## Inleiding 
Sinds het start van het nieuwe schooljaar zijn er veranderingen gemaakt in het rooster, en de manier van lesgeven. Deze veranderingen hebben er voor gezorgd dat studenten een slecht of geen overzicht hebben van de lessen die hen gegeven worden. Daarnaast moet elke student inloggen in Eduarte wat helaas niet mogelijk is voor sommige scholieren. En ook is het onpraktisch om elk lesuur steeds opnieuw in te loggen in Eduarte. 
In Eduarte staan ook alleen maar lesblokken, hier is dus geen duidelijk overzicht over wat voor lessen zij hebben. Want in een lesblok kunnen meerdere lessen zich plaatsvinden. 


## Projectomschrijving
### Doelstelling
Wij hebben opdracht gekregen om voor al deze problemen een globale oplossing te vinden, de opdachtgever (product owner) wilt een overzichtelijk dashboard waar studenten op een duidelijke manier kunnen zien waar en wanneer er welke les gegeven wordt.
Ook zouden studenten zich kunnen abonneren op een of meerdere klassen. Zodat zij dan in hun kalender de lessen gemakkelijk kunnen zien

### Resultaat
Als oplossing hebben wij een overzichtelijk dashboard gemaakt in de stijl van een vluchtinformatiebord die je in vliegvelden bijvoorbeel in schiphol vindt. 
In dit informatiebord zal een studen de volgende informatie vinden: Bestemming(Les), VluchtNummer(Klas), Airline(Docent), Gate(Lokaal) en Tijd(Tijdstip). 
Studenten kunnen zich ook abonneren op een of meerdere klassen. De klassen kan je selecteren met een knopje en dan vervolgens kan je abonneren op de klassen die de student heeft aangevinkt. Dit kan worden gedaan met een knopje of een QR-Code. Met de QR-Code zal de student of docent dit ook kunnen delen met een klas.
De studenten zullen deze planning kunnen bezoeken via hun internet-browser en hebben zelf geen account nodig (ook niet voor het abonneren).

Voor docenten is er ook een omgeving om verschillende activiteiten aan te maken voor zichzelf en ook voor andere docenten. Ook kunnen docenten deze activiteiten aanpassen en verwijderen hetzelfde geldt voor het aanmaken, de docenten kunnen ook andere docenten hun les aanpassen en verwijderen.

De docenten hun account wordt aangemaakt door een superbeheerder dit persoon zal alleen verantwoordelijk zijn voor het aanmaken van de docenten accounts dus niet voor het aanmaken of aanpassen van verschillende activiteiten.


### MoSCoW
| MUST HAVE | SHOULD HAVE | COULD HAVE | WON'T HAVE |
| --------- | ----------- | ---------- | ---------- | 
| dashboard | Pushmeldingen | Mobiele Weergave | |
| beheer omgeving | QR-code Kalender Abonnement | Export naar Excel | |
| Gebruikers Rollen | Foto van Docent | Koppeling met Microsoft 365 | |
| Kalender Abonnement | | Agendaweergave naast Schiphol-weergave | |
| Database | | Thema Switch | |
| Kleurcodering per opleiding | | | |
| Realtime Updates (laravel reverb) | | | |
| Dark Mode Switch | | | |

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
- Het limiet van de AI provider
	Wachten tot er nieuwe tokens zijn.
	Nieuwe provider zoeken.
- Eerste deadline niet gehaald
	revisie van MoSCoW 	
- Systeem doet niet toe aan verwachtingen (product owner)
    Reviseren van het systeem en mogelijk oplossing zoeken met de product owner.

