@extends("admin/layout") @section("content")
<script src="{{ asset('ckeditor4/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<div class="page-wrapper">
  <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Home Banner</div>
          <div class="ps-3">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                      <li class="breadcrumb-item">
                          <a href="{{ url('admin/dashboard') }}"><i class="bx bx-home-alt"></i></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                          Home Banner
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
      <h6 class="mb-0 text-uppercase">Home Banner</h6>
      <hr />
      <div class="col pb-2 text-end">
          <button type="button" onclick="saveData('0', '', '', '', '')" class="btn btn-outline-primary px-5 radius-30" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addBanner">Add New</button>
      </div>
      <div class="card">
          <div class="card-body">
              <div class="row">
                  <div class="col-xl-9 mx-auto">
                      <h6 class="mb-0 text-uppercase">Horizontal Form</h6>
                      <hr />
                      <div class="card border-top border-0 border-4 border-info">
                          <div class="card-body">
                              <div class="border p-4 rounded">
                                  <div class="card-title d-flex align-items-center">
                                      <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                                      <h5 class="mb-0 text-info">User Registration</h5>
                                  </div>
                                  <hr />
                                  <div class="row mb-3">
                                      <label for="inputProductName" class="col-sm-3 col-form-label">Product Name</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputProductName" value="{{$data->name}}" name="name" placeholder="Enter Product Name" />
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputProductSlug" class="col-sm-3 col-form-label">Product Slug</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputProductSlug" value="{{$data->slug}}" name="slug" placeholder="Enter Product Slug" />
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputProductImage" class="col-sm-3 col-form-label">Product Image</label>
                                      <div class="col-sm-9">
                                          <input type="file" class="form-control" id="inputProductImage" name="image" placeholder="Enter Product Image" />
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputItemCode" class="col-sm-3 col-form-label">Item Code</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputItemCode" value="{{$data->item_code}}" name="item_code" placeholder="Enter Item Code" />
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputKeywords" class="col-sm-3 col-form-label">Keywords</label>
                                      <div class="col-sm-9">
                                          <input type="text" class="form-control" id="inputKeywords" value="{{$data->keywords}}" name="keywords" placeholder="Enter Keywords" />
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="category" class="col-sm-3 col-form-label">Category</label>
                                      <div class="col-sm-9">
                                          <select class="form-select" name="category" id="category">
                                              @foreach($category as $categoryList) @if($data->category_id == $categoryList->id)
                                              <option value="{{$categoryList->id}}" selected>{{$categoryList->name}}</option>
                                              @else
                                              <option value="{{$categoryList->id}}">{{$categoryList->name}}</option>
                                              @endif @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="attribute_id" class="col-sm-3 col-form-label">Attribute</label>
                                      <div class="col-sm-9">
                                          <span id="multiAttr"></span>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputBrand" class="col-sm-3 col-form-label">Brand</label>
                                      <div class="col-sm-9">
                                          <select class="form-select" name="brand_id" id="brand_id">
                                              @foreach($brand as $brandList) @if($data->brand_id == $brandList->id)
                                              <option value="{{$brandList->id}}" selected>{{$brandList->text}}</option>
                                              @else
                                              <option value="{{$brandList->id}}">{{$brandList->text}}</option>
                                              @endif @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputTax" class="col-sm-3 col-form-label">Tax</label>
                                      <div class="col-sm-9">
                                          <select class="form-select" name="tax_id" id="tax_id">
                                              @foreach($tax as $taxList) @if($data->tax_id == $taxList->id)
                                              <option value="{{$taxList->id}}" selected>{{$taxList->text}}</option>
                                              @else
                                              <option value="{{$taxList->id}}">{{$taxList->text}}</option>
                                              @endif @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputDescription" class="col-sm-3 col-form-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description" required>
                                          {{$data->description}}
                                        </textarea>
                                      </div>
                                  </div>
                                  <div class="row mb-3">
                                      <label for="inputProductAttribute" class="col-sm-3 col-form-label">Product Attribute</label>
                                      <div class="row col-sm-9">
                                          <div class="col-sm-3">
                                              <button type="button" id="addAttributeButton" class="btn btn-info px-3">Add Attribute</button>
                                          </div>
                                          <div class="row" id="addAttr">
                                              <div class="col-sm-3">
                                                  <select name="color_id[]" class="form-control" id="color_id">
                                                      @foreach($color as $colorList)
                                                      <option class="box_color" style="background-color: {{$colorList->value}}" value="{{$colorList->id}}">{{$colorList->text}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <div class="col-sm-3">
                                                  <select name="size_id[]" class="form-control" id="size_id">
                                                      @foreach($size as $sizeList)
                                                      <option value="{{$sizeList->id}}">{{$sizeList->text}}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputSKU" placeholder="Enter SKU" name="sku[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputMRP" placeholder="Enter MRP" name="mrp[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputPrice" placeholder="Enter Price" name="price[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputLength" placeholder="Enter Length" name="length[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputBreadth" placeholder="Enter Breadth" name="breadth[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputHeight" placeholder="Enter Height" name="height[]" />
                                              </div>
                                              <div class="col-sm-3">
                                                  <input type="text" class="form-control" id="inputWeight" placeholder="Enter Weight" name="weight[]" />
                                              </div>
                                              <div class="row mb-3">
                                                  <label for="inputProductAttribute" class="col-sm-3 col-form-label">Product Image</label>
                                                  <div class="row col-sm-9">
                                                      <div class="col-sm-4">
                                                          <button type="button" id="addAttrImages" onclick="addAttrImages()" class="btn btn-info px-3">Add Image</button>
                                                      </div>
                                                      <div id="attrImage">
                                                          <div class="col-sm-7">
                                                              <input type="file" name="attr_image[]" class="form-control" id="inputProductImage" placeholder="Enter Product Image" />
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                  {{--
                                  <div class="row mb-3">
                                      <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                                      <div class="col-sm-9">
                                          <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Address"></textarea>
                                      </div>
                                  </div>
                                  --}}
                                  <div class="row">
                                      <label class="col-sm-3 col-form-label"></label>
                                      <div class="col-sm-9">
                                          <button type="submit" class="btn btn-info px-5">Submit</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
  var editor = CKEDITOR.replace('description');
  CKFinder.setupCKEditor(editor);
</script>

<script>
  function 
</script>

<script>
  $("#addAttributeButton").click(function(e){
    var html = '<hr>';
    var sizeData =  $('#size_id').html();
    var colorData =  $('#color_id').html();
    html += '<div class="col-sm-3"><select name="color" class="form-control" id="color_id">'+colorData+'</select></div>';
    html += '<div class="col-sm-3"><select name="size" class="form-control" id="size_id">'+sizeData+'</select></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputSKU" placeholder="Enter SKU" name="sku[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputMRP" placeholder="Enter MRP" name="mrp[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputPrice" placeholder="Enter Price" name="price[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputLength" placeholder="Enter Length" name="length[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputBreadth" placeholder="Enter Breadth" name="breadth[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputHeight" placeholder="Enter Height" name="height[]"/></div>';
    html += '<div class="col-sm-3"><input type="text" class="form-control" id="inputWeight" placeholder="Enter Weight" name="weight[]"/></div>';
    html += `
  <div class="row mb-3">
    <label for="inputProductAttribute" class="col-sm-3 col-form-label">Product Image</label>
    <div class="row col-sm-9">
      <div class="col-sm-4">
        <button type="button" id="addAttrImages" onclick="addAttrImages()" class="btn btn-info px-3">
          Add Image
        </button>
      </div>
      <div id="attrImage">
        <div class="col-sm-7">
          <input type="file" name="attr_image[]" class="form-control" id="inputProductImage" placeholder="Enter Product Image" />
        </div>
      </div>
    </div>
  </div>
`;

    $('#addAttr').append(html);
  })
</script>

<script>
  $("#category").change(function(e) {
    var category_id = $('#category').val();
    var html = '';
    var url = "{{ url('admin/getAttributes') }}";
    $.ajax({
      url: url,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      data: {
        'category_id': category_id
      },
      type: 'POST',
      success: function(result) {
        console.log(result);
        if (result.status == 'Success') {
          html += '<select class="form-control" name="attribute_id" id="attribute_id" multiple>';
          jQuery.each(result.data.data, function(key, val) {
            jQuery.each(val.values, function(attrKey, attrVal) {
              console.log(attrVal);
              html += '<option value="' + attrVal.id + '">' + val.attribute.name + '(' + attrVal.value + ' )</option>';
            });
          });
          html += ' </select>';
          $('#multiAttr').html(html);
          $('#attribute_id').multiSelect();
          showAlert(result.status, result.message);
        } else {
          showAlert(result.status, result.message);
        }
      }
    });
  });
</script>
@endsection

  