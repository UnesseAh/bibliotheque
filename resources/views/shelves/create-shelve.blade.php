<!doctype html>
<html lang="en">

@include('includes.head')

<body style="height: 100vh">
<div class="container w-25 " style="margin-top: 6rem">
    <div class="card h-150 d-fex ">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" style="border: 2px solid black; border-style: dashed" >
            <img src="{{ asset('image/shelve.jpg') }}" class="img-fluid"/>
        </div>
        <div class="card-body p-0 py-4">
            <form action="{{ route('shelves.store') }}" method="POST">
                @csrf
                <!-- Block input -->
                <div class="mb-2">
                    <select id="blocks" name="block_id" class="form-select">
                        <option selected disabled>Choose Block</option>
                        @foreach($blocks as $block)
                            <option value="{{ $block->id }}">{{ $block->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('block_id'))
                    <p class="text-danger small mb-2">{{ $errors->first('block_id') }}</p>
                @endif

                <!-- Shelve input -->
                <div class="form-outline mb-2">
                    <input name="name" type="text" id="shelve" class="form-control" />
                    <label class="form-label" for="shelve">Shelve Name</label>
                </div>
                @if($errors->has('name'))
                    <p class="text-danger small mb-2">{{ $errors->first('name')}}</p>
                @endif
                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-primary btn-block">Add Shelve</button>
            </form>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</html>
