<?php

namespace App\Http\Controllers;

use Milon\Barcode\DNS1D;

class GenerateBarcode
{
  public function index()
  {
    $url = "https://mw-reza.duckxpanda.com/makasih";

    return view('pages.create-barcode', compact('url'));
  }

  public function download()
  {
    $url = "https://mw-reza.duckxpanda.com/makasih";

    $barcode = new DNS1D();
    $png = $barcode->getBarcodePNG($url, "C128", 2, 60);

    $image = base64_decode($png);

    return response($image)
      ->header('Content-Type', 'image/png')
      ->header('Content-Disposition', 'attachment; filename="barcode.png"');
  }
}
