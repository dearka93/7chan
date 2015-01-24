Redovisning
====================================
 
Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------
Nu är första kmom klar. Det var väldigt mycket att lära sig på denna kursmoment. Efter oophp kursen så blev jag bekant med anax moduler, men Anax-MVC känndes helt nytt när jag började läsa på guiden. Men det var ändå många saker som man känner igen från den gamla anax struktur. 
Själva uppgiften att göra egen anax-mvc var inte så svårt. Men däremot så tog det längre tid för mig att förstå hur hela mvc är fungerar samt hur olika funktioner och delar är kopplad tillvaran.  
Vissa delar vår svårt att förstå, så som delen om 'snygga länkar' krånglade lite mig. Men förhoppningsvis så kommer jag ha en bättre förståelse om anax-mvc precis som jag gjorde i förra kursen. 

**Vilken utvecklingsmiljö använder du?**

Mac os som operativssystem. Mina text hanterare är Sublime text 2 och Brackets. Filezilla som ftp klient, MAMP för den lokala servern.

**Är du bekant med ramverk sedan tidigare?**

Som sagt så har jag jobbat med anax sen förra kursen, men Anax-mvc känns fortfarande väldigt nytt för mig, eftersom jag tycker att den skiljer sig väldigt mycket från anax. 

**Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?**

Ja. Många begrepp så som callback och anonym funktion är helt nytt för mig, men jag tror att det kommer inte bli så svårt att lära sig så länge jag läser instruktionen noga och göra alla uppgifter. 

**Din uppfattning om Anax, och speciellt Anax-MVC?**

Anax kan jag väldigt bra nu, men anax-mvc behöver jag nog mer tid att bli mer bekant med. Men själva tanken med MVC har jag nu fått ganska bra inblick på efter kmom01. Samt vissa delar så som att lägga all textfiler under Content, och användning av templet tycker jag är väldigt smart och har sina fördelar.

 
Kmom02: Kontroller och modeller
------------------------------------
Nu är kmom02 avklarat. Detta kursmoment kändes väldigt jobbigt i början, eftersom jag hade inte förstått hela konceptet av anax-mvc. Följde instruktionen när jag skulle installera composer men då fick jag lite problem med att göra min composer globally så jag kan slippa mata in php varje gång. Men till slut så löste jag när jag sökte det på Stackflow. Därefter så hade jag svårt att börja igång med att bygga vidare på det kommentarssystem jag fick med composer. Eftersom jag fattade inte hur allt hänger ihop, speciellt om dispatch och controller, även jag har gått igenom guiden.  
För att kunna förstå mer om anax-mvc så tog en snabb repetition på förra kapitel samt läste igenom guiden igen. När jag sedan testade mig fram och lekte runt med kommentar systemet så känner jag mig mer bekväm med det. Studerade koderna enligt flödet mellan csession, commentinsession och commentcontroller. Sedan var det inte längre svårt för mig att förstå hur allt fungera och jag gjorde alla funktioner som krävs.
 
**Hur känns det att jobba med Composer?**

Composer tycker jag är en smart lösning och smidigt att använda när man vill ha en funktion som andra har skapat. Känns som en mindre version av github. 

**Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?**

Absolut! I fortsättningen när jag kan anax-mvc ramverk bättre så skulle det bli smidigare att inkludera och testa runt andras funktioner. Dock så hade jag inte så mycket tid för packagist den här gången eftersom jag satt mest på att lära mig om mvc, men i fortsättningen så kommer jag absolut använda packagist. 

**Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt?**

Dispatcher -> dispatch och forward var lite svårt att följa i början, dels beror det på att nu har vi så många klasser jämför med tidigare. Har numera 3 src mappar så det kan bli lite klurigt ibland när man bläddrar. Men men sedan så förtog jag kopplingen mellan router och hur create url fungerar. Även förhållandet på controller/action/params som jag tycker var det konstigaste grej i början. Begreppen kontroller, modell och action var också lite svårt för mig i början då man lätt kan blanda ihop dessa. 

**Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?**

Funktionaliteten var ganska enkla så det var inte mycket man kan förbättra, men jag la till gravatar samt lite små förbättringar så som visa anta kommentar osv för att kommentarer ser bättre ut. 


Kmom03: Bygg ett eget tema
------------------------------------
Detta moment kändes enkelt i början, eftersom styla och css har varit relativt enkelt för mig, fick inte heller några problem när jag installerade stylephp. Men när jag började med att bygga ett tema med less, så stöttade jag på många problem och svårigheter. Kommando wgt fungerade inte för mig, så jag fick kopiera alla koder och spara själv istället, samtidigt så fick jag ett problem när jag skulle kopiera koder från Lydia. Eftersom hela stylen vägrar att laddas efter jag har importerad den nya variable.less och css3mixins. Har försökt läsa guiden och gjorde om några gånger men fick ändå samma problem. Men till slut så fick jag hjälp i forumet och det visade sig var ett slarvfel. Men nu är klar med projektet och det tog mer tid än jag hade förväntat mig. Less och The Sematic Grid var lite svåra att förstå, så jag fick läsa några gånger för att få en inblick på hur dessa fungerar.

**Vad tycker du om CSS-ramverk i allmänhet och vilka tidigare erfarenheter har du av dem?**

Har bara jobbat med enkla css koder från tidigare kursmoment, därför hade jag inga erfarenheter av CSS-ramverk och bootstrap. Men jag tycker det verka praktiskt med Less och Font awesome.

**Vad tycker du om LESS, lessphp och Semantic.gs?**

Less är ett bra sätt för att tilläga dynamiska variabler som inte finns hos css. Lessphp gör det enkelt att samla ihop all less-filer man har. Semantic var väldigt praktiskt för mig, den sköter olika regioner och organisera dem vilket underlättar för mig.

**Vad tycker du om gridbaserad layout, vertikalt och horisontellt?**

Som sagt så hade jag lite problem med att få igång gridbaserad layout och typografi i början, men det löste sig iallafall. Med gridbaserad laybout som hjälpmedel så ser sidan mer organiserad ut samt man inte behöver matcha positioner på olika delar längre. 

**Har du några kommentarer om Font Awesome, Bootstrap, Normalize?**

Bootstrap har jag inte kollat så mycket under denna kursmoment, men den verka ha många bra filer som man kan låna. Normalize är skönt att arbeta med, då man vet att sin sidan ser likadant ut på alla webbläsare så man inte behöver anpassa sig för andra miljöer. Med font awesome så behöver man inte längre leta efter iconer på nätet, istället får man direkt iconer som redan är anpassad för hemsidor med olika extra funktioner så som rotation och olika storlekar. 

**Beskriv ditt tema, hur tänkte du när du gjorde det, gjorde du några utsvävningar?**

Har inte gjort några utsvävningar, eftersom jag kände mig själva uppgiften var lite jobbigt för mig, samt jag ägnade mest tid för att göra själva guiden för att få det att fungera.

**Antog du utmaningen som extra uppgift?**

Nej, det kändes att själva uppgiften var redan mycket att ta in.  


Kmom04: Databasdrivna modeller
------------------------------------
Nu är jag klar med kmom04. Detta moment kändes väldigt intressant, eftersom jag fick jobba med databas. Det var inget problem att lägga till Cdatabase och Cform, samt det gick bra att koppla upp med databasen. Momentet kändes lite svårt pga det var lite för mycket att göra, jag behövde lära mig två nya klasser på en gång. Men det kändes kul efter jag har gjort uppgifter eftersom jag känner mig att jag har nu en bättre uppfattning på hur anax mvc fungerar, hur kontroller och action hänger ihop. Uppgifter var välidgt bra också, så som att uppdatera kommentarsystemet var en bra övning för att sammanfatta hela momentet.
Fick dock ett problem när jag ville göra comment system ska fungera separerad för olika sidor, men det löste jag genom att skicka params, men sen fick jag ett till problem, tydligen så funkar inte params på callback och där fastnade jag ett tag. Fick bläddra lite på nätet, hittade olika sätt att lösa det, så som att lägga en hidden fält, eller använda function($ form) use($ key)  

