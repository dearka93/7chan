Kmom05: Bygg ut ramverket
------------------------------------

Kmom05 har varit en nyttig uppgift för mig då jag har både lärt mig hur man publicera en modul på packagist och bygga ut min anax-mvc med extra funktioner. Jag valde göra en rss läsare som heter Rssfeed. Den är en enkel wrapper klass som bygger på simplepie och låter användare visa upp rss flöde på sin hemsida. Generellt så gick projektet bra men har stöttat på några små problem, det kan nog beror på att jag inte har haft tidigare erfarenheter på att utveckla en modul. Så jag fick testa själv några gånger tills det gick bra att flytta över klassen som en modul för att sedan ladda upp på github.

**Var hittade du inspiration till ditt val av modul och var hittade du kodbasen som du använde?**

Inspirationen fick jag från artikel ”Bygg ut ditt Anax MVC med en egen modul och publicera via Packagist”. Hade ingen aning på vad jag kan utveckla, men efter jag har läst artikeln så ansåg jag att rss kan vara ett bra val för mig. Eftersom jag själv har använt olika rss klienter innan både på datorn och mobilenheter för att läsa nyheter från olika sidor. Därför ansåg jag att det blir kul att lägga till rssfeed som min första modul i mitt ramverk. Kodbasen studerade jag dels från Lydias CRSSFeed, även dels från andra elever.

**Hur gick det att utveckla modulen och integrera i ditt ramverk?**

Jag valde först att utveckla det som en klass och hade det i src mappen. Efter har fått klassen att fungera så försökte jag göra det som en modul och lägga det i ett github repo och packagist. Allt gick bra men när jag sedan laddade ner det genom composer så kunde jag inte integrera det med min modul. Tillsist så hittade jag felet vilket var att jag skrev fel på min moduls composer.json, vilket leder till fel på autoloader. 

**Hur gick det att publicera paketet på Packagist?**

Det gick bra. Förstår dock inte hur man kan få min packagist att bli auto-updated, men så länge kan jag istället använda force update vilket ger samma resultat. 

**Hur gick det att skriva dokumentationen och testa att modulen fungerade tillsammans med Anax MVC?**

Som sagt så fick jag lite problem med autoloader, men det löste sig. Jag har även dokumenterat en kort instruktion om min modul på README.md filen.

**Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.**

Nej, det hann jag inte pga tidsbrist. 