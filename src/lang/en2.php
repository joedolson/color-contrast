<?php
// TRANSLATION FILE. Translate and save copy as language id: e.g. en-US.php. Enter new language into available languages array.
// General Purpose Warnings

$no_color_selected = "Please submit a color to test against.";

$processing_limit = "Due to the processing burden on the server, <strong>15</strong> is the finest granularity permitted in this test. If you'd like to run this on your own server, <a href=\"/contact.php\">contact me</a> for a copy of the script.";

// General Description of Color Contrast Tester

// In-page navigation link texts to jump to results

$link_text_wcag_pass = "<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> Valid</a>";
$link_text_close = "Close Combinations";
$link_text_fail_diff = "Failed Color Difference Tests";
$link_text_fail_diff_wcag2 = "Failed Difference is not a <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2 test.";
$link_text_fail_bright = "Failed Color Brightness Tests";
$link_text_fail_bright_wcag2 = "Failed Brightness is not a <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2 test.";
$link_text_fail_wcag1 = "Failed Both Difference and Brightness Color Tests";
$link_text_fail_wcag2 = "Failed Luminosity Ratio Test";
$link_text_reset = "Reset test results";

// Name of file for form action

$file_name = "color-contrast-compare"; // Exclude file extension

// Form fields (values, labels, and legends.)

$label_color = "Foreground Color (hexadecimal)";
$label_color2 = "Background Color (hexadecimal)";
$label_granularity = "Color Granularity";

$legend_results = "Results to Display";

$label_pass = "Display <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> Valid Combinations";
$label_partial = "Display Near-pass Combinations (Brightness between 400 and 500)";
$label_fail_diff = "Display Combinations failing the Color Difference test";
$label_fail_bright = "Display combinations failing the Color Brightness test";
$label_fail_both = "Display combinations failing both WCAG 1 tests or the WCAG 2 Luminosity Ratio test";

$legend_test = "Test Type";

$label_test_wcag1 = "<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1: Color Difference and Brightness Tests";
$label_test_wcag2 = "<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2: Contrast Ratio/Relative Luminance Test";

$button_text = "Compare Colors";

// Alternative texts for output images.


$alt_pass_bright = "Passes Brightness Test";
$alt_fail_bright = "Fails Brightness Test";

$alt_pass_diff = "Passes Difference Test";
$alt_part_diff = "Partial Pass Difference Test";
$alt_fail_diff = "Fails Difference Test";

$alt_pass_lumi3 = "Passes Luminosity Ratio Test (Level 3)";
$alt_pass_lumi2 = "Passes Luminosity Ratio Test (Level 2)";
$alt_pass_lumi1 = "Passes Luminosity Ratio Test (Level 1)";
$alt_part_lumi = "May Pass Luminosity Ratio Test for Large Text";
$alt_fail_lumi = "Fails Luminosity Ratio Test";

// Headings, descriptions, and response messages for test results.

// Table header cells (common through all tests)

$th_color_tested = "Color Tested";
$th_contrast_samples = "Contrast Samples";
$th_bright = "Brightness";
$th_diff = "Difference";
$th_lumi = "Luminosity Ratio";

// Valid WCAG 1 Combinations

$heading_valid_comb = "Valid Color Combinations";
$table_summary_valid = "Table of WCAG valid color combinations with %s"; // script replaces %s with hex color 

$response_novalid_fail = "No color combinations tested pass WCAG specifications using the color specified:"; // 

// Close or partial combinations under WCAG 1 Difference Test

$heading_partial_comb = "Close Combinations";
$description_partial_comb = "Although 500 is the official WCAG threshold for color difference, 400 is the threshold set by the HP Color Contrast tool. The boundary area between 400 and 500 may be acceptable for your site as very high contrast ratios can be a <a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">problem for dyslexic visitors.</a>";
$table_summary_partial = "Table of color combinations which are not valid according to WCAG 1 but may be usable with %s"; // script replaces %s with hex color 

$response_nopartial_fail = "No color combinations were found with valid brightness and a color difference between 400 and 500.";

// Difference Failures

$heading_difference_fail = "Failed Difference";
$description_difference_fail = "These color combinations fail only on the color difference test.";
$table_summary_diff_fail = "Table of color combinations which fail the color difference test with %s"; // script replaces %s with hex color 

$response_nodiff_fail = "No color combinations failed only the color difference test.";

// Brightness Failures

$heading_fail_bright = "Failed Brightness";
$description_fail_bright = "These color combinations fail only on the contrast brightness test.";
$table_summary_bright_fail = "Table of color combinations which fail the color brightness test with %s"; // script replaces %s with hex color .

$response_nobright_fail = "No color combinations failed only the color brightness test.";

// Brightness & Difference Failures

$heading_fail_both_wcag1 = "Failed Both Brightness and Difference Tests";
$description_fail_both_wcag1 = "These combinations fail both the <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1 tests.";
$table_summary_fail_both_wcag1 = "Table of color combinations which fail both the color difference and color brightness tests with %s"; // script replaces %s with hex color 

$response_noboth_fail = "No color combinations failed both the difference and brightness tests.";

// WCAG 2 Valid

$heading_wcag2_pass = "Valid Color Combinations";
$table_summary_wcag2_pass = "Table of color combinations which pass the WCAG 2 color contrast test with %s"; // script replaces %s with hex color 

$response_nowcag21_pass = "No color combinations tested pass WCAG 2 specifications using the color specified";

// WCAG 2 Questionable/Possible Combinations

$heading_wcag2_close = "Possible Combinations";
$description_wcag2_close = "The <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 guidelines set two guidelines for acceptable contrast ratios. This table contains color combinations which are acceptable for large print and headings, but <em>not</em> for smaller text.";
$table_summary_wcag2_close = "Table of color combinations which may pass the WCAG color contrast test in some circumstances with %s"; //script replaces %s with hex color 

$response_nowcag2_close = "No color combinations were found with a luminosity ratio between 3:1 and 5:1.";

// WCAG 2 Failures

$heading_wcag2_fail = "Failed <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 Contrast Guidelines";
$description_wcag2_fail = "These combinations have a luminosity ratio less than 3:1.";
$table_summary_wcag2_fail = "Table of color combinations which fail the color difference test with %s"; // script replaces %s with hex color 

$response_nowcag2_fail = "No color combinations had a luminosity ratio below 3:1.";
?>