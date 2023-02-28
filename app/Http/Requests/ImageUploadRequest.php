<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ImageUploadRequest extends FormRequest
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
        return [
            'image' => 'mimes:png,gif,jpg,jpeg',
        ];
    }

    /**
     * Handle and store any images attached to request
     *
     */
    public function handleImages($input, $path = null, $item, $column)
    {
        if ($this->hasFile($input)) {

            $image = $this->file($input);

            if ($image->isValid()) {

                // getting original extension for image
                $extension = $image->getClientOriginalExtension();
                // creating filename for image
                $filename = date("Y_m_d_h_i_s") . "_" . $input . "." . $extension;
                Storage::disk('public')->put($path . $filename, file_get_contents($image));

                // remove current image if exists
                if (Storage::disk('public')->exists($path . $item->{$column})) {
                    try {
                        Storage::disk('public')->delete($path . $item->{$column});
                    } catch (\Exception $exception) {
                        return null;
                    }
                }

                $item->{$column} = $filename;
            }

        }

        return $item;
    }

}
