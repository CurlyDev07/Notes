<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TempImg;
class TempImg extends Model
{
    public static function img(){
        $img = TempImg::all();
        $names = '';
        foreach ($img as $key => $value) {
            $names .= $value->name.',';
        }
		return $names;
    }
}
