<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use App\Repositories\Interfaces\LanguageInterface;

class LanguageRepository implements LanguageInterface {
    public function getAll()
    {
        $langs = Language::paginate(6);
        return $langs; 
    }

    public function create(LanguageRequest $request)
    {
        $lang = Language::create([
            'name' => $request->name, 
            'artranslateactive' => $request->artranslateactive, 
            'entranslateactive' => $request->entranslateactive, 
            'frtranslateactive' => $request->frtranslateactive, 
            'chtranslateactive' => $request->chtranslateactive, 
            'grtranslateactive' => $request->grtranslateactive
        ]);

        return $lang;
    }

    public function getone(string $id)
    {
        $lang = Language::find($id);
        return $lang;
    }

    public function update(LanguageRequest $request, string $id)
    {
        $lang = Language::find($id);

        $lang->name = $request->name; 
        $lang->artranslateactive = $request->artranslateactive;
        $lang->entranslateactive = $request->entranslateactive; 
        $lang->frtranslateactive = $request->frtranslateactive; 
        $lang->chtranslateactive = $request->chtranslateactive; 
        $lang->grtranslateactive = $request->grtranslateactive;

        $lang->update();

        return $lang;

    }

    public function delete(string $id)
    {
        $lang = Language::find($id);
        $lang->delete();
    }
}