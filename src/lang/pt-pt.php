<?php
// TRANSLATION FILE. Translate and save copy as language id: e.g. en-US.php.
// General Purpose Warnings

$no_color_selected = "Por favor indique uma côr contra a qual testar.";

$processing_limit = "Devido ao peso de processamento no servidor, <strong>15</strong> é a granularidade mais baixa permitida neste teste. Se desejar testar no seu próprio servidor, <a href=\"/contact.php\">contacte-me</a> para uma cópia do script.";

// General Description of Color Contrast Tester

$page_description = "Este teste permite-lhe ver um espectro de combinação de cores com uma cor à sua escolha. O espectro é ordenado em grupos que passam ou falham os testes de contraste de cor especificados nas Web Content Accessibility Guidelines (WCAG) versões 1 e 2.";

// In-page navigation link texts to jump to results

$link_text_wcag_pass = " <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> Valido</a>";
$link_text_close = "Combinações próximas";
$link_text_fail_diff = "Testes de Contraste de Côr Falhados";
$link_text_fail_diff_wcag2 = "Teste de Contraste de côr não é um teste <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2.";
$link_text_fail_bright = "Testes de Brilho de Côr Falhados";
$link_text_fail_bright_wcag2 = "Testes Falhados de Brilho não são testes <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2.";
$link_text_fail_wcag1 = "Testes Falhados tanto em Contraste como em Brilho";
$link_text_fail_wcag2 = "Teste Falhado de Taxa de Luminosidade";
$link_text_reset = "Reiniciar resultado dos testes";

// Name of file for form action

$file_name = "color-contrast-tester"; // Exclude file extension

// Form fields (values, labels, and legends.)

$legend_values = "Valores a Testar";

$label_color = "Côr a testar (6 caracteres, hexadecimal)";
$label_granularity = "Granularidade de Côr";

$value_gran1 = "Muito fina (testa 4913 combinações)";
$value_gran2 = "Fina (testa 1331 combinações)";
$value_gran3 = "Média (testa 343 combinações)";
$value_gran4 = "Grossa (testa 125 combinações)";
$value_gran5 = "Muito grossa (testa 64 combinações)";

$legend_results = "Resultados a Mostrar";

$label_pass = "Mostrar Combinações Válidas <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr>";
$label_partial = "Mostrar Combinações Mediocres (Brilho entre 400 e 500)";
$label_fail_diff = "Mostrar combinações que falharam o teste do Contraste de Côr";
$label_fail_bright = "Mostrar combinações que falharam o teste de Brilho de Côr";
$label_fail_both = "Mostrar combinações que falharam quer os testes WCAG 1 ou  o teste de taxa de Luminosidade WCAG 2";

$legend_test = "Tipo de Teste";

$label_test_wcag1 = "<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1: Testes de Contraste e Brilho de Cor";
$label_test_wcag2 = "<abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 2: Testes Taxa de Contraste / Luminusidade Relativa";

$button_text = "Testar Côr";

// Alternative texts for output images.


$alt_pass_bright = "Passa Teste de Brilho";
$alt_fail_bright = "Falha Teste de Brilho";

$alt_pass_diff = "Passa Teste de Contraste";
$alt_part_diff = "Passa Parcialmente Teste de Contraste";
$alt_fail_diff = "Falha Teste de Contraste";

$alt_pass_lumi3 = "Passa Teste de Taxa de Luminosidade (Level 3)";
$alt_pass_lumi2 = "Passa Teste de Taxa de Luminosidade (Level 2)";
$alt_pass_lumi1 = "Passa Teste de Taxa de Luminosidade (Level 1)";
$alt_part_lumi = "Pode Passar Teste de Taxa de Luminosidade em Texto Grande";
$alt_fail_lumi = "Falha Teste de Taxa de Luminosidade";

// Headings, descriptions, and response messages for test results.

// Table header cells (common through all tests)

$th_color_tested = "Côr Testada";
$th_contrast_samples = "Amostras de Contraste";
$th_bright = "Brilho";
$th_diff = "Contraste";
$th_lumi = "Taxa de Luminosidade";

// Valid WCAG 1 Combinations

