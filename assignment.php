<?php
function isValid($s)
{
    // 文字列が空の場合
    if (empty($s)) {
        return false;
    }
    // 開き括弧一時保管
    $stack = [];
    // 閉じ括弧と開き括弧の対応表
    $array = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    // 文字列1文字ずつループ
    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i]; // 文字取得

        // 開き括弧の場合
        if (in_array($char, array_values($array), true)) {
            array_push($stack, $char); // stackに保存
        }
        // stackが空、またはstackの末尾と取得した文字が対応表と等しくない場合
        else if (empty($stack) || array_pop($stack) !== $array[$char]) {
            return false;
        }
    }
    return empty($stack); // stackが空の場合true、残っていたらfalse
}

$s = '()';
var_dump(isValid($s)); // true
$s = '({)}';
var_dump(isValid($s)); // false
$s = '([]){}';
var_dump(isValid($s)); // true
$s = '(';
var_dump(isValid($s)); // false
$s = '';
var_dump(isValid($s)); // false