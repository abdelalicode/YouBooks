@extends('layouts.app')

@section('content')

<h2 class="mt-5">UPDATE A BOOK</h2>

<div class="container m-5">

   
                    <form method="post" action="{{route('book.update',$book->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $book->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ $book->author }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                            <textarea class="form-control" name="details" id="exampleFormControlTextarea1" rows="3">{{ $book->details }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">UPDATE</button>
                    </form>
                
</div>

@endsection