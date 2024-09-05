@extends("admin/layout") @section("content")
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Attribute Value</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="#"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Attribute Value
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
        <h6 class="mb-0 text-uppercase">Attribute Value</h6>
        <hr />
        <div class="col pb-2 text-end">
            <button type="button" onclick="saveData('0', '', '')" class="btn btn-outline-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addAttributeValue">Add New</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Attribute Name</th>
                                <th>Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list['singleAttribute']->name}} | {{$list['singleAttribute']->slug}}</td>
                                <td>{{$list->value}}</td>
                                <td>
                                    <button type="button" onclick="saveData('{{$list->id}}', '{{$list->attributes_id}}', '{{$list->value}}')" class="btn btn-outline-primary px-4 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="updateAttributeValue">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-outline-danger px-4 radius-30" onclick="deleteData('{{$list->id}}', 'attribute_values')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Attribute Name</th>
                                <th>Value</th>
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
                    Add/Update Attribute Value
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formSubmit" action="{{url('admin/update_attribute_value')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div>
                                <i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Attribute Value Info</h5>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <label for="attribute_id" class="col-sm-3 col-form-label">Enter Attribute ID</label>
                            <div class="col-sm-9">
                                <select name="attribute_id" id="attribute_id" class="form-control">
                                    <option value="">Select Attribute ID</option>
                                    @foreach($attribute as $list)
                                    <option value="{{$list->id}}">{{$list->name}} | {{$list->slug}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="enter_attribute_value" class="col-sm-3 col-form-label">Enter Attribute Value</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="enter_attribute_value" placeholder="Enter Attribute Value" name="value" />
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
    function saveData(id, attribute_id, value) {
        $('#enter_id').val(id);
        $('#attribute_id').val(attribute_id);
        $('#enter_attribute_value').val(value);
    }

    // set  exampleModalLabel to Add Attribute or update Attribute
    $('#addAttribute').click(function() {
        $('#exampleModalLabel').html('Add Attribute');
    });
    $('#updateAttribute').click(function() {
        $('#exampleModalLabel').html('Update Attribute');
    });
</script>
@endsection