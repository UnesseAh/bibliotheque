<!doctype html>
<html lang="en">

@include('includes.head')

<body style="height: 100vh">
<div class="container w-25 " style="margin-top: 5rem">
    <div class="card col-lg-12 col-xl-12">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('image/edit-book.jpg') }}"
                 class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                 alt="Sample photo">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body p-0 py-4">
            <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Title -->
                <div class="form-outline mb-2">
                    <input name="title" value="{{ $book->title }}" type="text" id="title" class="form-control" />
                    <label class="form-label" for="title">Title</label>
                </div>
                @if($errors->has('title'))
                    <p class="text-danger small mb-2">{{ $errors->first('title') }}</p>
                @endif

                <!-- Summary -->
                <div class="form-outline mb-2">
                    <input name="summary" value="{{ $book->summary }}" type="text" id="summary" class="form-control" />
                    <label class="form-label" for="summary">Summary</label>
                </div>
                @if($errors->has('summary'))
                    <p class="text-danger small mb-2">{{ $errors->first('summary') }}</p>
                @endif

                <!-- Genre -->
                <div class="mb-2">
                    <select id="genre" name="genre_id" class="form-select">
                        <option selected disabled>Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" @if($genre->id == $book->genre_id) selected @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('genre_id'))
                    <p class="text-danger small mb-2">{{ $errors->first('genre_id') }}</p>
                @endif

                <!-- Authors -->
                <div class="mb-2">
                    <select id="author" name="author_id" class="form-select">
                        <option selected disabled>Author</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" @if($author->id == $book->author_id) selected @endif>{{ $author->first_name }} {{$author->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('author_id'))
                    <p class="text-danger small mb-2">{{ $errors->first('author_id') }}</p>
                @endif

                <!-- Image -->
                <div class="form-floating mb-2">
                    <input type="file" name="image" class="form-control" placeholder="image">
                </div>
                @if($errors->has('image'))
                    <p class="text-danger small mb-2">{{ $errors->first('image') }}</p>
                @endif

                <div class="text-center m-2 p-2" style="outline: 1px solid black; outline-style: dashed">
                    <img src="{{ asset('image/' . $book->image) }}" alt="" class="w-25">
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-warning btn-block mb-4">
                    Edit Book
                </button>
            </form>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</html>
