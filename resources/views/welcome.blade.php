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
{{--        <a href="" type="button" class="btn btn-primary mb-4" >Add Book</a>--}}

        <table class="table align-middle mb-0 bg-white table-striped table-bordered ">
            <thead class="bg-dark text-light">
            <tr>
                <th>ID</th>
                <th>product</th>
                <th>description</th>
                <th>price</th>
                <th>stock</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Artisan</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($handicrafts as $handicraft)--}}
                <tr>
                    <td></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"></p>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td><span class="badge badge-primary rounded-pill d-inline"></span></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="display: flex; width: 226px;">
                        <form method="POST" action="">
                            <a href=""
                               class="btn btn-outline-success" data-mdb-ripple-color="dark">Edit</a>
                            <button type="submit" class="btn btn-outline-danger" data-mdb-ripple-color="dark">Delete
                            </button>
                        </form>
                    </td>
                </tr>
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class=" modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Modal title
                    </h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<!--Main layout-->

<!-- MDB -->
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>
</html>
