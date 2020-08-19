<?php


class BracketsParser
{

    private const BRACKETS_DICTIONARY = [
        ']' => '[',
        ')' => '(',
        '}' => '{',
    ];
    private const STRING_BRACKETS = [ '"', "'" ];


    /**
     * Проверяет соответствие скобок и кавычек в исходной строке
     *
     * @param string $source
     * @return bool
     */
    public static function verify(string $source): bool
    {
        $dictionary = static::BRACKETS_DICTIONARY;
        $openBrackets = array_values($dictionary);
        $closeBrackets = array_keys($dictionary);
        $stack = new SplStack();
        $string = false;
        foreach (mb_str_split($source) as $char) {
            if (in_array($char, static::STRING_BRACKETS)) {
                if (!$string) {
                    $stack->push($char);
                    $string = true;
                } elseif ($char == $stack->top()) {
                    $stack->pop();
                    $string = false;
                }
                continue;
            }
            if ($string) {
                continue;
            }
            if (in_array($char, $openBrackets)) {
                if (!in_array($char, $closeBrackets)) {
                    $stack->push($char);
                    continue;
                }
                if ($char == $stack->top()) {
                    $stack->pop();
                } else {
                    $stack->push($char);
                }
                continue;
            }
            if (!in_array($char, $closeBrackets)) {
                continue;
            }
            if ($stack->isEmpty() or $stack->pop() != $dictionary[$char]) {
                return false;
            }
        }
        return $stack->isEmpty();
    }

}
