<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Leonied7\Yandex\Disk;

class DocumentController extends Controller
{
    public function getDisk() {
        $oauth_token = SocialAccount::first()->token;
        $yandexDisk = new Disk($oauth_token);

        return $yandexDisk;
    }

    public function openView() {
        return view('content/file_load');
    }

    public function getAllDocument()
    {
        $doc_list = Documents::all()->all();
        return view('content/documents', compact('doc_list'));
    }

    public function getOneDocument($id)
    {
        $doc = Documents::find($id);
        return view('content/document', compact('doc'));
    }

    public function postDocument(Request $request)
    {
        $yandexDisk = $this->getDisk();
        $path = null;
        $file_local = $request->files->get('pathname');

        //загрузка на сервер и получение пути
        try {
            $path = Storage::putFileAs('files', $file_local, $file_local->getClientOriginalName());
        } catch (\Exception $e) {
            return view('content/file_loaded', compact($e));
        }

        // получаем все значения из других input
        try {
            $param = $request->request->all();
        } catch (\Exception $e) {
            return view('content/file_loaded', compact($e));
        }

        try {
            // загрузка на диск
            $file = $yandexDisk->file('/'.$file_local->getClientOriginalName());
            $file->upload(new Disk\Stream\File(Storage::path($path), Disk\Stream\File::MODE_READ));

            // получение пути в диске
            $filepath = $file->getPath();
            $param['pathname'] = $filepath;

            // загрузка данных в БД
            $new_doc = Documents::create($param);

            // удаление файла с сервера
            Storage::delete($file_local);
        } catch (\Exception $e) {
            return view('content/file_loaded', compact($e));
        }

        return redirect()->route('documents.getAll');
    }

    public function deleteDocument($id)
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

    public function putDocument($id, Request $request)
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
