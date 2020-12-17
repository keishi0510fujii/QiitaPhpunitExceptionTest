<?php

// ここで名前空間を指定してください
namespace ValueObjects;

// Exceptionクラスを継承してください。
// IdObject専用の例外処理を行うクラスであるとわかるクラス名にしています。
class IdException extends \Exception
{
    // エラーが発生した時のエラーメッセージを予め用意しています。
    public const MSG_ZERO = 'you can not set zero to id value';
    public const MSG_NEGATIVE = 'you can not set negative to id value';

    //このクラスが呼ばれた時に親であるExceptionクラスのコンストラクタを呼び出すようにしています。
    public function __construct($message = "", $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @param $message
     * @throws IdException
     * このメソッドが実際に例外エラーを発生させています。
     */
    public static function raiseExceptionIdValueIsInvalid($message){
        throw new IdException($message);
    }
}