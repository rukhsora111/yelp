@extends('layouts.admin')
 
@section('content')

<div class="block block-rounded">
            <div class="block-header block-header-default mt-5 pt-5">
              <h3 class="block-title">Contextual Table</h3>
              <button type="button"
           class="btn btn-alt-primary"
           data-bs-toggle="modal"
           data-bs-target="#modal-popin-create">Create Organisation</button> 
            </div>
            <div class="block-content">
              <table class="table table-borderless table-vcenter table-hover">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 50px;"></th>
                    <th>Name</th>
                    <th>Access</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($organisation as $org)
                  <tr class="table-active">
                    <th class="text-center" scope="row">1</th>
                    <td class="text-center">{{$org->id}}</td>
                    <td class="fw-semibold">{{$org->legal_name}}</td>
                    <td class="d-done d-sm-table-cell">{{$org->description}}</td>
                    <td class="d-none d-sm-table-cell">
                   <div>
                       {{ $org->description }}
                   </div>
 
                   <div class="p-3">
                       <div id="category_list-{{$org->id}}">
                           @foreach($org->categories as $cat)
                               <a href="{{ route('organisation', ['cat_ids' => [...$categories_id, $cat->id]]) }}" class="btn btn-primary rounded-end mb-1">
                                   {{$cat->name}}
                               </a>
                           @endforeach
                       </div>
                       <div>
                           <input id="add_category{{$org->id}}" type="text" class="form-control w-25 d-inline-block">
                           <button organisation_id="{{ $org->id }}" class="btn btn-primary rounded-end mb-1 add_category">
                               +
                           </button>
                       </div>
                   </div>
               </td>
                    <td class="d-done d-sm-table-cell">
                        <button type="button"
                        class="btn btn-alt-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-popin{{$org->id}}">Edit organisations</button>
                        <button type="button"
                               class="btn btn-alt-primary"
                               data-bs-toggle="modal"
                               data-bs-target="#modal-popin-delete{{$org->id}}">Delete Organisation</button>
                        <button type="button"
                       class="btn btn-alt-primary"
                       data-bs-toggle="modal"
                       data-bs-target="#modal-popin-attach_category{{$org->id}}">Add category</button>

                     </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  <tr>
                    <th class="text-center" scope="row">2</th>
                    <td>Amanda Powell</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="table-primary">
                    <th class="text-center" scope="row">3</th>
                    <td>Jose Parker</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">4</th>
                    <td>Andrea Gardner</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="table-warning">
                    <th class="text-center" scope="row">5</th>
                    <td>David Fuller</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">6</th>
                    <td>Andrea Gardner</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="table-danger">
                    <th class="text-center" scope="row">7</th>
                    <td>Danielle Jones</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">8</th>
                    <td>Helen Jacobs</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="table-info">
                    <th class="text-center" scope="row">9</th>
                    <td>Barbara Scott</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th class="text-center" scope="row">10</th>
                    <td>Susan Day</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr class="table-success">
                    <th class="text-center" scope="row">11</th>
                    <td>Andrea Gardner</td>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
 
@endsection

@section('modals')
   @foreach($organisation as $org)
       @include('organisations.modals.attach_category',['id' => $org->id, 'categories' => $categories])
       @include('organisations.modals.edit',['id' => $org->id])
       @include('organisations.modals.delete',['id' => $org->id])
       @include('organisations.modals.store')
   @endforeach
@endsection


@section('js')
   <script>
       $('.add_category').click(function(){
           let url = '{{ route('organisation.api.add_category') }}';
           let url_cat = '{{ route('organisation') }}';
           let organisation_id = $(this).attr('organisation_id');
           let category_name = $('#add_category'+organisation_id).val()
           $.post(url,
               {
                   organisation_id: organisation_id,
                   category_name: category_name
               },
               function(data, status) {
                   let html = '<a href="'+url_cat+'" class="btn btn-primary rounded-end mb-1 mr-1">'
                                +category_name+  
                               '</a>';
                   $('#category_list-'+organisation_id).append(html);
                   $('#add_category'+organisation_id).val('');
               })
       });
   </script>
@endsection

