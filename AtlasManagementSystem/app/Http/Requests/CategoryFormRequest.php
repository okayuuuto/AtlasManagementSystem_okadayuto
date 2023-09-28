<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
    public function rules()
    {
        if($this->is('create/main_category')) {
            return [
                'main_category_name' => 'required|string|max:100|unique:main_categories,main_category',
            ];
        } elseif($this->is('create/sub_category')) {
            return [
                'main_category_id' => 'required|exists:main_categories,id',
                'sub_category_name' => 'required|string|max:100|unique:sub_categories,sub_category',
            ];
        }
        return [];
    }

    public function messages() {
        return [
            'main_category_name.required' => '※メインカテゴリー名を入力してください。',
            'main_category_name.max' => '※メインカテゴリー名は100文字以内で入力してください。',
            'main_category_name.unique' => '※このメインカテゴリー名は既に登録されています。',
            'main_category_id.required' => '※メインカテゴリーを選択してください。',
            'main_category_id.exists' => '※選択されたメインカテゴリーは存在しません。',
            'sub_category_name.required' => '※サブカテゴリー名を入力してください。',
            'sub_category_name.max' => '※サブカテゴリー名は100文字以内で入力してください。',
            'sub_category_name.unique' => '※このサブカテゴリー名は既に登録されています。',
        ];
    }
}
