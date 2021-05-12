<?php
// TRANSLATION FILE. Translate and save copy as language id: e.g. en.php. Enter new language into available languages array.
// General Purpose Warnings

$no_color_selected = "Soumettez une couleur pour effectuer un nouveau test.";

$processing_limit = "En raison de la charge de traitement serveur, la granularité la plus fine permise pour ce test est de <strong>15</strong>. Si vous désirez installer ce script sur votre propre serveur, <a href=\"/contact.php\">contactez moi</a> pour obtenir une copie du script.";

// General Description of Color Contrast Tester

$page_description = "Ce test vous permet de tester des combinaisons de couleurs en utilisant la couleur de votre choix. Ces combinaisons sont classées en groupes conformes ou non conformes aux tests de contraste de couleurs tels que spécifiés dans les directives pour l'accessibilité des contenus web (<abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr>) 1 et 2.";

// In-page navigation link texts to jump to results

$link_text_wcag_pass = "Conforme <abbr title=\"Web Content Accessibility Guidelines\" lang=\"en\">WCAG</abbr></a>";
$link_text_close = "Combinaisons presque conforme";
$link_text_fail_diff = "Non conforme au test de différence de couleurs";
$link_text_fail_diff_wcag2 = "La non conformité au test de différences de couleurs n'est pas un test <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2.";
$link_text_fail_bright = "Non conforme au test d'intensité de couleurs";
$link_text_fail_bright_wcag2 = "La non conformité au test d'intensité de couleurs n'est pas un test <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr>.";
$link_text_fail_wcag1 = "Non conforme aux tests de différences et d'intensité de couleurs";
$link_text_fail_wcag2 = "Non conforme au test de ratio de luminosité";
$link_text_reset = "Remettre à zéro les résultats";

// Name of file for form action

$file_name = "color-contrast-tester"; // Exclude file extension

// Form fields (values, labels, and legends.)

$legend_values = "Valeurs à tester";

$label_color = "Couleur à tester (6 caractères, hexadécimal)";
$label_granularity = "Granularité des couleurs";

$value_gran1 = "Très fine (test 4913 combinaisons)";
$value_gran2 = "Fine (test 1331 combinaisons)";
$value_gran3 = "Moyenne (test 343 combinaisons)";
$value_gran4 = "Faible (test 125 combinaisons)";
$value_gran5 = "Très faible (test 64 combinaisons)";

$legend_results = "Résultats à afficher";

$label_pass = "Afficher les combinaisons conformes <abbr lang=\"en\" title=\"Web Content Accessibility Guidelines\">WCAG</abbr> ";
$label_partial = "Afficher les combinaisons presque conformes  (intensité entre 400 et 500)";
$label_fail_diff = "Afficher les combinaisons non conformes au test de différences des couleurs";
$label_fail_bright = "Afficher les combinaisons non conformes au test d'intensité des couleurs";
$label_fail_both = "Afficher les combinaisons non conformes aux tests <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1 ou aux ratios de luminosité <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2";

$legend_test = "Type de tests";

$label_test_wcag1 = "<abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1: tests de différences de couleurs et d'intensité";
$label_test_wcag2 = "<abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2: tests de ratio de luminosité";

$button_text = "Tester la couleur";

// Alternative texts for output images.


$alt_pass_bright = "Conforme au test d'intensité";
$alt_fail_bright = "Non conforme au test d'intensité";

$alt_pass_diff = "Conforme au test de différences";
$alt_part_diff = "Conformité partielle au test de différences";
$alt_fail_diff = "Non conforme au test de différences";

$alt_pass_lumi3 = "Conforme au test de ratio de luminosité (Niveau 3)";
$alt_pass_lumi2 = "Conforme au test de ratio de luminosité (Niveau 2)";
$alt_pass_lumi1 = "Conforme au test de ratio de luminosité (Niveau 1)";
$alt_part_lumi = "Conformité possible au test de ratio de luminosité pour les caractères de grande taille";
$alt_fail_lumi = "Non conforme au test de ratio de luminosité";

// Headings, descriptions, and response messages for test results.

// Tableau header cells (common through all tests)

$th_color_tested = "Couleurs Testées";
$th_contrast_samples = "Exemples de Contraste";
$th_bright = "Intensité";
$th_diff = "Différence";
$th_lumi = "Ratio de luminosité";

// Valid WCAG 1 Combinations

