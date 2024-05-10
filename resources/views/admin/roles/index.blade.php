@extends('layouts.app')

@section('title', 'Roles')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>ROLES</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/roles')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search Name"
                                                class="form-control search-input" value=""/>
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 text-md-right">
                                        <a class="btn btn-info mr-1" id="newRole"> + Add Role</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAME</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($roles->count() > 0)    

                                        @foreach ($roles as $key => $role)

                                        <tr>
                                            <td class="text-muted"><?= $key+1 ?></td>
                                            <td class="text-muted"><?= $role->name ?></td>
                                            
                                            <td class="text-muted">{{ $role->created_at->format('d M, Y H:i A') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a type="button" href="{{ route('roles.show',$role->id) }}" class="table-view-card mr-2">
                                                        <img src="{{ asset('assets/images/icons/view-icon.png') }}" alt="view icon" />
                                                    </a>
                                                    <a type="button" href="{{ route('roles.edit',$role->id) }}" class="table-view-card mr-2">
                                                        <img src="{{ asset('assets/images/icons/edit-icon.png') }}" alt="Edit icon" />
                                                    </a>

                                                @if ($role->id != 1 and $role->id != 2 and $role->id != 3)
                                                    <a type="button" href="javascript:void(0);" class="table-view-card get-del-role" get-role-id='<?= $role->id ?>'>
                                                        <img src="{{ asset('assets/images/icons/delete-icon.png') }}" alt="delete icon" />
                                                    </a>
                                                
                                                @endif
                                                    
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach

                                    @else

                                        <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                    @endif 

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Create Modal -->
            <div class="modal fade" id="createNewRole" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create New Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="role-create" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Name:</label>
                                        <input type="text" name="name" id="name" class="form-control search-input" required>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <div class="form-group">
                                            <label>Permissions:</label>
                                            <br/>
                                            @foreach($permission as $value)
                                            <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name', 'data-parsley-errors-container'=>"#permissionError", "required" => 'required')) }}
                                                <label class="string-check-label"> <span class="ml-2">{{ $value->name }}</span> </label> 
                                            </div>
                                            @endforeach

                                            <span id="permissionError"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            @include('admin.elements.footer')

        </div>
    </div>

</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).on("click","#newRole",function() {
        $('#role-create')[0].reset();
        $('#createNewRole').modal('show');
    });

    // Role Create Modal
    $('#role-create').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('role-create');
            let formData = new FormData(form);

            axios.post(SITE_URL+'roles',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item =response.data.data;

                if(item != "null"){

                    Swal.fire('Great Job !','Role create successfully!','success');

                    $('#role-create')[0].reset();
                    $('#createNewRole').modal('hide');

                    setTimeout(location.reload.bind(location), 100);
                }else{

                    Swal.fire('Sorry !','Role create faild!','error');
                } 
            })
            .catch(function(){

                Swal.fire('Sorry !','Role create faild!','error');
            });
        }
    });

    $(document).on("click",".get-del-role",function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm Are You sure you want to Delete this Role?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    var role_id = $(this).attr('get-role-id');

                    axios.delete(SITE_URL+'roles/'+role_id).then(function (response) {

                        var item =response.data.data;
                        if(item != "null"){

                            Swal.fire('Great Job !','Role Deleted Successfully!','success');
                            setTimeout(location.reload.bind(location), 500);
                        }else{

                            // Swal.fire('Sorry !','Role deleted faild!','error');
                            Swal.fire('Sorry !','Temporarily disabled this service!','error');
                        } 

                    }).catch(function (error) {
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    });
                }
            }); 
        }
    });

</script>

@stop
