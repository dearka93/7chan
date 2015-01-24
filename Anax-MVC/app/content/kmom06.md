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