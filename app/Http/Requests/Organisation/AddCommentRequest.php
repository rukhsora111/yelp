<?php

namespace App\Http\Requests\Organisation;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Organisation;
use App\Models\Comment;

class AddCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $comment = Comment::class;
        $organsiation = Organisation::class;
        return [
            'text' => ['required', 'string'],
            'username' => ['required', 'string', 'max:255'],
            'rate' => ['required', 'numeric', 'min:0', 'max:5'],
            'organisation_id' => ['required', 'int', 'exists:'.$organsiation.',id'],
            'parent_comment_id' => ['nullable','exists:'.$comment.',id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
 
}
