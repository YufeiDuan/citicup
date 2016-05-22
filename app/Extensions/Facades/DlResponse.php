<?php namespace App\Extensions\Facades;

use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Support\Str;

class DlResponse extends Response{

    public static function download($file, $name = null, array $headers = array(), $disposition = 'attachment')
	{
	    $response = new BinaryFileResponse($file, 200, $headers, true);

	    if (is_null($name))
	    {
	        $name = basename($file); // symfony uses the file name if user doesn't provide one
	    }

	    return $response->setContentDisposition($disposition, $name, Str::ascii($name));
	}
}