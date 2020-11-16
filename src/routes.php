<?php
use Illuminate\Support\Facades\Route;

Route::get('greeting', function () {
    return 'Hi, this is your awesome package!';
});

Route::get('matchthepairs/test', 'EdgeWizz\Matchthepairs\Controllers\MatchthepairsController@test')->name('test');

Route::post('fmt/matchthepairs/store', 'EdgeWizz\Matchthepairs\Controllers\MatchthepairsController@store')->name('fmt.matchthepairs.store');

Route::post('fmt/matchthepairs/csv_upload', 'EdgeWizz\Matchthepairs\Controllers\MatchthepairsController@csv_upload')->name('fmt.matchthepairs.csv_upload');

