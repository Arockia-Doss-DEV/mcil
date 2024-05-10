@extends('layouts.app')

@section('title', 'AuditLogs')

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("individual.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Audit Logs</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/user/audit/logs')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search Logs, Name, Action, Date"
                                                class="form-control search-input" value=""/>
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>USER BROWSER</th>
                                            <th>USER IP</th>
                                            <th>USER TYPE</th>
                                            <th>INVESTOR NAME</th>
                                            <th>ACTION</th>
                                            <th>DOCUMENT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($auditLogs->count() > 0)    

                                            @foreach ($auditLogs as $key => $log) 
                                                <tr>
                                                    <td class="text-muted">{{ $log->created_at->format('d M, Y H:i A') }}</td>
                                                    <td class="text-muted"><?= $log->user_browser ?></td>
                                                    <td class="text-muted"><?= $log->user_ip ?></td>
                                                    <td class="text-muted"><?= $log->user_type ?></td>
                                                    <td class="text-muted"><?= $log->user->first_name . ' ' . $log->user->last_name ?></td>
                                                    <td class="text-muted"><?= $log->action ?></td>
                                                    <td class="text-muted">

                                                        <?php if($log->is_doc_enable == 1) : ?>

                                                            <a href="#" class="btn btn-info" onclick="reviewDoc(<?php echo $key; ?>)"> Docs</a>

                                                        <?php else : ?>
                                                            
                                                            <?php echo "No Docs" ?>

                                                        <?php endif; ?>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        @else

                                          <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                        @endif 
                                    </tbody>
                                </table>
                            </div>
                            <br>

                            {!! $auditLogs->links('pagination::bootstrap-4') !!}
                        </div>
                    </div><br><br>
                </div>
            </div>

            @include('individual.elements.footer')

        </div>
    </div>

    <div class="col-md-12">
        <div id="divResult2"></div>
    </div>
    
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/components/EZView.js') }}"></script>
<script type="text/javascript">

    function reviewDoc(key) {

        var logs = {!! json_encode($auditLogs); !!};

        const attachments = logs.data[key];
        const log_attachs = attachments.log_attachs;

        $('#divResult2').empty();

        var strResult = "";

        var j =1;
        for (var i = 0; i < log_attachs.length; i++) {
            
            // var download_url = base_url+log_attachs[i]['attachment'];
            var download_url = "{{ asset(Storage::url('')); }}/" + log_attachs[i]['attachment'];
            strResult += '<p class="ez_view_group ez_view_click'+j+'" src="" href="'+download_url+'" alt=""></p>';
            j++;
        }

        $("#divResult2").html(strResult);
        ez_viewcall();
    }

    function ez_viewcall(){
        $('.ez_view_group').EZView();
        $('.ez_view_click1').trigger('click');
    }

</script>

@stop