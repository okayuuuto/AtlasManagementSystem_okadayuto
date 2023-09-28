<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     protected function prepareForValidation(){
        $date = ($this->filled(['old_year', 'old_month', 'old_day'])) ? $this->old_year .'-'. $this->old_month .'-'. $this->old_day : null;
        $this->merge([
            'date' => $date
        ]);
     }

    public function rules()
    {
        return [
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'under_name_kana' => 'required|string|regex:/\A[ァ-ヴー]+\z/u|max:30',
            'mail_address' => 'required|email|unique:users,mail_address|max:100',
            'sex' => 'required|numeric:1,3',
            'old_year' => 'required',
            'old_month' => 'required',
            'old_day' => 'required',
            'date' => 'date|after_or_equal:2000/1/1|before_or_equal:today',
            'role' => 'required|numeric:1,4',
            'password' => 'required|string|min:8|max:30|confirmed',
        ];
    }

    public function messages(){
        return [
            'over_name.required' => '※姓は必須項目です。',
            'over_name.string' => '※姓は文字列で入力してください。',
            'over_name.max' => '※姓は10文字以内で入力してください。',
            'under_name.required' => '※名は必須項目です。',
            'under_name.string' => '※名は文字列で入力してください。',
            'under_name.max' => '※名は10文字以内で入力してください。',
            'over_name_kana.required' => '※セイは必須項目です。',
            'over_name_kana.string' => '※セイは文字列で入力してください。',
            'over_name_kana.regex' => '※セイはカタカナで入力してください。',
            'over_name_kana.max' => '※セイは30文字以内で入力してください。',
            'under_name_kana.required' => '※メイは必須項目です。',
            'under_name_kana.string' => '※メイは文字列で入力してください。',
            'under_name_kana.regex' => '※メイはカタカナで入力してください。',
            'under_name_kana.max' => '※メイは30文字以内で入力してください。',
            'mail_address.required' => '※メールアドレスは入力必須です。',
            'mail_address.email' => '※メールアドレスは正しい形式で入力してください。',
            'mail_address.unique' => '※このメールアドレスは既に使用されています。',
            'mail_address.max' => '※メールアドレスは100文字以内で入力してください。',
            'sex.required' => '※性別は必ず選択してください。',
            'old_year.required' => '※年は入力必須です。',
            'old_month.required' => '※月は入力必須です。',
            'old_day.required' => '※日は入力必須です。',
            'date.date' => '※生年月日は正しいものを入力してください。',
            'date.after_or_equal' => '※生年月日は2000年1月1日以降を入力してください。',
            'date.before_or_equal' => '※生年月日は本日までのものを入力してください。',
            'role.required' => '※役職は必ず選択してください。',
            'password.required' => '※パスワードは入力必須です。',
            'password.min' => '※パスワードは8文字以上で入力してください。',
            'password.max' => '※パスワードは30文字以内で入力してください。',
            'password.confirmed' => '※パスワードが確認用と異なっています。',
        ];
    }
}
