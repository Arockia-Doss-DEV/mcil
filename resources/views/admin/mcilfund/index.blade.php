@extends('layouts.app')

@section('title', 'Mcil Funds')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>MCIL FUNDS MASTER</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/mcilfunds')}}">
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
                                        <a class="btn btn-info mr-1" id="newFund"> + Fund Master</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>DEFAULT</th>
                                            <th>STATUS</th>
                                            <th>CREATED</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($mcilFund->count() > 0)    

                                        @foreach ($mcilFund as $key => $fund)

                                        <tr>
                                            <td class="text-muted"><?= $fund->name ?></td>
                                            <td class="text-muted">
                                                <?php 
                                                    if($fund->setdefault == 1){
                                                        echo "DEFAULT";
                                                    }else{
                                                        echo "-";
                                                    } 
                                                ?>
                                            </td>
                                            <td><span class="badge badge-soft-info mt-2 mr-2">
                                                <?php 
                                                    if($fund->active == 1){
                                                        echo "Active";
                                                    }else{
                                                        echo  "De-active";
                                                    } 
                                                ?>
                                            </span>
                                            <td class="text-muted">{{ $fund->created_at->format('d M, Y H:i A') }}</td>
                                            <td>
                                                <a type="button" href="javascript:void(0);" class="table-view-card get-edit-fund" get-fund-id='<?= $fund->id ?>'>
                                                    <img src="{{ asset('assets/images/icons/edit-icon.png') }}" alt="view icon" /></a>
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

            <!-- MCIL Funds Master Modal -->
            <div class="modal fade" id="createNewFundModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create New Fund</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="mcil-fund-create" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control search-input" required>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Active</label>
                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="active" id="active" value="1">
                                            <label class="string-check-label"> <span class="ml-2"> Click To
                                                    Active</span> </label>
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

            <!-- MCIL Update Modal -->
            <div class="modal fade" id="editFundModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update McilFund</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="mcil-fund-edit" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="fundId">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control search-input" required>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Active</label>
                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="active" id="active" value="1">
                                            <label class="string-check-label"> <span class="ml-2"> Click To
                                                    Active</span> </label>
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

    $(document).on("click","#newFund",function() {
        $('#mcil-fund-create')[0].reset();
        $('#createNewFundModel').modal('show');
    });

    // Fund Create Modal
    $('#mcil-fund-create').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('mcil-fund-create');
            let formData = new FormData(form);

            axios.post(SITE_URL+'mcilfund/save',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item =response.data.data;

                if(item != "null"){

                    Swal.fire('Great Job !','Fund create successfully!','success');

                    $('#mcil-fund-create')[0].reset();
                    $('#createNewFundModel').modal('hide');

                    setTimeout(location.reload.bind(location), 1500);
                }else{

                    Swal.fire('Sorry !','Fund create faild!','error');
                } 
            })
            .catch(function(){

                Swal.fire('Sorry !','Fund create faild!','error');
            });
        }
    });


    $(document).on("click",".get-edit-fund",function() {
        $('#mcil-fund-edit')[0].reset();
        var fund_id = $(this).attr('get-fund-id');

        axios.get(SITE_URL+'get/fund?id='+fund_id).then(function (response) {

            var item =response.data.data;
            // console.log(item)
            
            $('#fundId').val(item.id);
            $("input[name=name]").val(item.name);

            if (item.active == '1') {
                $("input[name=active]").attr('checked', true);
            } else {
                $("input[name=active]").attr('checked', false); 
            }

            $('#editFundModel').modal('show');
        })
        .catch(function (error) {
            Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
        });           
    });


    // Fund Update Modal
    $('#mcil-fund-edit').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('mcil-fund-edit');
            let formData = new FormData(form);

            // formData.set('id', '');

            axios.post(SITE_URL+'mcilfund/update',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item =response.data.data;

                if(item != "null"){

                    Swal.fire('Great Job !','Fund updated successfully!','success');

                    $('#mcil-fund-edit')[0].reset();
                    $('#editFundModel').modal('hide');

                    setTimeout(location.reload.bind(location), 1500);
                }else{

                    Swal.fire('Sorry !','Fund update faild!','error');
                } 
            })
            .catch(function(){

                Swal.fire('Sorry !','Fund update faild!','error');
            });
        }
    });

</script>

@stop
