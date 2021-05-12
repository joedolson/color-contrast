<?php
// TRANSLATION FILE. Translate and save copy as language id: e.g. en.php. Enter new language into available languages array.
// General Purpose Warnings

$no_color_selected = "Geef een kleur op om combinaties mee te testen.";

$processing_limit = "Om de server niet teveel te belasten is <strong>15</strong> de fijnste granulariteit die in deze test is toegestaan. Als u de test op uw eigen server zou willen draaien, neem dan <a href=\"/contact.php\">contact</a> met me op voor een kopie van dit script.";

// General Description of Color Contrast Tester

$page_description = "Deze test maakt het mogelijk een spectrum van kleuren te zien in combinatie met een gekozen kleur. Het spectrum is ingedeeld in groepen die wel of niet voldoen aan de kleurcombinatietests die zijn gespecificeerd in de Richtlijnen voor de Toegankelijkheid van Web Content (WCAG) versie 1 en 2.";

// In-page navigation link texts to jump to results

$link_text_wcag_pass = "Voldoend aan <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr>"; // @@@ lone closing </a> should not be here
$link_text_close = "Bijna geldige combinaties";
$link_text_fail_diff = "Onvoldoende kleurverschil";
$link_text_fail_diff_wcag2 = "Onvoldoende kleurverschil is geen test volgens <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 2.";
$link_text_fail_bright = "Onvoldoende helderheidsverschil";
$link_text_fail_bright_wcag2 = "Onvoldoende helderheidsverschil is geen test volgens <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 2.";
$link_text_fail_wcag1 = "Zowel onvoldoende kleurverschil als helderheidsverschil";
$link_text_fail_wcag2 = "Onvoldoende contrastverhouding";
$link_text_reset = "Reset testresultaten";

// Name of file for form action

$file_name = "color-contrast-tester"; // Exclude file extension

// Form fields (values, labels, and legends.)

$legend_values = "Te testen waarden";

$label_color = "Te testen kleur (6 tekens, hexadecimaal)";
$label_granularity = "Kleurgranulariteit";	// Color Granularity

$value_gran1 = "Zeer fijn (test 4913 combinaties)";
$value_gran2 = "Fijn (test 1331 combinaties)";
$value_gran3 = "Middel (test 343 combinaties)";
$value_gran4 = "Grof (test 125 combinaties)";
$value_gran5 = "Zeer grof (test 64 combinaties)";

$legend_results = "Te tonen resultaten";

$label_pass = "Toon combinaties die voldoen aan <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr>";
$label_partial = "Toon bijna geldige combinaties (helderheidsverschil tussen 400 en 500)";
$label_fail_diff = "Toon combinaties die niet voldoen aan de kleurverschiltest";
$label_fail_bright = "Toon combinaties die niet voldoen aan de helderheidsverschiltest";
$label_fail_both = "Toon combinaties die niet voldoen aan beide WCAG 1 tests en de WCAG 2 contrastverhoudingstest";

$legend_test = "Type test";

$label_test_wcag1 = "<abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 1: Kleurverschiltest en helderheidsverschiltest";
$label_test_wcag2 = "<abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 2: Contrastverhoudingstest";

$button_text = "Test kleurcombinaties";

// Alternative texts for output images.


$alt_pass_bright = "Voldoende helderheidsverschil";						// Brightness Test
$alt_fail_bright = "Onvoldoende helderheidsverschil";

$alt_pass_diff = "Voldoende kleurverschil";								// Difference Test
$alt_part_diff = "Bijna voldoende kleurverschil";
$alt_fail_diff = "Onvoldoende kleurverschil";

$alt_pass_lumi3 = "Voldoende contrastverhouding (Prioriteit 3)";			// Luminosity Ratio Test
$alt_pass_lumi2 = "Voldoende contrastverhouding (Prioriteit 2)";
$alt_pass_lumi1 = "Voldoende contrastverhouding (Prioriteit 1)";
$alt_part_lumi = "Voor grote letters mogelijk voldoende contrastverhouding";
$alt_fail_lumi = "Onvoldoende contrastverhouding";

// Headings, descriptions, and response messages for test results.

// Table header cells (common through all tests)

$th_color_tested = "Geteste kleur";				// Color Tested
$th_contrast_samples = "Voorbeelden";		// Contrast Samples
$th_bright = "Helderheidsverschil";				// Brightness
$th_diff = "Kleurverschil";						// Difference
$th_lumi = "Contrastverhouding";				// Luminosity Ratio

// Valid WCAG 1 Combinations

$heading_valid_comb = "Geldige kleurcombinaties";
$table_summary_valid = "Tabel met kleuren die volgens WCAG geldig zijn in combinatie met %s"; // script replaces %s with hex color value being compared.

