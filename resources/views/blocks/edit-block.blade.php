<!doctype html>
<html lang="en">

@include('includes.head')

<body style="height: 100vh">
<div class="container w-25" style="margin-top: 6rem">
    <div class="card h-150 d-fex ">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="{{ asset('images/block.jpg') }}" class="img-fluid"/>
        </div>
        <div class="card-body p-0 py-4">
        <form action="{{ route('update.block', $block)}}" method="POST">
                @method('PUT')
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-2">
                    <input value="{{ $block->name }}" name="name" type="text" id="block" class="form-control"/>
                    <label class="form-label" for="block">Block</label>
                </div>
                @if($errors->has('name'))
                    <p class="text-danger small mb-2">{{ $errors->first('name')}}</p>
                @endif
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-warning btn-block">Update Block</button>
            </form>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</html>
