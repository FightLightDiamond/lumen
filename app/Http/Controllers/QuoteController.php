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
    public function index(){
        Quote::create(['name']);
        return "Index";
    }
    public function create(){

    }
    public function store(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function show(){

    }
    public function destroy(){

    }
}