<?php

namespace App\Helpers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Testing\MimeType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesConvert
{
    private static function arBytes()
    {
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        return $arBytes;
    }

    public static function fileSizeConvert($size): string
    {
        if ($size)
        {
            $bytes = floatval($size);

            foreach(self::arBytes() as $arItem)
            {
                if($bytes >= $arItem["VALUE"])
                {
                    $result = $bytes / $arItem["VALUE"];
                    $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                    break;
                }
            }

            return $result;
        }

        return false;
    }

    public static function fileIcon($path)
    {
        if ($path)
        {
            $ext = Storage::mimeType($path);

            if ($ext)
            {
                $mimes = [
                    'application/x-dosexec' => 'exe',
                    'image/png' => 'png',
                    'image/jpeg' => 'jpeg',
                    'application/vnd.ms-excel' => 'xls',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'doc',
                    'application/zip' => 'zip',
                    'application/x-rar' => 'rar',
                    'application/pdf' => 'pdf',
                ];

                if (isset($mimes[$ext]))
                {
                    return view('components.icons.'.$mimes[$ext]);
                }

                return view('components.icons.default');
            } else {
                return view('components.icons.directory');
            }
        }

        return false;
    }

    public static function fileSizeSum($user_id)
    {
        $files = File::all();
        $user_files = $files->where('user_id', $user_id);
        $size = 0;

        if (!$user_files->isEmpty())
        {
            foreach ($user_files as $file)
            {
                $size += Storage::size($file->path);
            }

            return self::fileSizeConvert($size);
        }

        return $size;
    }

    public static function limitProgressBar()
    {
        $user_id = Auth::id();
        $limit = Auth::user()->setting['storage_limit'];
        $byte = $limit*pow(1024, 3);
        $data = self::fileSizeSum($user_id);
        if ($data)
        {
            list($size_sum, $unit) = explode(" ", $data);
            $size_sum = floatval(str_replace(',', '.', $size_sum));

            foreach(self::arBytes() as $arItem)
            {
                if ($arItem['UNIT'] == $unit)
                {
                    $result = $size_sum*$arItem["VALUE"];
                }
            }

            return $result*100/$byte;
        }

        return 0;
    }
}
