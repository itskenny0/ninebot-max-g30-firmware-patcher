<!DOCTYPE html>
<html>
	<head>
		<title>RollerPlausch.com :: G30(D) CFW Builder</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<style>
			#rollerplausch-logo {
				margin-left: 20px;
				padding-right: 10px;
				margin-top: 20px;
			}

			.card.horizontal .card-image {
				width: 23%;
			}

			/* body {
				background-image: url(rollerplausch.png);
				background-repeat: no-repeat;
				background-position: right bottom;
			} */

			#header {
				min-height: 220px;
			}
			
			#mpc-range {
				background: #ff4c00;
				background: -moz-linear-gradient(left,  #ff4c00 0%, #fff600 76%, #0cb700 100%);
				background: -webkit-linear-gradient(left,  #ff4c00 0%,#fff600 76%,#0cb700 100%);
				background: linear-gradient(to right,  #ff4c00 0%,#fff600 76%,#0cb700 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff4c00', endColorstr='#0cb700',GradientType=1 );
			}
			
			#mpc-range input {
				border: none !important;
			}
			</style>
	</head>

	<body class="container">
		<form action="/build/max/cfw" id="cfwform">
		
			<input type="hidden" name="version" value="DRV126" />

<!----- /////////////////////////// -->

			<div id="disclaimer" class="modal red darken-4 white-text">
				<div class="modal-content">
					<h4><i class="material-icons">warning</i> <a href="8ung.jpg" target="_BLANK">ACHTUNG!</a> GEFAHR!</h4>

					<b><u>Bitte beachte, dass Modifikationen an deinem Roller zu Sch&auml;den an deinem Motor, Controller,
					K&ouml;rper und Geldbeutel f&uuml;hren k&ouml;nnen.</u></b>
					<br /><br />

					<b>Wir raten ausdr&uuml;cklich von der Benutzung dieses Tools ab. Jegliche &Auml;nderungen passieren auf Deine eigene Verantwortung.</b>
					Das RollerPlausch-Team &uuml;bernimmt keine Garantien zur Eignung und Fehlerfreiheit dieses Tools.
					<br /><br />

					Je nach rechtlicher Lage in deinem Land k&ouml;nnen einige dieser Einstellungen zum Erl&ouml;schen der Fahrgenemigung deines Rollers f&uuml;hren.
					<br />
					Eine Erh&ouml;hung der maximalen Geschwindigkeit f&uuml;hrt in Deutschland zum Erl&ouml;schen der Allgemeinen Betriebserlaubnis (ABE).
					Der Roller darf in diesem Zustand nur auf Privatgel&auml;nde benutzt werden!
				</div>
				<div class="modal-footer red darken-2 white-text">
					<a href="#!" class="modal-close btn-flat white-text">Fortfahren</a>
				</div>
			</div>

			<div class="row">
				<ul class="collapsible col s12 m12">
					<li class="active">
						<div class="collapsible-header"><i class="material-icons">favorite</i>Willkommen</div>
						<div class="collapsible-body">
							<p><b>Willkommen im RollerPlausch Custom Firmware Generator f&uuml;r den Segway-Ninebot Max G30(D).</b><br /><br />
							Diese Version des Firmware-Generators stellt eine vereinfachte Version f&uuml;r User, die einfach nur fahren m&ouml;chten ohne sich mit den Details zu besch&auml;ftigen, bereit.
							Falls du bereits erfahrener User bist, kannst du <a href="/advanced">hier</a> zur erweiterten Version wechseln.</p>
							
							<p><b>Dieses Tool basiert auf der Arbeit vieler Communitymitglieder. 
							<br />Falls du m&ouml;chtest, spende ihnen doch etwas in die Kaffeekasse.</b></p>

							<a href="https://paypal.me/BotoXbz" target="_BLANK" class="chip tooltipped" data-tooltip="Creator of M365 CFW Toolkit"><img src="https://github.com/BotoX.png"> BotoX</a>
							<a href="https://www.paypal.me/majsinko" target="_BLANK" class="chip tooltipped" data-tooltip="CFW Scripting"><img src="https://github.com/majsi.png"> majsi</a>
							<a href="https://www.paypal.me/camialfa" target="_BLANK" class="chip tooltipped" data-tooltip="Creator of ES downG & M365 downG"><img src="downg.png"> CamiAlfa</a>
							<a href="https://paypal.me/scooterhacking" target="_BLANK" class="chip tooltipped" data-tooltip="Backend maintainer"><img src="scooterhacking.png"> ScooterHacking.org</a>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">format_list_bulleted</i>Changelog</div>
						<div class="collapsible-body">
							<p><b>2020-01-19:</b> Release version</p>
							<p><b>2020-01-18:</b> Pre-release version</p>
						</div>
					</li>				
					<li>
						<div class="collapsible-header"><i class="material-icons">settings_input_composite</i>Basics</div>
						<div class="collapsible-body">
							<p>
								<label><input type="checkbox" name="remove_charging_mode" /><span>Lademodus entfernen</span></label><br />
								Diese Einstellung deaktiviert die Ladeanzeige, wenn der Roller aufgeladen wird. Dies ist notwendig, falls an deinem Roller ein <a href="https://rollerplausch.fandom.com/de/wiki/Zusatzakku_verbauen_G30/D" target="_BLANK">Zusatzakku per Y-Kabel</a> installiert ist.
							</p>
							<p>
								<label><input type="checkbox" name="version_spoofing" /><span>Updatepopup umgehen</span></label><br />
								&Uuml;bermittelt der Segway-Ninebot App eine h&ouml;here Versionsnummer, um Firmwareupdate-Benachrichtigungen zu vermeiden.
							</p>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">whatshot</i>Motorparameter</div>
						<div class="collapsible-body">
							<h6><b>Motorkonstante</b></h5>
							<p><b>Die Motorkonstante steuert den maximalen Stromfluss und damit die Beschleunigung.</b><br />
							Der Wert hat keinen Einfluss auf die H&ouml;chstgeschwindigkeit.<br />
							<br />
							<i>Alle w&auml;hlbaren Werte sind getestet und verursachten bei den getesteten Rollern keine Sch&auml;den. In Kombination mit anderen Faktoren wie erh&ouml;hten Umgebungstemperaturen (bspw. im Sommer) oder Unterschiede in der Komponentenqualit&auml;t k&ouml;nnen Probleme jedoch nicht ausgeschlossen werden.</i>
							<br /></p>
							<p class="range-field" id="mpc-range">
							  <input type="range" class="white" name="motor_power_constant" id="mpc" min="42000" max="55000" value="51575" step="1000" />
							  <span class="left"><b>42000</b> | < mehr Power</span><span class="right">mehr Reichweite > | <b>55000</b></span>
							</p>
							
							<br /><br />
							
							<h6><b>H&ouml;chstgeschwindigkeit</b></h5>
							<p><b>Steuert die maximale Geschwindigkeit, welche die Firmware zul&auml;sst.</b><br />
							<br /></p>
							<i>Geschwindigkeiten &uuml;ber 20 km/h erfordern die <a href="https://rollerplausch.fandom.com/de/wiki/Firmware_flashen_G30/D#Vorgang_f.C3.BCr_die_.C3.84nderung_der_Seriennummer" target="_BLANK">&Auml;nderung der Seriennummer</a>, um zu greifen. Die praktisch maximale Geschwindigkeit, die der Roller ohne Modifikation der Spannung erreichen kann, betr&auml;gt bei vollem Akku ca. 33 km/h. Limitierung auf ca. 32 km/h resultiert in einem smootheren Fahrverhalten.</i>
							<p class="range-field" id="vmax-range">
							  <input type="range" name="speed_normal_kmh" class="white" id="vmax" min="10" max="40" value="20" step="1" />
							  <span class="left"><b>10 km/h</b></span><span class="right"><b>40 km/h</b></span>
							</p>
							
							<br /><br />
							
							<h6><b>Startgeschwindigkeit</b></h5>
							<p><b>Geschwindigkeit, die erreicht sein muss, bevor der Motor aktiviert.</b><br /></p>
							<p class="range-field" id="startspeed-range">
							  <input type="range" name="motor_start_speed" class="white" id="mpc" min="1" max="10" value="5" step="1" />
							  <span class="left"><b>1 km/h</b></span><span class="right"><b>10 km/h</b></span>
							</p>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">loupe</i>Tempomat</div>
						<div class="collapsible-body">
							<h6><b>Wartezeit</b></h5>
							<p><b>Wartezeit, bis Tempomat aktiviert wird.</b><br />
							<br />
							<p class="range-field" id="vmax-range">
							  <input type="range" name="cruise_control_delay" class="white" id="cruise-delay" min="1" max="10" value="5" step="1" />
							  <span class="left"><b>1 Sekunde</b></span><span class="right"><b>10 Sekunden</b></span>
							</p>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">settings</i>Experimentelle Optionen</div>
						<div class="collapsible-body">
							<b>Die folgenden Optionen sind mit Vorsicht zu genie&szlig;en.</b>
						
							<p>
								<label><input type="checkbox" name="stay_on_locked" /><span>Unendlicher Sperrmodus</span></label><br />
								In der Standardeinstellung schaltet sich ein per App gesperrter Roller nach einer Stunde automatisch aus. Diese Einstellung unterbindet dieses Verhalten.
							</p>
							<p>
								<label><input type="checkbox" name="bypass_BMS"/><span>Betrieb ohne Ninebot-Batterie zulassen</span></label><br />
								Erlaubt die Benutzung einer beliebigen Batterie. Deaktiviert die Akkustandsanzeige!
							</p>
							<p>
								<label><input type="checkbox" name="throttle_alg" /><span>Stromst&auml;rkenbasierte Gasannahme (Current-based Throttle)</span></label><br />
								&Auml;ndert den Algorithmus, der die Eingaben des Gashebels interpretiert so, dass direkt der Stromfluss zum Motor gesteuert wird, anstatt die maximale Geschwindigkeit zu steuern. Dies erlaubt auch ohne Seriennummernwechsel eine h&ouml;here Maximalgeschwindigkeit.<br />
								<b>Achtung: F&uuml;hrt bei unsachgem&auml;&szlig;er Benutzung zu Motor- und Controllerschaden. Bei erreichen der Maximalgeschwindigkeit wird der Stromfluss nicht automatisch reduziert; gehst du nicht vom Gas, verheizt du Strom im Motor, was zu &Uuml;berhitzung f&uuml;hrt.</b>
							</p>
						</div>
					</li>
					<li>
						<div class="collapsible-header"><i class="material-icons">check</i>Fertig!</div>
						<div class="collapsible-body">					
							<b>Zufrieden mit deinen Einstellungen?</b>
							<br /><br />
							<a href="#" onclick="document.getElementById('cfwform').submit()" class="waves-effect waves-light btn"><i class="material-icons right">build</i>Firmware bauen</a>
						</div>
					</li>
				</ul>
			</div>

<!----- /////////////////////////// -->

				<br><br>


				</div>
			</div>
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

			<script>
				$(document).ready(function(){
					$('.collapsible').collapsible();

					$('.modal').modal({ dismissible: false });
					$('#disclaimer').modal('open');

					$('.tooltipped').tooltip();
				});
			</script>
		</form>
	</body>
</html>
