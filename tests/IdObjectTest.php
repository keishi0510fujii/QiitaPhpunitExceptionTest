<?php

use PHPUnit\Framework\TestCase;

// IdObjectクラスがValueObjectsディレクトリ配下のあることを想定しています。
// このuse文を記述しないとIdObjectが何か分からないのでテストができません。
use ValueObjects\IdObject;

// このuse文ではIdObjectの例外処理を行うクラスを読み込んでいます。
use ValueObjects\IdException;
class IdObjectTest extends TestCase
{
    /*
     * IdObjectに0を渡すと、例外処理が発生することをテストする
     */
    public function testExceptionWhenIdIsZero(){
        try{
            $id = new IdObject(0);
        }catch( Exception $ex ){

            // ここで例外が発生した時のエラーメッセージを取得しています。
            $msg = $ex->getMessage();

            // ここでエラーメッセージが想定通りのものかをチェックしています。
            $this->assertEquals(IdException::MSG_ZERO, $msg);
        }
    }

    /*
     * IdObjectにマイナスの値を渡すと、例外処理が発生することをテスト
     */
    public function testExceptionWhenIdIsNegative(){
        try{
            $id = new IdObject(-1);
        }catch (Exception $ex){

            // ここで例外が発生した時のエラーメッセージを取得しています。
            $msg = $ex->getMessage();

            // ここでエラーメッセージが想定通りのものかをチェックしています。
            $this->assertEquals(IdException::MSG_NEGATIVE, $msg);
        }
    }

    /*
     * IdObjectに1を渡すことができるのをテストする
     */
    public function testPassWhenIdIsUpperOne(){
        $id = new IdObject(1);
        $this->assertEquals(1, $id->value());
    }

}
