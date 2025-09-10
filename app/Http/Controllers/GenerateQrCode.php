<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GenerateQrCode
{
  public function index()
  {
    $maps = "https://maps.app.goo.gl/5meaQWVistR1qYjS6";
    $qr = QrCode::size(200)->generate($maps);

    return view('pages.qr-maps', compact('qr'));
  }

  public function download()
  {
    $maps = "http://mw-reza.duckxpanda.com/location";

    $qr = QrCode::size(300)->generate($maps);

    return response($qr)
      ->header('Content-Type', 'image/svg+xml')
      ->header('Content-Disposition', 'attachment; filename="qrcode.svg"');
  }
}
