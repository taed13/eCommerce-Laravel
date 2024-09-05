@extends("admin/layout") @section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Size</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Size
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
        <h6 class="mb-0 text-uppercase">Size</h6>
        <hr />
        <div class="col pb-2 text-end">
            <button type="button" onclick="saveData('0', '')" class="btn btn-outline-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addSize">Add New</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Text</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->text}}</td>
                                <td>{{$list->created_at}}</td>
                                <td>{{$list->updated_at}}</td>
                                <td>
                                    <button type="button" onclick="saveData('{{$list->id}}', '{{$list->text}}')" class="btn btn-outline-primary px-4 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="updateSize">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-outline-danger px-4 radius-30" onclick="deleteData('{{$list->id}}', 'sizes')">
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
                    Add/Update Size
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSubmit" action="{{url('admin/updatesize')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Size Info</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="enter_text" class="col-sm-3 col-form-label">Enter Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="enter_text" placeholder="Enter Text" name="text" required />
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
    function saveData(id, text) {
        $('#enter_id').val(id);
        $('#enter_text').val(text);


    }

    // set  exampleModalLabel to Add Banner or update Banner
    $('#addSize').click(function() {
        $('#exampleModalLabel').html('Add Size');
    });
    $('#updateSize').click(function() {
        $('#exampleModalLabel').html('Update Size');
    });
</script>
@endsection