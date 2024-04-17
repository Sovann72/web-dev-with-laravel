<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\User;

class AuthorController extends Controller
{
  public function index()
  {
    return Author::all();
  }
  public function create()
  {
    //
  }

  public function store(StoreAuthorRequest $request)
  {
    $exist = Author::where('user_id', auth()->user()->id)->first();

    if (isset($exist)) {
      return response('Author already exists!', 409);
    }

    if (
      !$request->validate([
        'description' => 'required|string',
      ])
    ) {
      return response('Bad form!', 406);
    }
    $request["is_verified"] = false;
    $request["user_id"] = auth()->user()->id;
    $author = new Author;
    $author = Author::create($request->all());

    return $author;
  }

  public function show($id)
  {
    $found = Author::where('id', $id)->first();

    if (!isset($found)) {
      return response([
        'message' => 'Resource not found!'
      ], 404);
    }

    $author = Author::find($id);
    $user = User::find($author["user_id"]);
    $author["user"] = $user;

    return response(
      $author
    );
  }

  public function edit(Author $book)
  {
  }

  public function update(UpdateAuthorRequest $request, $id)
  {
    $found = Author::where('id', $id)->first();

    if (!isset($found)) {
      return response([
        'message' => 'Resource not found!'
      ], 404);
    }

    if (
      (auth()->user()->id != $found["user_id"] && auth()->user()->role == "user")
      ||
      (auth()->user()->role != "admin" && auth()->user()->id != $found["user_id"])
    ) {
      return response([
        "message" => "Fobidden resource",
      ], 403);
      return $found;
    }

    $found->fill($request->all())->save();
    return $found;
  }

  public function destroy($id)
  {
    $found = Author::where('id', $id)->first();

    if (!isset($found)) {
      return response([
        'message' => 'Resource not found!'
      ], 404);
    }

    if (
      (auth()->user()->id != $found["user_id"] && auth()->user()->role == "user")
      ||
      (auth()->user()->role != "admin" && auth()->user()->id != $found["user_id"])
    ) {
      return response([
        "message" => "Fobidden resource"
      ], 403);
      return $found;
    }

    Author::destroy($id);

    return response("Author " . $id . "is deleted!");
  }
}
