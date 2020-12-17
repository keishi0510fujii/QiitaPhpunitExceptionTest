<?php

namespace ValueObjects;

class IdObject
{
    private $value;

    // このドキュメント文を忘れるとテストでエラーになるので注意してください。
    // この次の行の*(アスタリスク)が２つなのも注意してください。
    /**
     * IdObject constructor.
     * @param $value
     * @throws IdException
     */
    public function __construct($value)
    {
        // エラーが発生する条件を分岐します。
        // 0を受け取った時はMSG_ZEROの内容がエラーとして出力されるようにしています。
        if($value === 0){ IdException::raiseExceptionIdValueIsInvalid(IdException::MSG_ZERO); }

        // マイナスの値を受け取った時はMSG_NEGATIVEの内容がエラーとして出力されるようにしています。
        if($value < 0){ IdException::raiseExceptionIdValueIsInvalid(IdException::MSG_NEGATIVE); }

        // 例外が発生しなければ、クラス内の変数に受け取った値を格納します。
        $this->value = $value;
    }

    // クラス内の変数の値を取得できるようにしています。
    public function value(){
        return $this->value;
    }
}