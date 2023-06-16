<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getAllDocument()
    {
        $doc_list = Documents::all()->all();
        return view('documents', compact('doc_list'));
    }

    public function getOneDocument($id)
    {
        $doc = Documents::find($id);
        return view('document', compact('doc'));
    }

    public function postDocument(Request $request)
    {
        try {
            $param = $request->request->all();
            $new_doc = Documents::create($param);
            $result = ["success"=> true, "message"=>$new_doc];
        } catch (\Exception $e) {
            $result = ["success"=>false, "message"=>$e];
        }

        return response()->json($result);
    }

    public function deleteDocument($id)
    {
        $delete_doc = Documents::find($id);
        $delete_doc->delete();
        dd($delete_doc);
    }

    public function putDocument($id)
    {
        $put_doc = Documents::find($id);

        $put_doc['name'] = 'Переименованный отчет';
        $put_doc['date'] = '2023-06-16';
        $put_doc['pathname'] = 'D/newfolder/file.docx';
        $put_doc['typeid'] = 2;

        $put_doc->save();
        dd($put_doc);
    }
}
