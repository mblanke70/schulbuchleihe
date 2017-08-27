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

        $result = file_get_contents("https://services.dnb.de/sru/dnb?version=1.1&operation=searchRetrieve&query=%223-411-04484-5%22&accessToken=4259d9c9dd2bd31aa24f69c22a923591");
        
        $xml = new SimpleXMLElement($result);
        
        dd($xml);

        $response = json_encode(simplexml_load_string($result)); 
        $json = json_decode($response, true);

        //$xml = simplexml_load_string($result, NULL, NULL, "http://schemas.xmlsoap.org/soap/envelope/");

        dd($json);

        $nsUriOaiDc = 'http://www.openarchives.org/OAI/2.0/oai_dc/';
        $nsUriDc    = 'http://purl.org/dc/elements/1.1/';

        $records = $xml->ListRecords->record;

        dd($xml);

        foreach ($records as $record)
        {    
            $data = $record->metadata->children($nsUriOaiDc);

            $rows = $data->children($nsUriDc);

            echo $rows->title;

            break;
        }

/*
        $get = file_get_contents("https://services.dnb.de/sru/dnb?version=1.1&operation=searchRetrieve&query=%223-411-04484-5%22&accessToken=4259d9c9dd2bd31aa24f69c22a923591");

        $xml = simplexml_load_string($get);
        dd($xml);

        $ns_dc = $get->children('http://www.openarchives.org/OAI/2.0/oai_dc/')->children('http://purl.org/dc/elements/1.1/');

*/      


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
}
