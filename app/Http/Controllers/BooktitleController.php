<?php

namespace App\Http\Controllers;

use App\Booktitle;
use Illuminate\Http\Request;

class BooktitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buchtitel = Booktitle::all();
        
        return view('booktitles/index', compact('buchtitel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booktitles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $buchtitel = new Booktitle;

        $buchtitel->titel    = $request->titel;
        $buchtitel->verlag   = $request->verlag;
        $buchtitel->preis    = $request->preis;
        $buchtitel->kennung  = $request->kennung;
        $buchtitel->isbn     = $request->isbn;

        $buchtitel->save();

        return redirect()->route('buchtitel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buchtitel = Booktitle::findOrFail($id);
        $buecher = $buchtitel->books;

        return view('booktitles/show', compact('buchtitel'), compact('buecher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buchtitel = Booktitle::findOrFail($id);

        return view('booktitles/edit', compact('buchtitel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $buchtitel = Booktitle::findOrFail($id);

        $buchtitel->titel    = $request->titel;
        $buchtitel->verlag   = $request->verlag;
        $buchtitel->preis    = $request->preis;
        $buchtitel->kennung  = $request->kennung;
        $buchtitel->isbn     = $request->isbn;

        $buchtitel->save();

        return redirect()->route('buchtitel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booktitle = Booktitle::findOrFail($id);

        $booktitle->books()->delete();
        $booktitle->booklists()->detach();
        $booktitle->delete();
        
        return redirect()->route('buchtitel.index');
    }

    public function createFromISBN($isbn)
    {
        $xmldoc = new \DOMDocument();
        $xmldoc->load("https://services.dnb.de/sru/dnb?version=1.1&operation=searchRetrieve&query=%22". $isbn .
            "%22&accessToken=4259d9c9dd2bd31aa24f69c22a923591");
        
        $data = array();

        $data["title"] = $xmldoc->getElementsByTagName("title")->item(0)->nodeValue;

        $nodelist = $xmldoc->getElementsByTagName("creator");
        $data["creator"] = array();
        foreach($nodelist as $creator) {
            $data["creator"][] = $creator->nodeValue;
        }

        $nodelist = $xmldoc->getElementsByTagName("publisher");
        $data["publisher"] = array();
        foreach($nodelist as $publisher) {
            $data["publisher"][] = $publisher->nodeValue;
        }

        $data["date"]      = $xmldoc->getElementsByTagName("date")->item(0)->nodeValue;

        $nodelist = $xmldoc->getElementsByTagName("identifier");
        $data["identifier"] = array();
        foreach($nodelist as $identifier) {
            $data["identifier"][] = $identifier->nodeValue;
        }

        $nodelist = $xmldoc->getElementsByTagName("subject");
        $data["subject"] = array();
        foreach($nodelist as $subject) {
            $data["subject"][] = $subject->nodeValue;
        }

        $data["format"]    = $xmldoc->getElementsByTagName("format")->item(0)->nodeValue;

        dd($data);
    }
}
