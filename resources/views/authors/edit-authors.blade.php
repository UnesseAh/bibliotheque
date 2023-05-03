<!doctype html>
<html lang="en">

@include('includes.head')

<body style="height: 100vh">
<div class="container w-25 " style="margin-top: 6rem">
    <div class="card col-lg-12 col-xl-12">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="outline: 1px solid black; outline-style: dashed">
            <img src="{{ asset('image/update-authors.jpg') }}"
                 class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem"
                 alt="Sample photo">
        </div>
        <div class="card-body p-0 py-4">
            <form method="POST" action="{{ route('authors.update', $author) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- First Name -->
                <div class="form-outline mb-2">
                    <input name="first_name" value="{{ $author->first_name }}" type="text" id="title" class="form-control" />
                    <label class="form-label" for="title">First Name</label>
                </div>
                @if($errors->has('first_name'))
                    <p class="text-danger small mb-2">{{ $errors->first('first_name') }}</p>
                @endif

                <!-- Last Name -->
                <div class="form-outline mb-2">
                    <input name="last_name" value="{{ $author->last_name }}" type="text" id="title" class="form-control" />
                    <label class="form-label" for="title">Last Name</label>
                </div>
                @if($errors->has('last_name'))
                    <p class="text-danger small mb-2">{{ $errors->first('last_name') }}</p>
                @endif

                <!-- Country -->
                <div class="form-outline mb-2">
                    <input name="country" value="{{ $author->country }}" type="text" id="country" class="form-control" />
                    <label class="form-label" for="country">Country</label>
                </div>
                @if($errors->has('country'))
                    <p class="text-danger small mb-2">{{ $errors->first('country') }}</p>
                @endif

                <!-- Age -->
                <div class="form-outline mb-2">
                    <input name="age" value="{{ $author->age }}" type="number" id="age" class="form-control" placeholder="age">
                    <label for="age" class="form-label">Age</label>
                </div>
                @if($errors->has('age'))
                    <p class="text-danger small mb-2">{{ $errors->first('age') }}</p>
                @endif

                <!-- Image -->
                <div class="form-floating mb-2">
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <label for="image" class="form-label">Image</label>
                </div>
                @if($errors->has('image'))
                    <p class="text-danger small mb-2">{{ $errors->first('image') }}</p>
                @endif
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-warning btn-block">
                    Update Authors
                </button>
            </form>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</html>
