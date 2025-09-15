<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationRequest;
use App\Models\GuestModel;

class Invitation
{
  public function index()
  {
    $guests = GuestModel::all();
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
          GuestModel::create([
            'name' => $name,
            'type' => !empty($types[$i]) ? $types[$i] : 'Basic',
            'is_gift' => isset($shows[$i]) ? 0 : 1,
          ]);
        }
      }

      return redirect()->back()->with('success', 'Tamu undangan berhasil disimpan!');
    } catch (\Exception $err) {
      return redirect()->back()->with('error', 'Gagal menyimpan tamu undangan: ' . $err->getMessage());
    }
  }

  public function update(InvitationRequest $request, $id)
  {
    try {
      $guest = GuestModel::findOrFail($id);

      $guest->name = $request->input('name');
      $guest->save();

      return redirect()->back()->with('success', 'Tamu undangan berhasil diubah!');
    } catch (\Exception $err) {
      return redirect()->back()->with('error', 'Gagal mengubah tamu undangan: ' . $err->getMessage());
    }
  }

  public function destroy($id)
  {
    try {
      $guest = GuestModel::findOrFail($id);
      $guest->delete();
      return redirect()->back()->with('success', 'Tamu undangan berhasil dihapus!');
    } catch (\Exception $err) {
      return redirect()->back()->with('error', 'Gagal menghapus tamu undangan: ' . $err->getMessage());
    }
  }

  public function getBySlug($slug)
  {
    $guest = GuestModel::where('slug', $slug)->first();

    if (!$guest) {
      return response()->json([
        'message' => 'Data not found'
      ], 404);
    }

    return response()->json([
      'responseCode' => 200,
      'message' => 'success',
      'data' => [
        'uuid' => $guest->id,
        'name' => $guest->name,
        'type' => $guest->type,
        'isGift' => $guest->is_gift,
        'createdAt' => $guest->created_at,
        'updatedAt' => $guest->updated_at,
        'deletedAt' => $guest->deleted_at,
      ]
    ]);
  }
}
