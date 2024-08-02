<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//バリデーションの実装(入力チェック)    
     public function authorize()
{
    return true;
}
public function rules()
{
    return [
        'title' => 'required | max:255',
        'url' => 'required | max:255 | url',
        'comment' => 'max:10000',
    ];
}
//エラーメッセージの設定
/**
 * 項目名
 *
 * @return array
 */
public function attributes(){
    return [
        'title' => 'タイトル',
        'url' => 'URL',
        'comment' => 'コメント',
    ];
}
/**
 * エラーメッセージ
 *
 * @return array
 */
public function messages() {
    return [
        'title.required' => ':attributeは必須項目です。',
        'title.max' => ':attributeは:max字以内で入力してください。',
        'url.required' => ':attributeは必須項目です。',
        'url.max' => ':attributeは:max字以内で入力してください。',
        'url.url' => ':attributeはURL形式で入力してください。',
        'comment.max' => ':attributeは:max字以内で入力してください。',
    ];
}
}
?>