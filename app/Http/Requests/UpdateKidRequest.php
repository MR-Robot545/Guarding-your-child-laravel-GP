<?php

namespace App\Http\Requests;


use App\Models\Guardian;
use Illuminate\Validation\Rule;
use App\Trait\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
class UpdateKidRequest extends FormRequest
{
    use ApiResponseTrait;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $kid_id = $this->route('kid');
        $guardian_id = Guardian::where('kid_id',$kid_id)->first()->id;
        return [
            'image' => 'file|mimes:jpeg,png,jpg,bmp',
            'SSN' => [
                'required',
                Rule::unique('kids', 'SSN')->ignore($kid_id),
            ],
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'gender' => 'required|in:male,female',
            'birthDate' => 'required|date',
            'SSN_father' => [
                'required',
                Rule::unique('guardians', 'SSN_father')->ignore($guardian_id),
            ],
            'father_name' => 'required|max:50',
            'SSN_mother' => [
                'required',
                Rule::unique('guardians', 'SSN_mother')->ignore($guardian_id),
            ],
            'mother_name' => 'required|max:50',
            'address' => 'required|max:200',
            'phone' => [
                'required',
                Rule::unique('guardians', 'phone')->ignore($guardian_id),
            ],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->apiResponse(null, $validator->errors(), 400)
        );
    }
}
