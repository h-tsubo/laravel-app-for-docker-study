<?php

namespace App\Http\Requests\Wordbook;

use Illuminate\Foundation\Http\FormRequest;

class WordbookTestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start' => 'nullable|integer|min:1',
            'end' => 'nullable|integer|min:1',
            'count' => 'nullable|integer|min:1',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $start = (int) $this->input('start', 1);
            $end = (int) $this->input('end', 9999);
            $count = (int) $this->input('count', 50);

            if ($start >= $end) {
                $validator->errors()->add('start', '開始IDは終了IDより小さくしてください。');
            }

            if ($count > ($end - $start + 1)) {
                $validator->errors()->add('count', '取得個数が範囲を超えています。');
            }
        });
    }
}
