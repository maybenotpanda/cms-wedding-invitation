<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* Model */
use App\Models\MessageModel;

class MessageController
{
  public function index()
  {
    $messages = MessageModel::with('guest')->get();
    return view('pages.messages', compact('messages'));
  }

  public function createMessage(Request $request)
  {
    try {
      $validated = $request->validate([
        'guest_id' => 'required|exists:guests,id',
        'name'     => 'required|string|max:255',
        'message'  => 'required|string',
      ]);

      $message = MessageModel::create($validated);

      return response()->json([
        'errorMessage' => 'success',
        'responseCode' => 200,
        'data' => $message,
      ], 201);
    } catch (\Illuminate\Validation\ValidationException $err) {
      return response()->json([
        'errorMessage' => $err->getMessage(),
        'responseCode' => 422,
        'data' => $err->errors(),
      ], 422);
    }
  }

  public function listMessages(Request $request)
  {
    try {
      $page  = $request->query('page', 0);
      $limit = $request->query('limit', 10);

      $query = MessageModel::select('name', 'message', 'created_at')->orderBy('created_at', 'desc');

      $count = $query->count();
      $data  = $query->skip($page * $limit)->take($limit)->get()->map(function ($item) {
        return [
          'name'      => $item->name,
          'message'   => $item->message,
          'createdAt' => $item->created_at,
        ];
      });

      return response()->json([
        'errorMessage' => 'success',
        'responseCode' => 200,
        'data' => [
          'data'  => $data,
          'count' => $count,
          'page'  => $page,
          'limit' => $limit,
        ],
      ], 200);
    } catch (\Exception $err) {
      return response()->json([
        'errorMessage' => $err->getMessage(),
        'responseCode' => 500,
        'data' => null,
      ], 500);
    }
  }
}
