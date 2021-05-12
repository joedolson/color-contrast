<?php
// TRANSLATION FILE. Translate and save copy as language id: e.g. en.php. Enter new language into available languages array.
// General Purpose Warnings

$no_color_selected = "請輸入欲檢測的色彩";
//Please submit a color to test against.

$processing_limit = "這台伺服器肩負著運算重擔, 因此本檢測所能允許的最小間隔尺寸為 <strong>15</strong>. 如果你想要在自己的伺服器上執行本檢測, 請用英文<a href=\"/contact.php\">向我要</a>一份腳本副本吧.";
//Due to the processing burden on the server, <strong>15</strong> is the finest granularity permitted in this test. If you'd like to run this on your own server, <a href=\"/contact.php\">contact me</a> for a copy of the script.

// General Description of Color Contrast Tester

$page_description = "這個檢測讓你看看你所挑選的色彩, 與一系列色彩頻譜組合的結果. 色彩頻譜會按照通過網頁內容親和力方針 (WCAG) 第一版或第二版與否, 來分組排列.";
//This test allows you to see a spectrum of color combinations with a color of your choice. The spectrum is sorted into groups which pass or fail the color contrast tests specified in the Web Content Accessibility Guidelines (WCAG) versions 1 and 2.

// In-page navigation link texts to jump to results

$link_text_wcag_pass = "通過 <abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 驗證的</a>";
//<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> Valid</a>
$link_text_close = "接近的組合";
//Close Combinations
$link_text_fail_diff = "僅未通過色彩差異檢測的";
//Failed Color Difference Tests
$link_text_fail_diff_wcag2 = "未通過的色差無法由 <abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 2 得知.";
//Failed Difference is not a <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2 test.
$link_text_fail_bright = "僅未通過色彩亮度對比檢測的";
//Failed Color Brightness Tests
$link_text_fail_bright_wcag2 = "未通過的亮度對比無法由 <abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 2 得知.";
//Failed Brightness is not a <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2 test.
$link_text_fail_wcag1 = "色彩差異及亮度對比檢測均未通過的";
//Failed Both Difference and Brightness Color Tests
$link_text_fail_wcag2 = "未通過明度比檢測的";
//Failed Luminosity Ratio Test
$link_text_reset = "重設檢測結果";
//Reset test results

// Name of file for form action

$file_name = "color-contrast-tester"; // Exclude file extension

// Form fields (values, labels, and legends.)

$legend_values = "檢測數值";
//Values to Test

$label_color = "欲檢測的色彩 (六碼, 格式為 RRGGBB, 以 16 進位制表示)";
//Color to test (6 characters, hexadecimal)
$label_granularity = "色彩間隔";
//Color Granularity

$value_gran1 = "極佳 (共檢測 4913 種組合)";
//Very Fine (tests 4913 combinations)
$value_gran2 = "佳 (共檢測 1331 種組合)";
//Fine (tests 1331 combinations)
$value_gran3 = "中等 (共檢測 343 種組合)";
//Medium (tests 343 combinations)
$value_gran4 = "粗糙 (共檢測 125 種組合)";
//Coarse (tests 125 combinations)
$value_gran5 = "非常粗糙 (共檢測 64 種組合)";
//Very Coarse (tests 64 combinations)

$legend_results = "欲顯示的結果";
//Results to Display

$label_pass = "顯示通過 <abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 驗證的組合";
//Display <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> Valid Combinations
$label_partial = "顯示幾乎通過的組合 (色彩差異介於 400 與 500 之間的)";
//Display Near-pass Combinations (Brightness between 400 and 500)
$label_fail_diff = "顯示未通過色彩差異檢測的組合";
//Display Combinations failing the Color Difference test
$label_fail_bright = "顯示未通過色彩亮度對比檢測的組合";
//Display combinations failing the Color Brightness test
$label_fail_both = "顯示未通過所有 WCAG 1 檢測或 WCAG 2 明度比檢測的組合";
//Display combinations failing both WCAG 1 tests or the WCAG 2 Luminosity Ratio test

$legend_test = "測試類型";
//Test Type

$label_test_wcag1 = "<abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 1: 色彩差異及亮度對比檢測";
//<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1: Color Difference and Brightness Tests
$label_test_wcag2 = "<abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 2: 對比值/相對明度檢測";
//<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2: Contrast Ratio/Relative Luminance Test

$button_text = "檢測色彩";
//Test Color

// Alternative texts for output images.


$alt_pass_bright = "通過亮度對比檢測";
//Passes Brightness Test
$alt_fail_bright = "未通過亮度對比檢測";
//Fails Brightness Test

$alt_pass_diff = "通過色差檢測";
//Passes Difference Test
$alt_part_diff = "未完全通過色差檢測";
//Partial Pass Difference Test
$alt_fail_diff = "未通過色差檢測";
//Fails Difference Test

$alt_pass_lumi3 = "通過明度比檢測 (等級 3)";
//Passes Luminosity Ratio Test (Level 3)
$alt_pass_lumi2 = "通過明度比檢測 (等級 2)";
//Passes Luminosity Ratio Test (Level 2)
$alt_pass_lumi1 = "通過明度比檢測 (等級 1)";
//Passes Luminosity Ratio Test (Level 1)
$alt_part_lumi = "若為大字則有可能通過明度比檢測";
//May Pass Luminosity Ratio Test for Large Text
$alt_fail_lumi = "未通過明度比檢測";
//Fails Luminosity Ratio Test

// Headings, descriptions, and response messages for test results.

// Table header cells (common through all tests)

