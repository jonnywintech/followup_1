<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormData extends Model
{
    /** @use HasFactory<\Database\Factories\FormDataFactory> */
    use HasFactory;


    public function store(Request $request)
    {

        $validated_data = $request->validate([
            'item_name' => 'min:1|max:255|string',
            'item_quantity' => 'numeric',
            'price_per_item' => 'numeric'
        ]);

        $current_date_time = Carbon::now()->toDateTimeString();

        $validated_data['update_date'] = $current_date_time;

        $file = Storage::disk('public')->exists('data.json');



        if(!$file){
            Storage::disk('public')->put('data.json',json_encode([$validated_data]));

            return redirect()->back();
        }

        dd($data = Storage::disk('public')->get('data.json'));




    }
}