**Vad tycker du om formulärhantering som visas i kursmomentet?**

Det är ett bra och smidigt ätt att skapa formulär, man kan mata in med arrayer samt det blir mindre koder. 

**Vad tycker du om databashanteringen som visas, föredrar du kanske traditionell SQL?**

Jag tycker att det är mycket bättre med databashanteringen som vi har lärt oss på detta moment, eftersom man slipper använda traditionella sql satser som är lite krångligt. Nu kan vi bara använda olika metoder så som create-> och save-> , vilket blir mycket lättare att förstå.

**Gjorde du några vägval, eller extra saker, när du utvecklade basklassen för modeller?**

Har bara gjort en funktion för basklassen Comment, där det kan läsa in olika pageType för att skilja kommentarer för olika sidor.

**Beskriv vilka vägval du gjorde och hur du valde att implementera kommentarer i databasen.**

Som sagt enda lite extra sak som jag har gjort var att separera kommentar systemet för olika sidor. Har även implementerat font-awesome på flera platser för att snygga till formulär.

**Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.**

Det har jag inte gjort. 


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


Kmom06: Verktyg och CI
------------------------------------

Under denna kursmoment så har jag fått lära mig många nya verktyg som jag kan integrera med min modul på github. Jag har aldrig jobbat med liknande verktyg innan och det var mycket som behövde installera under denna projekt, ibland så har det varit lite jobbigt att jobba med terminalen enligt guiden, därför tog det lite längre tid än vad jag hade tänkt.
Men generellt så gick projektet bra, kul med att skapa eget testverktyg. Travis och scrutinizer tycker jag är väldigt bra när man jobba med moduler tillsammans med github.

**Var du bekant med några av dessa tekniker innan du började med kursmomentet?**

Nej, det var jag inte. Har bara jobbat med github från tidigare kursmoment. Har sett liknande badges på andras github repos men visste inte vart dessa kommer ifrån. 

**Hur gick det att göra testfall med PHPUnit?**

Installationen av PHPUnit gick bra men fick dock problem när jag testade cform enligt övning men det gick inte att få OK när jag körde lokalt, men gick utmärkt på studentserver. Men mitt eget testprogram gick bra när jag körde lokalt. 

Hur gick det att integrera med Travis?
Det gick bra, instruktionen var tydligt vilket var lätt att genomföra.

**Hur gick det att integrera med Scrutinizer?**

Scrutinizer var lika lätt att koppla som travis. Men jag kunde inte få så hög quality och code coverage. Det kan nog beror på simplepie som mitt rssfeed integrerar med. Simplepie har många buggar och problem i sig vilket resulterade låg quality på min modul. 

**Hur känns det att jobba med dessa verktyg, krångligt, bekvämt, tryggt? Kan du tänka dig att fortsätta använda dem?**

Det var inte alls jobbigt att jobba med dessa nya verktyg. Dock var det lite krångligt att komma igång och installera vissa plugins. Så som xdebug som jag ännu inte har fått igång på min dator. Däremot så var det enkelt och bekvämt att använda Travis och Scrutinizer, både verktyg har jag kopplat med min github som kan uppdatera nya versioner automatiskt det tycker jag är bra då jag slipper manuellt göra något uppdatering. Travis kan testa modulen själv så jag behöver inte längre skriva in phpunit i kommandofönstret. Allt sker automatiskt varje gång jag laddar upp en ny version på min github repo vilket är väldigt bra.

**Gjorde du extrauppgiften? Beskriv i så fall hur du tänkte och vilket resultat du fick.**

Nej det har jag inte gjort. 