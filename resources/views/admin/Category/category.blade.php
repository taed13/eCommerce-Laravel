@extends("admin/layout") @section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Category
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
        <h6 class="mb-0 text-uppercase">Category</h6>
        <hr />
        <div class="col pb-2 text-end">
            <button type="button" onclick="saveData('0', '', '', '', '')" class="btn btn-outline-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addCategory">Add New</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->slug}}</td>
                                <td>{{$list->created_at}}</td>
                                <td>{{$list->updated_at}}</td>
                                <td>
                                    <button type="button" onclick="saveData('{{$list->id}}', '{{$list->name}}', '{{$list->slug}}', '{{$list->parent_category_id}}', '{{$list->image}}')" class="btn btn-outline-primary px-4 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="updateCategory">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-outline-danger px-4 radius-30" onclick="deleteData('{{$list->id}}', 'categories')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Create At</th>
                                <th>Updated At</th>
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
                    Add/Update Category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSubmit" action="{{url('admin/update_category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Category Info</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="enter_name" class="col-sm-3 col-form-label">Enter Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="enter_name" placeholder="Enter Name" name="name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="enter_slug" class="col-sm-3 col-form-label">Enter Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="enter_slug" placeholder="Enter Slug" name="slug" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="parent_category_id" class="col-sm-3 col-form-label">Enter Parent Category ID</label>
                            <div class="col-sm-9">
                                <select name="parent_category_id" id="parent_category_id" class="form-control">
                                    <option value="">Select Parent Category</option>
                                    @foreach($data as $list)
                                    <option value="{{$list->id}}">{{$list->name}} | {{$list->slug}}</option>
                                    @endforeach
                                </select>
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
    var checkId = 0;
    function saveData(id, name, slug, parent_category_id, image) {
        if(checkId != 0) {
            $('#parent_category_id option[value="'+checkId+'"]').show();
        }
        checkId = id;
        $('#enter_id').val(id);
        $('#enter_name').val(name);
        $('#enter_slug').val(slug);
        $('#parent_category_id').val(parent_category_id);
        $('#parent_category_id option[value="'+id+'"]').hide();

        if(!image) {
            var key_image = "{{URL::asset('images/upload.png')}}";
            $('#photo').prop('required', true);
        } else {
            var key_image = "{{URL::asset('/')}}"+image;
            $('#photo').prop('required', false);
        }

        var html = '<img src="'+key_image+'" alt="image" name="image" id="imgPreview" width="200" height="200"/>';
        $('#image_key').html(html);
    }

    // set  exampleModalLabel to Add Category when click on Add New button
    $('#addCategory').click(function() {
        $('#exampleModalLabel').html('Add Category');
    });
    $('#updateCategory').click(function() {
        $('#exampleModalLabel').html('Update Category');
    });
</script>
@endsection