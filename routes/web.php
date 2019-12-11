<?php

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

use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Tests\TestCase;
Route::get("/",function(){
    return view('welcome');
});
Route::post('/store', 'DropBoxController@store');

Route::get("/test",function(){
    $client = new Client("ctCoFYlNsaAAAAAAAAAANYtSOZJTUp8oQswyJLrTKPAmjLrZbcu-djjKMbAFIDnb");
    $adapter = new DropboxAdapter($client);
    $filesystem = new Filesystem($adapter,['case_sensitive' => false]);


   $client->delete("laravel/Dropbox.exe");

   $img = $client->getTemporaryLink('laravel/JavaFX _ FXGL 11 Game Development_ Asteroids (Part 2).mp4');
   return view('test',compact('img'));
});
