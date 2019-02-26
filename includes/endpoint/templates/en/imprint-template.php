/**
* WordPress TOS privacy Template
* Open php tag has been deleted on purpose to eval php code
* The function get_tos_content() in class Tos_Endpoint will replace keywords by values
* and check for basic conditions.
*
* @package    WordPress
* @subpackage TOS
* @since      3.4.0
*/

?>
<?php
$phone = '{{ rrze_tos_webmaster_phone }}';
$fax   = '{{ rrze_tos_webmaster_fax }}';
?>

<div class="alert" role="alert">
	<p>Dieses Impressum gilt für den Webauftritt unter der Adresse
	<ul><li><strong><em>{{ rrze_tos_url }}</em></strong></li></ul>
	</p>

	<h3>Herausgeber</h3>
	<p>
		{{ rrze_tos_responsible_name }}<br>
		{{ rrze_tos_responsible_street }}<br>
		{{ rrze_tos_responsible_postalcode }}
		{{ rrze_tos_responsible_city }}<br>
	</p>

	<h4>Vertreten durch</h4>
	<p><strong><em>{{ rrze_tos_webmaster_org }}</em></strong>
		ist eine Einrichtung des
		Öffentlichen Rechts innerhalb der <a href="https://www.fau.de">Friedrich-Alexander-Universität
			Erlangen-Nürnberg
			(FAU)</a>.
	</p>
	<p>Gemäß Art. 4 Nr. 7 EU-DSGVO i.V.m. Art. 20, 21 BayHSchG wird die FAU als
		staatliche Einrichtung und
		Selbstverwaltungskörperschaft des öffentlichen Rechts nach außen durch
		den Präsidenten vertreten.
	</p>

	<h3>Verantwortlich für den Inhalt</h3>
	<p>
		{{ rrze_tos_webmaster_name }}<br>
		{{ rrze_tos_webmaster_street }}<br>
		{{ rrze_tos_webmaster_postalcode }}
		{{ rrze_tos_webmaster_city }}<br>
	</p>
        <p>
	<?php
	if ( ! empty( $phone ) ) {
		printf( '<strong>Telefon:</strong> %s<br>', esc_html( $phone ) );
	}
	if ( ! empty( $fax ) ) {
		printf( '<strong>Fax:</strong> %s<br>', esc_html( $fax ) );
	}
	?>
	<strong>E-Mail:</strong> {{ rrze_tos_webmaster_email }}</p>
	<h4>Zuständige Aufsichtsbehörde</h4>
	<p>Bayerisches Staatsministerium für Wissenschaft und Kunst<br>
		Salvatorstraße 2<br>
		80327 München</p>
	<p>Webseite: https://www.km.bayern.de/</p>

	<h4>Identifikationsnummern</h4>
	<div class="table-wrapper">
		<div class="scrollable">
			<table>
				<tbody>
				<tr>
					<td>Umsatzsteuer-Identifikationsnummer<br>
						(gemäß § 27a Umsatzsteuergesetz)
					</td>
					<td>&nbsp;DE 132507686</td>
				</tr>
				<tr>
					<td>Steuernummer</td>
					<td>&nbsp;216/114/20045 (Finanzamt Erlangen)</td>
				</tr>
				<tr>
					<td>DUNS-Nummer</td>
					<td>&nbsp;327958716</td>
				</tr>
				<tr>
					<td>EORI-Nummer</td>
					<td>&nbsp;DE4204891</td>
				</tr>
				<tr>
					<td>Bankverbindung</td>
					<td>Bayerische Landesbank München
						<ul>
							<li>SWIFT/BIC-Code: BYLADEMMXXX</li>
							<li>IBAN: DE66700500000301279280</li>
						</ul>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

	<h3>Sicherheitsvorfälle</h3>
	<p class="notice-attention">Meldung über Missbrauch von Computer- und
		Netzwerk-Ressourcen</p>
	<p>Sollte Ihnen irgendeine Form von Missbrauch der Computer- und
		Netzwerk-Ressourcen an der
		Friedrich-Alexander-Universität Erlangen-Nürnberg auffallen,&nbsp;<a
			href="https://www.rrze.fau.de/infocenter/kontakt-hilfe/sicherheitsvorfaelle/">informieren
			Sie bitte umgehend
			die für IT-Sicherheit</a>&nbsp;zuständige Stelle am RRZE.</p>

	<h3>Nutzungsbedingungen</h3>
	<p>Texte, Bilder, Grafiken sowie die Gestaltung dieser Internetseiten können
		dem Urheberrecht unterliegen.</p>
	<p>Nicht urheberrechtlich geschützt sind nach § 5 des Urheberrechtsgesetz
		(UrhG)</p>
	<ul>
		<li>Gesetze, Verordnungen, amtliche Erlasse und Bekanntmachungen sowie
			Entscheidungen und amtlich verfasste
			Leitsätze zu Entscheidungen und
		</li>
		<li>andere amtliche Werke, die im amtlichen Interesse zur allgemeinen
			Kenntnisnahme veröffentlicht worden sind,
			mit der Einschränkung, dass die Bestimmungen über Änderungsverbot
			und Quellenangabe in § 62 Abs. 1 bis 3 und
			§ 63 Abs. 1 und 2 UrhG entsprechend anzuwenden sind.
		</li>
	</ul>
	<p>Als Privatperson dürfen Sie urheberrechtlich geschütztes Material zum
		privaten und sonstigen eigenen Gebrauch im
		Rahmen <a href="http://www.gesetze-im-internet.de/urhg/__53.html">des §
			53 Urheberrechtsgesetz (UrhG)</a>
		verwenden. Eine Vervielfältigung oder Verwendung dieser Seiten oder
		Teilen davon in anderen elektronischen oder
		gedruckten Publikationen und deren Veröffentlichung ist nur mit unserer
		Einwilligung gestattet. Diese erteilen
		auf Anfrage die für den Inhalt Verantwortlichen. Der Nachdruck und die
		Auswertung von Pressemitteilungen und
		Reden sind mit Quellenangabe allgemein gestattet.</p>
	<p>Weiterhin können Texte, Bilder, Grafiken und sonstige Dateien ganz oder
		teilweise dem Urheberrecht Dritter
		unterliegen. Auch über das Bestehen möglicher Rechte Dritter geben Ihnen
		die für den Inhalt Verantwortlichen
		nähere Auskünfte, sofern diese Rechte nicht bereits durch entsprechende
		Hinweise im Webangebot kenntlich gemacht
		sind.</p>

	<h3>Haftungsausschluss</h3>
	<p>Für die Inhalte anderer Webangebote der FAU sind die jeweiligen
		Einrichtungen verantwortlich.</p>
	<p>Alle auf dieser Internetseite bereitgestellten Informationen haben wir
		nach bestem Wissen und Gewissen erarbeitet
		und geprüft. Eine Gewähr für die jederzeitige Aktualität, Richtigkeit,
		Vollständigkeit und Verfügbarkeit der
		bereit gestellten Informationen können wir allerdings nicht übernehmen.
		Ein Vertragsverhältnis mit den Nutzern
		des Internetangebots kommt nicht zustande.</p>
	<p>Wir haften nicht für Schäden, die durch die Nutzung dieses
		Internetangebots entstehen. Dieser Haftungsausschluss
		gilt nicht, soweit die Vorschriften des § 839 des Bürgerlichen
		Gesetzbuches (Haftung bei Amtspflichtverletzung)
		einschlägig sind. Für etwaige Schäden, die beim Aufrufen oder
		Herunterladen von Daten durch Schadsoftware oder
		der Installation oder Nutzung von Software verursacht werden, wird nicht
		gehaftet.<br>
		Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf
		diesen Seiten nach den allgemeinen
		Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als
		Diensteanbieter jedoch nicht verpflichtet,
		übermittelte oder gespeicherte fremde Informationen zu überwachen oder
		nach Umständen zu forschen, die auf
		eine rechtswidrige Tätigkeit hinweisen.<br>
		Verpflichtungen zur Entfernung oder Sperrung der Nutzung von
		Informationen nach den allgemeinen Gesetzen bleiben
		hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem
		Zeitpunkt der Kenntnis einer konkreten
		Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
		Rechtsverletzungen werden wir diese Inhalte
		umgehend entfernen.<br>
		Der Betreiber behält es sich ausdrücklich vor, einzelne Webseiten,
		Web-Dienste oder das gesamte Angebot ohne
		gesonderte Ankündigung zu verändern, zu ergänzen, zu löschen oder die
		Veröffentlichung zeitweise oder endgültig
		einzustellen.</p>

	<h3>Haftung für Links</h3>
	<p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren
		Inhalte wir keinen Einfluss haben. Deshalb
		können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für
		die Inhalte der verlinkten Seiten ist
		stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.
		Die verlinkten Seiten wurden zum
		Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft.
		Rechtswidrige Inhalte waren zum Zeitpunkt der
		Verlinkung nicht erkennbar.<br>
		Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch
		ohne konkrete Anhaltspunkte einer
		Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von
		Rechtsverletzungen werden wir derartige Links umgehend
		entfernen.</p>
	<p><?php echo str_replace("\n","<br/>","{{ rrze_tos_url_list }}"); ?></p>
</div>