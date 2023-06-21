<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Leonied7\Yandex\Disk;

class DocumentController extends Controller
{
    // GET
    public function index()
    {
        $doc_list = Documents::all()->all();
        return view('content/documents', compact('doc_list'));
    }

    // GET id
    public function show($id)
    {
        $doc = Documents::find($id);
        return view('content/document', compact('doc'));
    }

    // GET
    public function createShow() {
        /* вывод экрана создания */
        return view('content/file_load');
    }

    // POST
    public function create(Request $request)
    {
        $yandexDisk = $this->getDisk();
        $isEmpty = true;
        $isLocalFile = false;
        $fileLocal = $request->files->get('pathname');
        $fileLocalPath = null;
        $fileLocalName = $fileLocal->getClientOriginalName();

        [$fileLocalPath, $isLocalFile] = $this->loadLocal($fileLocal, $fileLocalName);

        $params = $request->request->all();
        $isEmpty = $this->checkParams($params);

        // если параметры пустые или нет локального файла вернуть
        if ($isEmpty and !$isLocalFile) {
            $result = ["success"=> false, "message"=>'Ошибка сохранения: Нет файла или отсутствуют данные'];
            return response()->json($result);
        }

        $fileToYandexPath = $this->loadYandex($yandexDisk, $fileLocalName, $fileLocalPath);
        $this->loadDB($params, $fileToYandexPath);
        $this->deleteLocal($fileLocalPath);

        return redirect()->route('documents.index');
    }

    function getDisk() {
        /* Запуск яндекс диска */
        $oauth_token = SocialAccount::first()->token;
        $yandexDisk = new Disk($oauth_token);
        return $yandexDisk;
    }
    function loadLocal($fileLocal, $fileLocalName) {
        try {
            $fileLocalPath = Storage::putFileAs('files', $fileLocal, $fileLocalName);
            $isLocalFile = true;
            return [$fileLocalPath, $isLocalFile];
        } catch (\Exception $e) {
            dd($e);
        }
    }
    function checkParams($parameters) {
            return $parameters === [];
    }
    function loadYandex($yandexDisk, $fileLocalName, $fileLocalPath) {
        try {
            // загрузка на яндекс
            $fileToYandex = $yandexDisk->file('/'.$fileLocalName);
            $fileToYandex->upload(new Disk\Stream\File(Storage::path($fileLocalPath), Disk\Stream\File::MODE_READ));
            return $fileToYandex->getPath();

        } catch (\Exception $error) {
            dd($error);
//            return view('content/file_load', compact($error));
        }
    }
    function loadDB($parameters, $fileToYandexPath) {
        try {
            $parameters['pathname'] = $fileToYandexPath;
            return Documents::create($parameters);
        } catch (\Exception $error) {
            dd($error);
        }
    }
    function deleteLocal($fileLocalPath) {
        return Storage::delete($fileLocalPath);
    }


    public function delete($id)
    {
        $yandexDisk = $this->getDisk();

        $delete_doc = Documents::find($id);

        try {
            $file = $yandexDisk->file($delete_doc['pathname']);
            $file->delete();

            $delete_doc->delete();
        } catch (\Exception $e) {
            dd($e);
        }

        dd($delete_doc);
    }

    public function edit($id, Request $request)
    {
        try {
            $param = $request->request->all();
            $put_doc = Documents::find($id);

            $put_doc['name'] = $param['name'];
            $put_doc['date'] = $param['date'];
            $put_doc['pathname'] = $param['pathname'];
            $put_doc['typeid'] = $param['typeid'];

            $put_doc->save();
            $result = ["success"=> true, "message"=>$put_doc];
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        return response()->json($result);
    }
}
