<?php
declare(strict_types = 1);
/**
 * @param string $text
 * @return string
 */
function sollution(string $text, $space = '_'): string
{
    $i = 0;
    $isLastLetterSpace = true;
    $isSpace = false;
    while ($i < strlen($text)) {
        $isSpace = $text[$i] === $space;

        if ($isSpace && $isLastLetterSpace) {
            $text = substr($text, 0, $i) . substr($text, $i + 1);
            continue;
        }
        $i++;
        $isLastLetterSpace = $isSpace;
    }

    if ($isSpace === true && strlen($text) > 0) {
        $text = substr($text, 0, strlen($text) - 1);
    }

    return $text;
}

