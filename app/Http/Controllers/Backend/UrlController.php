<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::paginate(10);
        return view('Backend.short-urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.short-urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([  
            'link' => 'required|url|unique:shorturls'  
         ]);  
      
        //  $input['link'] = $request->link;  
        //  $input['code'] = str_random(6);  
      
        //  Url::create($input);  
        $urls = new Url();
        $urls->link = $request->link;
        $urls->code = $request->code;
        $urls->save();
         return redirect()->route('get-short-urls')  
              ->with('message', 'Shorten Link Generated Successfully!'); 
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = Url::findOrFail($id);
        if($url)
        {
            return view('Backend.short-urls.edit', compact('url'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([  
            'link' => 'required|url'  
         ]);  
       
        $urls = Url::findOrFail($id);
        if($urls)
        {
            $urls->link = $request->link;
            $urls->code = $request->code;
            $urls->update();
             return redirect()->route('get-short-urls')  
                  ->with('message', 'Shorten Link Updated Successfully!'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function find($code)  
    {  
     
        $find = Url::where('code', $code)->first();  
     
        return redirect($find->link);  
    } 
} 

