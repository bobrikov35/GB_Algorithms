<?php


const BRACKETS_DICTIONARY = [
    ']' => '[',
    ')' => '(',
    '}' => '{',
];

const STRING_BRACKETS = [ '"', "'" ];


function verifyBrackets(string $source): bool
{
    $openBrackets = array_values(BRACKETS_DICTIONARY);
    $closeBrackets = array_keys(BRACKETS_DICTIONARY);
    $stack = new SplStack();
    $string = false;
    foreach (mb_str_split($source) as $char) {
        if (in_array($char, STRING_BRACKETS)) {
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
        if ($stack->isEmpty() or $stack->pop() != BRACKETS_DICTIONARY[$char]) {
            return false;
        }
    }
    return $stack->isEmpty();
}


$test = false;

if ($test) {

    $list = [
        '"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"',     // => true
        '((a + b) / c) - 2',                                                                    // => true
        '"([строка)"',                                                                          // => true
        '"(")',                                                                                 // => false
        '"Тут} {" ({[нет] ({})}ошибки)',                                                        // => true
        'Здесь} { ({[] ({})}ошибка',                                                            // => false
    ];
    echo 'Соответствие скобок в строках:' . PHP_EOL;
    foreach ($list as $str) {
        if (verifyBrackets($str)) {
            echo "{$str} => соответствует" . PHP_EOL;
        } else {
            echo "{$str} => не соответствует" . PHP_EOL;
        }
    }

}
