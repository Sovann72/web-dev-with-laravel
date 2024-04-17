<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
	public function view() {
		return view('pages.books_list');
	}

	public function index() {
		return Book::all();
	}

	public function create() {
		//
	}

	public function store(StoreBookRequest $request) {
		$request["author_id"] = auth()->user()->id;

		$book = new Book;

		$book = Book::create($request->all());

		return $book;
	}

	public function show($id) {
		$found = Book::where('id', $id)->first();

		if (!isset($found)) {
			return response([
				'message' => 'Resource not found!'
			], 404);
		}

		return Book::find($id);
	}

	public function edit(Book $book) {

	}

	public function update(UpdateBookRequest $request, $id) {
		$found = Book::where('id', $id)->first();

		if (!isset($found)) {
			return response([
				'message' => 'Resource not found!'
			], 404);
		}

		if (
			(auth()->user()->id != $found["author_id"] && auth()->user()->role == "user")
			||
			(auth()->user()->role != "admin" && auth()->user()->id != $found["author_id"])
		) {
			return response([
				"message" => "Fobidden resource"
			], 403);
			return $found;
		}

		$found->fill($request->all())->save();
		return $found;
	}
	
	public function destroy($id) {
		$found = Book::where('id', $id)->first();

		if (!isset($found)) {
			return response([
				'message' => 'Resource not found!'
			], 404);
		}

		if (
			(auth()->user()->id != $found["author_id"] && auth()->user()->role == "user")
			||
			(auth()->user()->role != "admin" && auth()->user()->id != $found["author_id"])
		) {
			return response([
				"message" => "Fobidden resource"
			], 403);
			return $found;
		}

		Book::destroy($id);

		return response("Review " . $id . "is deleted!");
	}
}
