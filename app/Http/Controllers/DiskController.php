<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Leonied7\Yandex\Disk;

class DiskController extends Controller
{
    public function getDisk() {
        $oauth_token = SocialAccount::first()->token;
        $yandexDisk = new Disk($oauth_token);

        return $yandexDisk;
    }

    public function openView() {
        return view('content/file_load');
    }

    public function postDoc(Request $request) {

        $yandexDisk = $this->getDisk();
        $do = false;
        $loaded = false;
        $path = null;
        $file_local = $request->files->get('pathname');

        //загрузка на сервер и получение пути
        try {
            $path = Storage::putFileAs('files', $file_local, $file_local->getClientOriginalName());
            $loaded = true;
        } catch (\Exception $e) {
            dd($e);

        }

        // получаем все значения из других input
        try {
            $param = $request->request->all();
            $do = true;
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        if ($do and $loaded) {
            try {
                $file = $yandexDisk->file('/'.$file_local->getClientOriginalName());
                $file->upload(new Disk\Stream\File(Storage::path($path), Disk\Stream\File::MODE_READ));
                $filepath = $file->getPath();
                $param['pathname'] = $filepath;
                $new_doc = Documents::create($param);
                $result = ["success"=> true, "message"=>$new_doc];
            } catch (\Exception $e) {
                dd($e);
            }
        }
        return response()->json($result);
    }
}
