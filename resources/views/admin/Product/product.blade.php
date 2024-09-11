@extends("admin/layout") @section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Product
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">
                        Settings
                    </button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                        <a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Product</h6>
        <hr />
        <div class="col pb-2 text-end">
            <a href="{{url('admin/manage_product')}}/0">
                <button type="button" class="btn btn-outline-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addProduct">Add New</button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>
                                    <img src="{{asset('/')}}{{$list->image}}" alt="image" width="100" height="100" />
                                </td>
                                <td>
                                    <a href="{{url('admin/manage_product')}}/{{$list->id}}">
                                        <button type="button" class="btn btn-outline-primary px-4 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="updateProduct">
                                            Edit
                                        </button>
                                    </a>
                                   
                                    <button type="button" class="btn btn-outline-danger px-4 radius-30" onclick="deleteData('{{$list->id}}', 'products')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Add/Update Product
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSubmit" action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Product Info</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="enter_text" class="col-sm-3 col-form-label">Enter Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="enter_text" placeholder="Enter Text" name="text" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="enter_image" class="col-sm-3 col-form-label">Enter Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="photo" placeholder="Enter Image" name="image" onchange="readURL(this);" required />
                            </div>
                            <div id="image_key">
                                <img src="" alt="image" name="image" id="imgPreview" width="200" height="200"/>
                            </div>
                        </div>
                        <input type="hidden" id="enter_id" name="id" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <span id="submitButton">
                        <button type="submit" class="btn btn-primary">
                            Save changes
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#imgPreview')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function saveData(id, text, link, image) {
        $('#enter_id').val(id);
        $('#enter_text').val(text);
        $('#enter_link').val(link);

        if(!image) {
            var key_image = "{{URL::asset('images/upload.png')}}";
            $('#photo').prop('required', true);
        } else {
            var key_image = "{{URL::asset('images')}}/"+image+"";
            $('#photo').prop('required', false);
        }

        var html = '<img src="'+key_image+'" alt="image" name="image" id="imgPreview" width="200" height="200"/>';
        $('#image_key').html(html);
    }

    // set  exampleModalLabel to Add Product or update Product
    $('#addProduct').click(function() {
        $('#exampleModalLabel').html('Add Product');
    });
    $('#updateProduct').click(function() {
        $('#exampleModalLabel').html('Update Product');
    });
</script>
@endsection