$th_color_tested = "受測的色彩";
//Color Tested
$th_contrast_samples = "對比範例";
//Contrast Samples
$th_bright = "亮度對比";
//Brightness
$th_diff = "色差";
//Difference
$th_lumi = "明度比";
//Luminosity Ratio

// Valid WCAG 1 Combinations

$heading_valid_comb = "通過檢測的色彩組合";
//Valid Color Combinations
$table_summary_valid = "本表格列出了與指定色彩組合後能通過 WCAG 檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of WCAG valid color combinations with 

$response_novalid_fail = "指定色彩與任何色彩的組合, 都無法通過 WCAG 所指定的檢測 %s"; // script replaces %s with hex color 
//No color combinations tested pass WCAG specifications using the color specified

// Close or partial combinations under WCAG 1 Difference Test

$heading_partial_comb = "接近的組合";
//Close Combinations
$description_partial_comb = "雖然官方的 WCAG 設定 500 為色彩差異閾值, 但是 HP 色彩對比工具卻將閾值設為 400. 400 與 500 之間的範圍對網站來說仍有可能是具有親和力的, 因為過高的對比值可能會<a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">閱讀障礙者帶來困擾</a>.";
//Although 500 is the official WCAG threshold for color difference, 400 is the threshold set by the HP Color Contrast tool. The boundary area between 400 and 500 may be acceptable for your site as very high contrast ratios can be a <a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">problem for dyslexic visitors.</a>
$table_summary_partial = "本表格列出了與指定色彩組合後雖未能通過 WCAG 1 檢測, 但仍可能可以使用的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which are not valid according to WCAG 1 but may be usable with 

$response_nopartial_fail = "找不到任何色彩組合能通過所需的亮度對比, 並且色彩差異在 400 到 500 之間.";
//No color combinations were found with valid brightness and a color difference between 400 and 500

// Difference Failures

$heading_difference_fail = "僅未通過色彩差異檢測的";
//Failed Difference
$description_difference_fail = "這些色彩組合僅未通過色彩差異檢測.";
//These color combinations fail only on the color difference test
$table_summary_diff_fail = "本表格列出了與指定色彩組合後, 未能通過色彩差異檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which fail the color difference test with 

$response_nodiff_fail = "沒有任何色彩組合僅未通過色彩差異檢測.";

// Brightness Failures

$heading_fail_bright = "僅未通過色彩亮度對比檢測的";
$description_fail_bright = "這些色彩組合僅未通過亮度對比檢測.";
$table_summary_bright_fail = "本表格列出了與指定色彩組合後, 未能通過色彩亮度對比檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which fail the color brightness test with

$response_nobright_fail = "沒有任何色彩組合僅未通過色彩亮度對比檢測.";
//No color combinations failed only the color brightness test.

// Brightness & Difference Failures

$heading_fail_both_wcag1 = "色彩差異及亮度對比檢測均未通過的";
//Failed Both Brightness and Difference Tests
$description_fail_both_wcag1 = "這些色彩組合未通過任何 <abbr title=\"網頁內容親和力方針, Web Content Accessibility Guidelines\">WCAG</abbr> 1 檢測.";
//These combinations fail both the <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1 tests.
$table_summary_fail_both_wcag1 = "本表格列出了與指定色彩組合後, 色彩差異及亮度對比檢測均未通過的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which fail both the color difference and color brightness tests with

$response_noboth_fail = "沒有任何色彩組合完全未通過色彩差異及亮度對比檢測.";
//No color combinations failed both the difference and brightness tests.

// WCAG 2 Valid

$heading_wcag2_pass = "通過驗證的色彩組合";
//Valid Color Combinations
$table_summary_wcag2_pass = "本表格列出了與指定色彩組合後, 通過 WCAG 2 色彩對比檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which pass the WCAG 2 color contrast test with

$response_nowcag21_pass = "對於所指定的色彩來說, 沒有任何色彩組合通過 WCAG 2 規格的檢測";
//No color combinations tested pass WCAG 2 specifications using the color specified

// WCAG 2 Questionable/Possible Combinations

$heading_wcag2_close = "可能的組合";
//Possible Combinations
$description_wcag2_close = "<abbr title=\"網頁內容親和力方針, web content accessibility guidelines\">WCAG</abbr> 2 對可接受的對比值設定了兩條方針. 下表所列出的色彩組合對於大字及標題來說是可接受的, 但對較小的文字來說則<em>不可</em>接受.";
//The <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 guidelines set two guidelines for acceptable contrast ratios. This table contains color combinations which are acceptable for large print and headings, but <em>not</em> for smaller text.
$table_summary_wcag2_close = "本表格列出了與指定色彩組合後, 在某些情況下通過 WCAG 2 色彩對比檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which may pass the WCAG color contrast test in some circumstances with

$response_nowcag2_close = "找不到任何色彩組合, 其明度比介於 3:1 與 5:1 之間.";
//No color combinations were found with a luminosity ratio between 3:1 and 5:1.

// WCAG 2 Failures

$heading_wcag2_fail = "未通過 <abbr title=\"網頁內容親和力方針, web content accessibility guidelines\">WCAG</abbr> 2 對比方針的";
//Failed <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 Contrast Guidelines
$description_wcag2_fail = "這些色彩組合的明度比均小於 3:1.";
//These combinations have a luminosity ratio less than 3:1.
$table_summary_wcag2_fail = "本表格列出了與指定色彩組合後, 未通過色彩差異檢測的色彩. 此指定色彩為: %s"; // script replaces %s with hex color 
//Table of color combinations which fail the color difference test with

$response_nowcag2_fail = "沒有任何色彩組合的明度比低於 3:1.";
//No color combinations had a luminosity ratio below 3:1.
?>