$heading_valid_comb = "Combinaisons de couleurs conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1";
$Tableau_summary_valid = "Tableau des combinaisons de couleurs conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1 avec %s"; // script replaces %s with hex color 

$response_novalid_fail = "Aucune combinaison testée n'est conforme aux spécifications <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1 avec la couleur spécifiée %s"; // script replaces %s with hex color 

// Close or partial combinations under <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1 Difference Test

$heading_partial_comb = "Combinaisons presque conformes";
$description_partial_comb = "Bien que 500 soit le seuil officiel <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> pour la différence de couleurs, 400 est le seuil défini par l'outil de contraste de couleur de HP. Les valeurs situées entre les seuils de 400 et 500 peuvent être acceptables pour votre site puisque des valeurs de contrastes élevées peuvent être un <a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">problème pour les visiteurs dyslexiques.</a>";
$Tableau_summary_partial = "Tableau des combinaisons de couleurs non conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 1 mais qui pourraient être utilisables avec %s"; // script replaces %s with hex color 

$response_nopartial_fail = "Aucune combinaison de couleurs avec une intensité conforme et une différence de couleurs entre 400 et 500.";

// Difference Failures

$heading_difference_fail = "Différence non conforme";
$description_difference_fail = "Ces combinaisons de couleurs sont non conformes uniquement au test de différences de couleurs.";
$Tableau_summary_diff_fail = "Tableau des combinaisons de couleurs non conformes au test de différences de couleurs avec %s"; // script replaces %s with hex color 

$response_nodiff_fail = "Aucun combinaison de couleurs non conforme uniquement au test de différences de couleurs.";

// Brightness Failures

$heading_fail_bright = "Intensité non conforme";
$description_fail_bright = "Ces combinaisons de couleurs sont non conformes uniquement au test d'intensité de couleurs.";
$Tableau_summary_bright_fail = "Tableau des combinaisons non conformes au test d'intensité de couleurs avec %s"; // script replaces %s with hex color 

$response_nobright_fail = "Aucun combinaison de couleurs non conforme uniquement au test d'intensité de couleurs.";

// Brightness & Difference Failures

$heading_fail_both_wcag1 = "Intensité et différence non conforme";
$description_fail_both_wcag1 = "Ces combinaisons sont non conformes aux tests d'intensité et de différences <abbr lang=\"en\" title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1.";
$Tableau_summary_fail_both_wcag1 = "Tableau des combinaisons de couleurs non conformes aux tests d'intensité et de différences avec %s"; // script replaces %s with hex color 

$response_noboth_fail = "Aucune combinaison de couleurs non conforme aux tests d'intensité et de différences.";

// WCAG 2 Valid

$heading_wcag2_pass = "Combinaison de couleurs conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2";
$Tableau_summary_wcag2_pass = "Tableau des combinaisons conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2 avec %s"; // script replaces %s with hex color 

$response_nowcag21_pass = "Aucune combinaison de couleurs n'est conforme aux spécifications <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2 en utilisant la couleur spécifiée";

// WCAG 2 Questionable/Possible Combinations

$heading_wcag2_close = "Combinaisons presque conforme <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2";
$description_wcag2_close = "Les directives <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2 définissent deux directives de ratio de contraste acceptables. Ce tableau contient les combinaisons de couleurs qui sont acceptables pour les caractères de grande taille mais <em>pas</em> pour les caractères de petite taille.";
$Tableau_summary_wcag2_close = "Tableau des combinaisons de couleurs presque conformes <abbr lang=\"en\" title=\"web content accessibility guidelines\">WCAG</abbr> 2 avec %s"; //script replaces %s with hex color 

$response_nowcag2_close = "Aucune combinaison de couleurs n'a un ratio de luminosité entre 3:1 et 5:1.";

// WCAG 2 Failures

$heading_wcag2_fail = "Non conforme aux directives de contraste <abbr lang=\"en\ title=\"web content accessibility guidelines\">WCAG</abbr> 2";
$description_wcag2_fail = "Ces combinaisons ont un ratio de luminosité inférieur à 3:1.";
$Tableau_summary_wcag2_fail = "Tableau des combinaisons de couleurs non conformes <abbr lang=\"en\ title=\"web content accessibility guidelines\">WCAG</abbr> 2 avec %s"; // script replaces %s with hex color 

$response_nowcag2_fail = "Aucune combinaison de couleur n'a un ratio de luminosité inférieur à 3:1.";

$table_summary_wcag2_pass = "Table of color combinations which pass the WCAG 2 color contrast test with %s";
?>