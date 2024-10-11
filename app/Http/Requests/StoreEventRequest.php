<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_type' => 'required|string|in:home_innogration,engagement,marriage,baby_shower,birthday,opening_ceremony,family_gather',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
            'event_time' => 'required',
            'event_place' => 'required|string|max:255',
            'guest_count' => 'required|integer|min:1',
            'guest_partition'=>'required|string|in:single,couple,family',
            'event_details' => 'nullable|string'
        ];
    }
}
