#Flaggschiff FSColumns Bundle

FSColumns bindet kinderleicht Bootstrap in Contao ein. Mit wenig Aufwand hat man schnell ein Gridsystem zur Verfügung, in das man jedes Contentelement einbinden kann. Die Erweiterung bringt standardmäßig zwei Gridsysteme mit sich, zwischen denen man wählen kann:

- Reguläres Bootstrap - das gewohnte 12-spaltige Bootstrap mit XS-, SM-, MD- und LG-Größen. http://getbootstrap.com/
- Angepasstes Bootstrap - eine angepasste Version des 12-spaltigen Bootstraps mit zwei zusätzlichen Größen: XXS (von 0 bis 480px Bildschirmbreite) und XLG (von 1680px bis unendlich Bildschirmbreite).

Beide Versionen fügen ein CSS ein, das lediglich das Bootstrap Layout einbindet, extra Styles wie CSS-Reset und ähnliches werden nicht eingefügt.

Die Erweiterung soll damit die Arbeit zu Beginn beim Aufsetzen eines neuen Layouts erleichtern.

##Installation

Die Installation erfolgt über composer oder den Contao Manager.

Nach einem erfolgreichen Composer Update und einem Update der Datenbank sollte nun ein neuer Punkt namens "Bootstrap Einstellungen" in den Einstellungen von Contao aufgetaucht sein. Hier können die Einstellungen der Erweiterung angepasst werden:

- **Fluid Container:**
Diese Auswahl ändert bei der Option "Fluid Container" alle regulären "Container" ab, sodass diese immer die volle Bildschirmbreite ausnutzen.

- **Bootstrap-Auswahl:**
Diese Option gibt die Möglichkeit, eines der oben beschriebenen Gridsysteme zu wählen. Reguläres: xs, sm, md, lg. Angepasstes: xxs, xs, sm, md, lg, xlg.

- **Bootstrap Größen:**
Diese Auswahl ermöglicht es, statt den presets wie "halbspaltig", "drittelspaltig" usw. die Bootstrap columns von 1-12 selbst zu wählen. Dies bedeutet jedoch, dass FSColumns, für responsive Größen keine Größen selbst berechnen kann. Das heißt: "Presets" ist einfacher zu pflegen, "Alle" bietet mehr Möglichkeiten.

Die Erweiterung bindet die Bootstrap CSS automatisch ein, das heißt, dass die Installation und Konfiguration hiermit abgeschlossen ist.

##Verwendung

###Inhaltselemente

Dieser Abschnitt geht davon aus, dass "Presets" für "Bootstrap Größen" gewählt ist. Die Unterschiede werden am Ende des Abschnitts erklärt.

Nach der Installation erscheinen für den Backendbenutzer in jedem Contentelement zwei neue Formularfelder. "Breite des Elements" und "Responsive Größe".

Durch diese Optionen kann die Breite des jeweiligen Elements definiert werden. "Breite des Elements" bezieht sich stets auf die größte vorhandene Breite (XLG oder LG, je nach Grid). Ist "Responsive Größe" nicht gewählt, bestimmt es kleinere Größen automatisch. Zur Auswahl stehen "Vollspaltig", "Halbspaltig", "Drittelspaltig", "Viertelspaltig", "2/3-spaltig" und "3/4-spaltig".

**Beispiel:** Man wählt als Breite des Elements "Viertelspaltig". Responsive Größe ist nicht angewählt. Das Element wird nun auf XXS und XS als vollspaltig dargestellt. Auf SM wird es halbspaltig dargestellt und ab MD wird es viertelspaltig dargestellt.

Ähnlich verhält es sich mit den anderen Größen. Bis auf "Vollspaltig" werden alle Größen auf SM als halbspaltig dargestellt. "Vollspaltig" ist überall vollspaltig. Möchte man genauer kontrollieren, mit welcher Größe das Element auf unterschiedlichen Bildschirmgrößen angezeigt wird, kann man "Responsive Größe" anwählen. Nun erscheinen Auswahlmöglichkeiten zu allen Bildschirmgrößen.

