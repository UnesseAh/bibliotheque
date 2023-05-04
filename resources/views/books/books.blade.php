<!DOCTYPE html>
<html lang="en-US">
@include('includes.head')
<body>
<!--Main Navigation-->
<header>
    <!-- Navbar -->
    @include('includes.navbar')
    <!-- Navbar -->

    <!-- Sidebar -->
    @include('includes.sidebar')
    <!-- Sidebar -->
</header>
<!--Main Navigation-->

<div>

</div>
<!--Main layout-->
<main style="margin-top: 58px; width: 98%" >

    <div class="container pt-4" >
        @if(session('added'))
            <div class="d-flex align-items-center alert alert-success p-3 border border-success" style=" width: 35%">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                <span class="px-2">{{ session('added') }}</span>

            </div>
        @elseif(session('deleted'))
            <div class="d-flex align-items-center alert alert-danger p-3 border border-danger" style="width: 35%">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                <span class="px-2">{{ session('deleted') }}</span>
            </div>
        @elseif(session('updated'))
            <div class="d-flex align-items-center alert alert-warning p-3 border border-warning" style="width: 35%">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                </svg>
                <span class="px-2">{{ session('updated') }}</span>
            </div>
        @endif
        <!-- Button trigger modal -->
        <a href="{{ route('books.create') }}"  class="btn btn-primary mb-3">
            Add Book
        </a>
        <table class="table align-middle mb-0 bg-white table-striped table-bordered text-center">
            <thead class="bg-dark text-light">
            <tr>
                <th>ID</th>
                <th>Book</th>
                <th>Summary</th>
                <th>Genre</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr >
                    <td>
                         <span class="badge badge-primary rounded-pill d-inline">
                            {{ $book->id }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('image/' .$book->image) }}" alt="" style="width: 45px; height: 70px" />
                            <div class="ms-3">
                                <span class="badge badge-info rounded-pill d-inline" style="font-size: 13px">
                                {{ $book->title }}
                            </span>
                            </div>
                        </div>
                    </td>
                    <td class="d-inline-block">{{ $book->summary }}</td>
                    <td>{{ $book->genre->name}}</td>
                    <td>{{ $book->author->first_name}} {{ $book->author->last_name}}</td>
                    <td class="p-4">
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-flex justify-content-around" >
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-outline-success mx-2" data-mdb-ripple-color="dark">
                                Edit
                            </a>
                            <button type="submit" class="btn btn-outline-danger">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</main>

<!--Main layout-->

<!-- MDB -->
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>
</html>