$response_novalid_fail = "Er zijn geen kleuren gevonden die volgens de WCAG specificaties geldig zijn in combinatie met "; // script supplies hex color value and sample at end of text.

// Close or partial combinations under WCAG 1 Difference Test

$heading_partial_comb = "Bijna geldige combinaties";	// Close Combinations
$description_partial_comb = "Hoewel 500 de officiële WCAG drempelwaarde is voor kleurverschil, wordt in de HP Kleurcontrasttest de drempelwaarde 400 gehanteerd. Het overgangsgebied tussen 400 en 500 is voor uw site mogelijk acceptabel aangezien zeer hoge contrastverhoudingen een <a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">probleem voor dyslectische bezoekers</a> kunnen vormen.";
$table_summary_partial = "Tabel met kleuren die in combinatie met %s niet geldig zijn volgens WCAG 1 maar mogelijk wel bruikbaar zijn"; // script replaces %s with hex color value being compared.

$response_nopartial_fail = "Er zijn geen kleurcombinaties gevonden met een geldig helderheidsverschil en een kleurverschil tussen 400 en 500.";

// Difference Failures

$heading_difference_fail = "Kleurverschil onvoldoende"; // Failed Difference
$description_difference_fail = "Deze kleurcombinaties voldoen alleen niet aan de kleurverschiltest.";
$table_summary_diff_fail = "Tabel met kleuren die in combinatie met %s niet aan de kleurverschiltest voldoen"; // script replaces %s with hex color being compared.

$response_nodiff_fail = "Geen kleurcombinaties gevonden die alleen niet aan de kleurverschiltest voldoen.";

// Brightness Failures

$heading_fail_bright = "Helderheidsverschil onvoldoende";
$description_fail_bright = "Deze kleurcombinaties voldoen alleen niet aan de helderheidsverschiltest.";
$table_summary_bright_fail = "Tabel met kleuren die in combinatie met %s niet aan de helderheidsverschiltest voldoen"; // script replaces %s with hex color being compared.

$response_nobright_fail = "Geen kleurcombinaties gevonden die alleen niet aan de helderheidsverschiltest voldoen.";

// Brightness & Difference Failures

$heading_fail_both_wcag1 = "Zowel kleurverschil als helderheidsverschil onvoldoende";
$description_fail_both_wcag1 = "Deze kleurcombinaties voldoen niet aan beide <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 1 tests.";
$table_summary_fail_both_wcag1 = "Tabel met kleuren die in combinatie met %s noch aan de kleurverschiltest noch aan de helderheidsverschiltest voldoen"; // script replaces %s with hex color being compared.

$response_noboth_fail = "Geen kleurcombinaties gevonden die aan noch kleurverschiltest noch de helderheidsverschiltest voldoen.";

// WCAG 2 Valid

$heading_wcag2_pass = "Geldige kleurcombinaties";
$table_summary_wcag2_pass = "Tabel met kleuren die in combinatie met %s voldoen aan de WCAG 2 contrastverhoudingstest"; // script replaces %s with hex color being compared.

$response_nowcag21_pass = "Geen kleurcombinates gevonden die volgens de WCAG 2 specificaties geldig zijn in combinatie met de gekozen kleur";

// WCAG 2 Questionable/Possible Combinations

$heading_wcag2_close = "Mogelijke combinaties";
$description_wcag2_close = "De <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 2 richtlijnen geven twee richtlijnen voor acceptabele contrastverhoudingen. Deze tabel bevat kleurcombinaties die acceptabel zijn voor grote letters en koppen, maar <em>niet</em> voor kleinere tekst.";
$table_summary_wcag2_close = "Tabel met kleuren die in combinatie met %s in sommige omstandigheden mogelijk aan de WCAG contrastverhoudingstest voldoen"; // script replaces %s with hex color being compared.

$response_nowcag2_close = "Geen kleurcombinaties gevonden met een contrastverhouding tussen 3:1 en 5:1.";

// WCAG 2 Failures

$heading_wcag2_fail = "Contrastverhouding onvoldoende volgens <abbr title=\"Richtlijnen voor de Toegankelijkheid van Web Content\">WCAG</abbr> 2 contrastrichtlijnen";
$description_wcag2_fail = "Deze combinaties hebben een contrastverhouding van minder dan 3:1.";
$table_summary_wcag2_fail = "Tabel met kleuren die in combinatie met %s niet voldoen aan de contrastverhoudingstest"; // script replaces %s with hex color being compared.

$response_nowcag2_fail = "Geen kleurcombinaties gevonden met een contrastverhouding lager dan 3:1.";
?>