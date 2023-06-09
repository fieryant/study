<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'topic_id' => 'required|exists:topics,id',
            'chapter_id' => 'required|exists:topics,id',
            'course_id' => 'required|exists:topics,id',
            'semester_id' => 'required|exists:topics,id',
            'years.*' => 'nullable|exists:years,id',
            'difficulty' => 'nullable|in:'.implode(',', Question::DIFFICULTIES),
            'star' => 'nullable|integer|min:0|max:'.Question::MAX_STAR,
        ];
    }
}
