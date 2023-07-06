<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class resourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }
     private function validateComic($data) {

       $validator = validator::make($data,[
            "title" => "required|min:5|max:100",
            "description" => "min:5|max:65535",
            "thumb" => "max:255",
            "price" => "required|min:1|max:8",
            "series" =>  "required|min:3|max:100",
            "sale_date" => "required",
            "type" => "required|min:3|max:50",
       ],
        [
            "title.required" => "Il titolo è obbligatorio",
            "title.min" => "Il titolo deve essere almeno di :min caratteri"
        ])->validate();

        return $validator;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title" => "required|min:5|max:100",
            "description" => "min:5|max:65535",
            "thumb" => "max:255",
            "price" => "required|min:1|max:8",
            "series" =>  "required|min:3|max:100",
            "sale_date" => "required",
            "type" => "required|min:3|max:50",
        ]);

        $data = $this->validateComic( $request->all() );


        // $data = $request->all();
        
        $newComic= new Comic;
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];

        $newComic->save();
        
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
   
    {
    
        // $comics = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view("comics.edit", compact("comic") );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validateComic( $request->all() );
        
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->update();


        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
