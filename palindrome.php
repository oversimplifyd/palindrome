<?php
/*
    isPalindromable(String inp) -> Boolean
    True if the inputted string can be permutated to a palidrome; else false.
    Ex.
        isPalindromable("abab") -> True # Can be turned into a palindrome
        isPalindromable("amanaplanacanalpanama") -> True # Can be turned into a palindrome (already one)

        isPalindromable("bbbaaa") -> False # Cannot be turned into a palindrome
        
    Note: There is no need to tell me what the string would look like as a palindrome
    Rules: (what makes a palindromable word):
    Frequency of characters matters...
    1. >1 odd grouping -> False
        
*/

// Returm true if palindrome; otheriwse false
function is_palindrome($string){
    // Forces the string to lowercase, making it case insensitive
    $string = strtolower($string);

    return strrev($string) === $string;
}

/*function isPalindromable($string) {
    $string = strtolower($string);
    $stringArray = str_split($string);

    $strLength = count($stringArray);

    for($i = 0; $i <= $strLength -1; $i++) {
        for ($j = 0; $j <= $strLength - 1; $j++) {
            $tempArray = $stringArray;
            $tempArray[$i] = $stringArray[$j];
            $tempArray[$j] = $stringArray[$i];

            if (is_palindrome(implode('', $tempArray)))
                return true;
        }
    }
    return false;
}*/

function isPalindromable($string) {
    $string = strtolower($string);
    $stringArray = str_split($string);

    $strLength = count($stringArray);

    $groups = [];

    for($i = 0; $i <= $strLength -1; $i++) {
        if (isset($groups[$stringArray[$i]])) {
            $groups[$stringArray[$i]] = $groups[$stringArray[$i]] + 1;
        } else {
            $groups[$stringArray[$i]] = 1;
        }
    }

    return countOdds($groups) < 2;
}

function countOdds(array $groups)
{
    $oddCount = 0;
    foreach($groups as $group => $count) {
        if ($count % 2 !== 0)
            $oddCount++;
    }

    return $oddCount;
}

print_r("t".isPalindromable('bbaaa')); // (even) bb  (odd) aaa => True
print_r("f".isPalindromable('bababa')); // (odd) bbb  (odd) aaa => False
print_r("t".isPalindromable('bbaaaa')); // (even) bb (even)aaaa => True
print_r("t".isPalindromable('aba')); // (even) aa (odd) b => True
print_r("t".isPalindromable('abbac')); // (even) aa (even) bb (odd) c => True
print_r("f".isPalindromable('abbacd')); // (even) aa (even) bb (odd) c (odd) d => False
print_r("f".isPalindromable('abbacde')); // (even) aa (even) bb (odd) c (odd) d (odd) e => False
print_r("t".isPalindromable('aaa')); // (odd) aaa => True

?>

