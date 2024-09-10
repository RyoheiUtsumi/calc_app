<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller

{
 public function result($value1, $operator, $value2)
    {
        // 演算の結果を格納する変数
        $result = null;

        // 四則演算の処理
        switch ($operator) {
            case 'addition':
                $result = $value1 + $value2;
                break;
            case 'subtraction':
                $result = $value1 - $value2;
                break;
            case 'multiplication':
                $result = $value1 * $value2;
                break;
            case 'division':
                // ゼロ除算を防ぐためのチェック
                if ($value2 != 0) {
                    $result = $value1 / $value2;
                } else {
                    return "Error: Division by zero is not allowed.";
                }
                break;
            default:
                return "Error: Invalid operator.";
        }

        // ビューに結果を渡す
        return view('calc.result', ['result' => $result, 'value1' => $value1, 'operator' => $operator, 'value2' => $value2]);
    }
}
