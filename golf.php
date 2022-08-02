<?php
require_once __DIR__ . '/vendor/autoload.php';
use SevenEcks\StringUtils\StringUtils;
use SevenEcks\Ansi\Colorize;

$su = new StringUtils;
$su->tell("Enter multiple lines, when finished entered a '.' on its own line: ");
$strings = [];
while (($string = readline()) != '.') {
    $strings[] = $string; 
}
if (!$strings) {
    $strings[] = 'As the engineering Manager and tech lead for the team he did a great job with the project and the result was that the company made zillions of moneies.';
    $su->tell($su->colorize->red('No Input detected, golfing with sample text:'));
}
$su->tell('Golfing the following:');
$su->tell_lines($su->massColor($strings, 'yellow'));
$search = [
    'without',
    'with out',
    ' with ',
    ' and ',
    'tech lead',
    'engineering manager',
    'department',
    'product manager',
    'subject matter expert',
    'work from home',
    'engineering',
    'organization',
    '  ',
    'one on ones',
    'one on one',
    'front end',
    'javascript',
    'time to first comment',
    'technology',
    '2021',
    'number',
    'SF Buy',
    'Storefront',
    'Dipesh',
    'Mike',
    'Sharvari',
    'Kevin',
    'Cart and Checkout',
    'Cart & Checkout',
    'Corefunnel',
    'Core Funnel',
    'Wayfair',
    'crossfunctional',
    'cross functional',
    'cross-functional',
];

$replace = [
    'w/o',
    'w/o',
    ' w/ ',
    ' & ',
    'TL',
    'EM',
    'dept',
    'PM',
    'SME',
    'WFH',
    'eng',
    'org',
    ' ',
    '1:1s',
    '1:1',
    'FE',
    'JS',
    'TTFC',
    'tech',
    '\'21',
    '#',
    'Buy',
    'SF',
    'He',
    'He',
    'She',
    'He',
    'C&C',
    'C&C',
    'CF',
    'CF',
    'WF',
    'x-functional',
    'x-functional',
    'x-functional',
];
$golfed_strings = [];
$total_golfed = 0;
foreach ($strings as $string) {
    $before_length = strlen($string);
    $golfed_string = str_ireplace($search, $replace, $string);
    $after_length = strlen($golfed_string);
    $total_golfed = $total_golfed + ($before_length - $after_length);
    $golfed_strings[] = $golfed_string;
}
$su->tell_lines($su->massColor($golfed_strings, 'green'));
$su->tell('Golfed ' . $total_golfed . ' chars.');
