# creditCardGenerator

This class uses Luhn algoritm for generating valid credit cards number.

https://en.wikipedia.org/wiki/Luhn_algorithm

You can choose bin and this class will find correct numbers and return it in the array.

https://en.wikipedia.org/wiki/Bank_card_number

Package is available by composer:

composer require jacek-9999/credit-card-generator

Usage example:

require('creditCardGenerator.php');

$genCC = new creditCardGenerator();

$genCC->setBin(123);

$output = $genCC->getCC();

print_r($output);
