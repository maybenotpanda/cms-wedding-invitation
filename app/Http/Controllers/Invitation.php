<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use App\Models\Guests;

class Invitation
{
  public function index()
  {
    $guests = Guests::all();
    return view('pages.invitation', compact('guests'));
  }

  public function store(InvitationRequest $request)
  {
    $names = $request->input('name');
    $types = $request->input('type');
    $shows = $request->input('is_gift');

    try {
      foreach ($names as $i => $name) {
        if (!empty($name)) {
          Guests::create([
            'name' => $name,
            'type' => !empty($types[$i]) ? $types[$i] : 'basic',
            'is_gift' => isset($shows[$i]) ? 0 : 1,
          ]);
        }
      }

      return redirect()->back()->with('success', 'Tamu undangan berhasil disimpan!');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Gagal menyimpan tamu undangan: ' . $e->getMessage());
    }
  }
}