"Breite des Elements" gibt dann nur noch die Breite auf XLG- bzw. LG-Größe an. Unter dem Feld "Responsive Größe" folgen absteigend die anderen Bildschirmgrößen.

Beim angepassten Bootstrap heißt das:
- Breite des Elements - XLG
- Responsive Größe
- Bei großen Geräten - LG
- Bei mittelgroßen Geräten - MD
- Bei kleinen Geräten - SM
- Bei sehr kleinen Geräten - XS
- Bei den kleinsten Geräten - XXS

Im Falle des regulären Bootstraps:
- Breite des Elements - LG
- Responsive Größe
- Bei mittelgroßen Geräten - MD 
- Bei kleinen Geräten - SM
- Bei sehr kleinen Geräten - XS

Jedes dieser Felder bietet die Optionen "Vollspaltig" usw. Alle Inhaltselemente können somit für unterschiedliche Bildschirmgrößen angepasst werden.

####Unterschiede bei "Bootstrap Größen": "Alle"

Im Fall, dass bei "Bootstrap Größen" der Punkt "Alle" gewählt ist, sieht das Backend ein klein wenig anders aus. Der Punkt "Responsive Größe" entfällt und alle responsiven Breiten müssen selbst gewählt werden. Zudem wird zwischen Werten von 1 bis 12 gewählt, statt "halbspaltig", "drittelspaltig" usw.

###Backend Preview

Man kann in der Übersicht der Inhaltselemente eine Vorschau der Elementbreiten sehen. Die Breite der Elemente, je nach Bildschirmgröße, kann durch die Vorschau Buttons getestet werden.

Diese befinden sich unter den Filtermöglichkeiten.

###"Spalten"

Es kann allerdings den Fall geben, dass 4 Elemente Drittelspaltig sein sollen, das vierte Element aber auf kleineren Größen unter dem ersten Element erscheinen soll. 

|&nbsp;&nbsp;&nbsp; Element 1 &nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp; Element 2 &nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp; Element 3 &nbsp;&nbsp;&nbsp;|

|&nbsp;&nbsp;&nbsp; Element 4 &nbsp;&nbsp;&nbsp;|

Dies ist das Layout in der größten Ansicht. Alle 4 Elemente werden drittelspaltig dargestellt.

|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

Auf einer kleineren Größe werden die Elemente alle zweispaltig dargestellt. Das Element 4 rutscht dabei unter Element 2. Gewünscht wäre es jedoch, dass Element 4 unter Element 1 bleibt.
Dies ist mit FSColumns auch möglich, indem man Spalten verwendet. Spalten sind Umschläge, die eine beliebige Anzahl an Elementen in sich enthalten können. Sie sind gleichzeitig ein Spaltenelement und Row. 

| Spalte Anfang |

||&nbsp;&nbsp;&nbsp; Element 1 &nbsp;&nbsp;&nbsp;|| |&nbsp;&nbsp;&nbsp; Element 2 &nbsp;&nbsp;&nbsp;| |&nbsp;&nbsp;&nbsp; Element 3 &nbsp;&nbsp;&nbsp;|

||&nbsp;&nbsp;&nbsp; Element 4 &nbsp;&nbsp;&nbsp;||

|&nbsp;&nbsp; Spalte Ende &nbsp;&nbsp;|

Auf der kleineren Größe:

|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Spalte Anfang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|| |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|| |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Element 3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Spalte Ende &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

Dies ist ein Beispiel zum Einsetzen einer Spalte. Für das Layout gelten alle Elemente in einer Spalte als ein einziges Element. Die Elemente links bleiben somit immer gruppiert beieinander.

Einsetzbar ist die Spalte wie ein Umschlag für Akkordeons.

###Formulare

FSColumns passt auch Formularfelder an. Sie besitzen die selben responsive Funktionalitäten wie Inhaltselemente. Das Fieldset ist in diesem Fall die Spalte.

