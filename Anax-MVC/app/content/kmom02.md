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