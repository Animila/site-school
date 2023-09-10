<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use Illuminate\Http\Request;

class TypeDocumentController extends Controller
{
    public function index() {
        $types = DocType::all()->all();
        return view('types/index', compact('types'));
    }

    public function create(Request $request) {
        $data = $request->all();
        DocType::create($data);
        return redirect()->route('types.index');
    }

    public function edit(Request $request) {
        $data = $request->all();
        $selected = DocType::find($data['id']);
        $selected['name'] = $data['name'];
        $selected['updated_at'] = $data['updated_at'];
        $selected->update();
        return redirect()->route('types.index');
    }


    public function delete($id) {
        $result = DocType::find($id);
        try {
            $result->delete();
        } catch (\Exception $error) {
            dd($error);
        }
        return redirect()->route('types.index');
    }
}
