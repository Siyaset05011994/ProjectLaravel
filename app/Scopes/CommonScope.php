<?php

namespace App\Scopes;

class CommonScope
{
    public static function customDateFormat()
    {
        date_default_timezone_set('Asia/Baku');
        return date('Y-m-d H:i:s');
    }

    public function customSave($data)
    {
        $save=$data->save();
        if (!$save):
            return 'Not saved !';
        endif;
    }
}
