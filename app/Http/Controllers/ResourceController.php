<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    public function downloadDocument($document_id)
    {
        $document = Document::find($document_id);
        $file = storage_path()."\app\public\docs\\".$document->url;
        $title =$document->name.'.pdf' ;
        return 123;
        $headers = array('Content-type: application/pdf');
        // return \Response::download($file,$title,$headers);
    }

    public function add(Request $request,$article_id)
    {
          if($request->hasFile('img_resource'))
          {
            $path = $request->file('img_resource')->store('img_resources','public');
            DB::table('article_images')->insert(
                ['article_id' =>$article_id,
                'url' => $path]
            );
        }  
        else
        {
            return 'No photo';
        }
        return redirect('/articles/edit/'.$article_id);

    }
}
