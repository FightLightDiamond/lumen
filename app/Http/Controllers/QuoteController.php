<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 12/22/16
 * Time: 11:21 AM
 */

namespace App\Http\Controllers;


use App\Quote;

class QuoteController
{
    public function index() {
        Quote::create(['name' => str_random(10), 'quote' => str_random(10)]);
        $data = Quote::all();
        return response()->json($data);
    }
    public function show($id) {
        $quote = Quote::find($id);
        if(!$quote) {
            return response()->json(['error' => 'Can`t find that quote'], 400);
        }else {
            return response()->json($quote);
        }
        
    }
    public function create() {

    }
    public function store() {

    }
    public function edit() {

    }
    public function update() {

    }
    public function destroy() {

    }
}