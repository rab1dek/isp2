<?php

use Illuminate\Support\Facades\Route;
use \League\Csv\Reader;
use \App\Models\SpotifyCSV;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('spotify');
});
Route::post('/', function () {
    $csv = Reader::createFromPath(request()->file('csv_file')->getRealPath());
    $csv->setDelimiter(';');
    $csv->setHeaderOffset(0);
    foreach($csv as $record){
        SpotifyCSV::create([
            'Position' => $record['Position'],
            'Track Name' => $record['Track Name'],
            'Artist' => $record['Artist'],
            'Streams' => $record['Streams'],
            'Date' => \Carbon\Carbon::parse($record['Date'])
        ]);
    }
    dd('Record imported');
});
