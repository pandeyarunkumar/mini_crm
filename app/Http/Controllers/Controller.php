<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveLogo($logo){

        $size = getImageSize($logo);
        $width = $size[0];
        $height = $size[1];

        if($width<100 || $height<100){
            return 0;
        }

        $ext = $logo->guessExtension();
        $file_name    =    "logo-".Carbon::now()."-".uniqid().".{$ext}";
        $logo->storeAs('logos', $file_name);
        $logo = "storage/logos/".$file_name;

        return $logo;

    }
}
