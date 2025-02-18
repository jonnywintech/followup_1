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

        // dd(json_encode($validated_data));

        $current_date_time = Carbon::now()->toDateTimeString();

        $validated_data['update_date'] = $current_date_time;

        $file_exist = Storage::disk('public')->exists('data.json');



        if (!$file_exist) {
            Storage::disk('public')->put('data.json', json_encode([$validated_data]));

            return redirect()->back();
        }

        $file = Storage::disk('public')->get('data.json');

        $array_of_items = json_decode($file, true);


        $new_data = [];

        $data_found = false;

        foreach($array_of_items as $item){
            if($item['item_name'] == $validated_data['item_name']){

                $item['item_quantity'] += $validated_data['item_quantity'];
                $item['price_per_item'] = $validated_data['price_per_item'];

                $new_data[] = $item;

                $data_found = true;
                continue;
            }

            $new_data[] = $item;
        }

        if(!$data_found){
            $new_data[] = $validated_data;
        }


    
        Storage::disk('public')->put('data.json', json_encode($new_data));


        return redirect()->back();
    }
}