$heading_valid_comb = "Combinações Válidas de Côr";
$table_summary_valid = "Tabela de combinações válidas WCAG de côr com %s"; // script replaces %s with hex color 

$response_novalid_fail = "Nenhuma combinação de côr testada passa as especificações WCAG usando a côes especificada %s"; // script replaces %s with hex color 

// Close or partial combinations under WCAG 1 Difference Test

$heading_partial_comb = "Combinações Aproximadas";
$description_partial_comb = "Embora 500 seja o limiar oficial WCAG para contraste de cor, 400 é o limiar estabelecido pelo utilitário HP Color. A zona de fronteira entre 400 e 500 pode ser aceitável para o seu sítio visto que taxas de contraste elevadas podem ser um <a href=\"http://accessites.org/site/2006/11/designing-for-dyslexics-part-2-of-3/\">problema para visitantes disléxícos.</a>";
$table_summary_partial = "Tabela de combinações de cores que não são conformes com as WCAG 1 mas que podem ser utilizáveis com %s"; // script replaces %s with hex color 

$response_nopartial_fail = "Não foram encontradas combinações de cores com um brilho válido e um contrastre entre 400 e 500.";

// Difference Failures

$heading_difference_fail = "Contraste falhado";
$description_difference_fail = "Estas combinações de côr falham só no teste de contraste de côr.";
$table_summary_diff_fail = "Tabela de combinações de côr que falham o teste de contraste de côr com %s"; // script replaces %s with hex color 

$response_nodiff_fail = "Não há combinações de côr que só falhem o teste de contraste de côr.";

// Brightness Failures

$heading_fail_bright = "Brilho Falhado";
$description_fail_bright = "Estas combinações de côr falham só no teste de brilho.";
$table_summary_bright_fail = "Tabela de combinação de côr que falham o teste de brilho de côr com %s"; // script replaces %s with hex color 

$response_nobright_fail = "Não há combinações que côr que só falhem o teste de brilho de côr.";

// Brightness & Difference Failures

$heading_fail_both_wcag1 = "Testes de Brilho e Contraste Ambos Falhados";
$description_fail_both_wcag1 = "Estas combinações falham ambos os testes <abbr title=\"Web Content Accessibility Guidelines\">WCAG</abbr> 1.";
$table_summary_fail_both_wcag1 = "Tabela de combinações de côr que falham ambos os testes de brilho e contraste de côr com %s"; // script replaces %s with hex color 

$response_noboth_fail = "Não há nenhuma combinação de cor que falhe ambos os testes de contraste e brilho.";

// WCAG 2 Valid

$heading_wcag2_pass = "Combinações de Côr Válidas";
$table_summary_wcag2_pass = "Tabela de combinações de côr que passam o teste de contraste de côr WCAG 2 com %s"; // script replaces %s with hex color 

$response_nowcag21_pass = "Não há combinações de côr testadas que passem as especificações WCAG 2 usando a côr especificadas";

// WCAG 2 Questionable/Possible Combinations

$heading_wcag2_close = "Combinações Possíveis";
$description_wcag2_close = "As directrizes <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 estabelecem orientações para taxas de contraste admissíveis. Esta tabela contém combinações de côr que são admissíveis para textos de grande dimensão e cabeçalhos mas que o <em>não</em> são para texto mais pequeno.";
$table_summary_wcag2_close = "Tabela de combinações de côr que podem eventualmente passar o teste de contraste de côr WCAG com %s"; //script replaces %s with hex color 

$response_nowcag2_close = "Não foram encontradas combinações de côr com uma taxa de luminosidade entre 3:1 e 5:1.";

// WCAG 2 Failures

$heading_wcag2_fail = "Directrizes de Contraste <abbr title=\"web content accessibility guidelines\">WCAG</abbr> 2 Falhadas";
$description_wcag2_fail = "Estas combinações de têm uma taxa de luminosidade menor que 3:1.";
$table_summary_wcag2_fail = "Tabela de combinações de côr que falham o teste de contraste de côr com %s"; // script replaces %s with hex color 

$response_nowcag2_fail = "Nenhuma combinação de côr tem uma luminosidade inferior a 3:1.";
?>