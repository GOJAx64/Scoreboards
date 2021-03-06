<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Guide;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid()){
            $path =  $request->file->store('documents');
            $file = new File();
            $file->guide_id = $request->guide_id;
            $file->path = $path;
            $file->original_name = $request->file->getClientOriginalName();
            $file->mime = $request->file->getMimeType();
            $file->save();
        }
        $guide = Guide::find($request->guide_id);
        return redirect()->route('guides.show',compact('guide'))
            ->with(['message' => 'New file has been uploaded!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download(File $file){
        return Storage::download($file->path, $file->original_name, ['Content-Type' => $file->mime]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file){
        $guide = Guide::find($file->guide_id);
        $file->delete();
        return redirect()->route('guides.show',compact('guide'))
            ->with(['message' => 'File has been removed!']);
    }

}