###Andere Erweiterungen

FSColumns erweitert alle Contentelemente mit den notwendigen Feldern, ausgeschlossen sind lediglich Elemente, deren Palette das Feld "nofscolumns" beinhalten.

###Verwendbare CSS Klassen

Das CSS in FSColumns ermöglicht die Verwendung der folgenden CSS Klassen:

- container, 
- container-fluid, 
- row, 
- col-(xxs/xs/md/lg/xlg)-(1/2/3/4/5/6/7/8/9/10/11/12), 
- col-(xxs/xs/md/lg/xlg)-offset-(1/2/3/4/5/6/7/8/9/10/11/12), 
- col-(xxs/xs/md/lg/xlg)-pull-(1/2/3/4/5/6/7/8/9/10/11/12), 
- col-(xxs/xs/md/lg/xlg)-push-(1/2/3/4/5/6/7/8/9/10/11/12), 
- visible-(xxs/xs/md/lg/xlg),
- visible-(xxs/xs/md/lg/xlg)-inline, 
- visible-(xxs/xs/md/lg/xlg)-inline-block, 
- visible-(xxs/xs/md/lg/xlg)-block, 
- visible-print, 
- visible-print-inline, 
- visible-print-inline-block,
- visible-print-block, 
- hidden-(xxs/xs/md/lg/xlg), 
- hidden-print, 
- invisible, 
- hidden, 
- show, 
- text-hide, 
- affix, 
- pull-left, 
- pull-right

##Templates

FSColumns bearbeitet folgende Templates:

- form_explanation.html5
- form_fieldset.html5
- form_headline.html5
- form_submit.html5
- form_textarea.html5
- form_textfield.html5
- ce_player.html5 -> Dies ermöglicht dem Youtube- und Videoelement eine responsive Größe, die immer eine Auflösung von 16:9 hat. Ist eine andere Auflösung durch Breite und Höhe des Playerelements definiert, wird diese Auflösung stattdessen eingehalten.

Werden die "form" Templates von anderen Modulen überschrieben, verlieren die Formularfelder die Bootstrap-funktionalität.

##Klassen und Hooks

FSColumns bedient sich folgender Hooks:

- getContentElement - Dieser Hook ermöglicht es, jedem Inhaltselement eine oder mehrere Bootstrapklassen zuzuordnen.
- parseTemplate (FSContainer) - Dieser Hook dient zum einfügen des Containers und der Row.
- parseTemplate (FSColumns) - Dieser Hook wird benötigt um included Inhaltselementen die Bootstrapklassen zuzuordnen.
- parseWidget - Hier wird den Formularfeldern die Bootstrapklasse zugeordnet.


Folgende Klassen sind in FSColumns enthalten:

- FSColumns
    - public function getContentElementHook( obj $objRow, string $strBuffer, obj $objElement ) -> Hook ( siehe oben )
    - public function parseTemplateHook( obj $objTemplate ) -> Hook ( siehe oben )
- FSColumnsController
    - public function calculateColumn( string $col ) -> gibt die entsprechende Bootstrapgröße wenn "full", "half", "third", "quarter", "two-third" oder "three-quarter" gegeben ist.
    - public function caclulateObjectColumns( obj $objElement ) -> gibt einen String mit den Bootstrapgrößen aus, der der Klasse des Objekts angefügt werden kann.
- FSContainer
    - public function parseTemplateHook( obj $objTemplate ) -> Hook ( siehe oben )
- FSForms
    - public functionparseWidgetHook( string $strBuffer, obj $widget ) -> Hook ( siehe oben )
    
##DCA

Die DCA folgender Tabellen wird angepasst:

- tl_content -> fügt Auswahl zur Breite des Elements hinzu.
- tl_form_field -> fügt Auswahl zur Breite des Elements hinzu.
- tl_layout -> fügt Auswahl zur Breite der linken und rechten Spalte hinzu.
- tl_settings -> fügt Bootstrap-Einstellungen hinzu.