"May the Services be with you"
=============================

> Size matters not. Look at me. Judge me by my size, do you? Hmm? Hmm. And well you should not. For my ally is the Force, and a powerful ally it is.
> -Yoda


**Geschichte** : Es war einmal... langweilig! Wir sind ein Team intergalaktische Entdecker, auf der Suche nach neuen Lebewesen an Bord unseres Raumschiffes Moltocity-ZK3. Wir nähren uns gerade dem Planeten Delta-Zulu-5 in der Galaxis [NGC 1300](https://en.wikipedia.org/wiki/NGC_1300#/media/File:Hubble2005-01-barred-spiral-galaxy-NGC1300.jpg) etwa 61 Millionen Lichtjahre entfernt von der Erde.
Auf Delta-Zulu-5 haben wir eine intelligente Lebensform entdeckt, dessen wissenschaftlichen Name *Manageris Projektum* liebevoll auf *Gumpas* umgetauft wurde (hat nicht mit dem Originalnamen zu tun, aber das konnten wir einfach nicht aussprechen). Eine erste genetische Untersuchung der Gumpas stellte sich heraus, dass diese Spezies wohl Vorfahren des geehrten Meister Yoda sein mussten! Diese Erkenntnis lässt uns keine andere Wahl, als mit den Gumpas in Kontakt zu treten, um unsere Ermittlungen fortzusetzen.
Die Gumpas sprechen jedoch einen seltsamen Dialekt, der unserem Babelfisch leider unbekannt ist. Wir entscheiden uns, auf unser altes Übersetzungsmodul zurück zu greifen. Der [BABEL95](http://www.ionaudio.com/images/products/iCade_angle_media.jpg) kann leider nur in eine Richtung übersetzen und muss für diesen Zweck auch umprogrammiert werden.
Aus alten Gesprächsaufnahmen mit Meister Yoda konnten wir die Sprache isolieren. Es handelt sich um einen Dialekt des *anglikus*, das *pasgum* genannt haben.
Die gehackte Version von BABEL95 wird es uns ermöglichen, Nachrichten in pasgum an Delta-Zulu-5 zu schicken. Wir hoffen, dass die Gumpas einen Weg finden, mit uns zu kommunizieren.

## Bausteine

Um BABEL95 einen neuen Kern zu schaffen werden wir 5 Bausteine benötigen.

* [Deutschen zu Anglikus Übersetzungsmodul](https://tech.yandex.com/translate/)
Aufruf :
```
curl https://translate.yandex.net/api/v1.5/tr.json/translate?key=trnsl.1.1.20151025T150027Z.bac1793a7c8a6dac.565453b44143716932e3712f743d7a23aebb168b&text=Wie%20geht%20es%20heute?&lang=de-en
```
Antwort :
```
{
"code": 200,
"lang": "de-en",
"text": [
"How goes it today?"
]
}
```

* [Pasgum Dialekt Übersetzungsmodul](https://market.mashape.com/ismaelc/yoda-speak)
Übersetzt anglikus in pasgum.
Aufruf:
```
curl --get --include 'https://yoda.p.mashape.com/yoda?sentence=You+will+learn+how+to+speak+like+me+someday.++Oh+wait.' \
-H 'X-Mashape-Key: uJbJrnce96mshOsUaGPsFIj348UHp1eDGvNjsni3vCMPMySkcF' \
-H 'Accept: text/plain'
```
Antwort:
```
Learn how to speak like me someday, you will.  Oh wait.
```

* [Kommunikation Modul](https://pusher.com)
Ermöglicht Nachrichten ins Weltall zu schicken. Beispiele befinden sich im Projekt.

* [Avatar Interface](https://market.mashape.com/blaazetech/robohash-image-generator )
Liefert eine Bild vom Entdecker um es in die Nachricht einzubinden.
Aufruf:
```
curl --get --include 'https://robohash.p.mashape.com/index.php?text=moltocity' \
-H 'X-Mashape-Key: uJbJrnce96mshOsUaGPsFIj348UHp1eDGvNjsni3vCMPMySkcF' \
-H 'Accept: application/json'
```
Antwort:
```
{"imageUrl":"http:\/\/bit.ly\/1MdcCIE"}
```

* [BLA95 Interface]().
Um die Nachrichten zu visualisieren.

## Phase 1: Scotty style

> Kirk - Wie lange brauchst du für die Reparatur?
> Scotty - 4 Wochen.
> Kirk - Du hast 4 Stunden!
> Scotty - Ich machs in 2

Wir entscheiden uns 4 Teams zu bilden. Jedes bekommt einen Baustein das im Kern von BABEL95 integriert werden muss.
Jedes Team Baut ein *Modul* (Klasse) das die Bausteine einkapselt. Diese Module werden im [Kern]() eingebaut.

```
BABEL95 Oberfläsche
+-----------------------------+
|Nachricht nach BABEL95 senden|
+--------+--------------------+
|                     BABEL95 Kern
+-----------------------------------------+
| +------v--------+    +----------------+ |
| |   Dekodieren  +---->   Übersetzung  | |
| |   Nachricht   |    |   DE -> AN     | |
| +---------------+    +--------+-------+ |
|           +---------------+   |         |
|    +------+  Übersetzung  <---+         |
|    |      |  AN -> PA     |             |
|    |      +---------------+             |
| +--v------------+    +----------------+ |
| |  Avatar       +---->  Nachricht ins +--->
| |  besorgen     |    |  Weltall senden| |
| +---------------+    +----------------+ |
+-----------------------------------------+

+------------------------------------+
| Nachricht aus dem Weltall anzeigen <------+
+------------------------------------+
BABEL95 Oberfläsche

```
 