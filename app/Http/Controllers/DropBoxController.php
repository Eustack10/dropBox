<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemInterface;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropBoxController extends Controller
{
    public function store(Request $request){

        $client = new Client("ctCoFYlNsaAAAAAAAAAAWb_iM-Jofnj86GlW9Bv8heAdokJBT6pucvTzzr4vxF9n");
        $adapter = new DropboxAdapter($client);
        $filesystem = new Filesystem($adapter,['case_sensitive' => false]);


        $file = $request->file('file');
        $stream = fopen($file->getRealPath(), 'r+');
        $filesystem->writeStream(
            'Majjhima/'.$file->getClientOriginalName(),
            $stream
        );
      return $link =  $client->getTemporaryLink('Majjhima/'.$file->getClientOriginalName());

    }
}
