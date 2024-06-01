@extends('admin.layouts.dashboard')
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand fa fa-list"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('navigation.contacts')
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form class="report-form" id="filterForm">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>@lang('general.status')</label>
                            {!! Form::select('seen', [
                                    '' => trans('general.please_choose'),
                                    '1' => trans('general.seen'),
                                    '0' => trans('general.unseen'),
                               ] , null , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label>@lang('general.type')</label>
                            {!! Form::select('type', [
                                    '' => trans('general.please_choose'),
                                    App\Enums\ContactEnums::CONTACT => trans('general.contact'),
                                    App\Enums\ContactEnums::SUGGESTION => trans('general.suggestion'),
                                    App\Enums\ContactEnums::COMPLAINT => trans('general.complaint'),
                                    App\Enums\ContactEnums::ANOTHER => trans('general.another'),
                               ] , null , ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>@lang('general.date')</label>
                        <div class="input-group date-picker input-daterange">
                            <input type="text" readonly="readonly" style="background:white;" class="form-control date_from" name="dt_from_date" value="">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                            </div>
                            <input type="text" readonly="readonly" style="background:white;" class="form-control date_to" name="dt_to_date" value="">
                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
                            <br>
                            <button type="submit" class="btn btn-primary">@lang('buttons.search')</button>
                            <button type="reset" id="reset"
                                    class="btn btn-danger resetButton"> @lang('buttons.reset')</button>
                        </div>
                    </div>
                </div>

            </form>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th width="20%">@lang('general.name')</th>
                    <th dir="ltr">@lang('general.mobile')</th>
                    <th>@lang('general.email')</th>
                    <th>@lang('general.created_at')</th>
                    <th>@lang('general.seen')</th>
                    <th>@lang('general.options')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td width="25%">@lang('general.username'):</td>
                            <td class="message-sender"></td>
                        </tr>
                        <tr>
                            <td width="25%">@lang('general.mobile'):</td>
                            <td class="message-mobile" dir="ltr"></td>
                        </tr>
                        {{--<tr>
                            <td width="15%">@lang('general.email'):</td>
                            <td class="message-email"></td>
                        </tr>
                        --}}

                        <tr>
                            <td width="10%">@lang('general.sent_at'):</td>
                            <td class="message-date"></td>
                        </tr>

                        <tr>
                            <td width="10%">@lang('general.details'):</td>
                            <td class="message-details"></td>
                        </tr>

                        <tr>
                            <td width="10%">@lang('general.type'):</td>
                            <td class="message-type"></td>
                        </tr>


                        <tr class="message-image" style="display: none">
                            <td width="10%">@lang('general.image'):</td>
                            <td>
                                <img width="100%" class="image-src" src=""/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        @lang('buttons.close')
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js')

    <script>


        $(document).on('click', '.view_message', function () {
            let message = JSON.parse($(this).attr('data-message'));

            console.log('message', message);

            let modal = $('#messageModal');
            modal.find('.message-sender').text(message.s_name);
            /*if (message.user) {
                modal.find('.message-sender').text(message.s_name);
                modal.find('.message-email').text(message.s_email);
            } else {
                modal.find('.message-sender, .message-email').text(message.s_email);
            }
            */


            modal.find('.modal-title').text(message.s_title);
            modal.find('.message-details').html(message.s_content.replace(/\n/g,"<br>"));

            modal.find('.message-mobile').text(message.s_mobile);
            modal.find('.message-date').text(message.dt_created_date);

            // let type = '';

            // if(message.e_type == "{{ App\Enums\ContactEnums::CONTACT }}") {
            //     type = "{{ trans('general.contact') }}";
            // }

            // if(message.e_type == "{{ App\Enums\ContactEnums::COMPLAINT }}") {
            //     type = "{{ trans('general.complaint') }}";
            // }

            // if(message.e_type == "{{ App\Enums\ContactEnums::SUGGESTION }}") {
            //     type = "{{ trans('general.suggestion') }}";
            // }

            // if(message.e_type == "{{ App\Enums\ContactEnums::ANOTHER }}") {
            //     type = "{{ trans('general.another') }}";
            // }


            // modal.find('.message-email').text(message.s_email);

            $('#toggleReadStatus').attr('data-id', message.pk_i_id);

            if (message.b_seen == false) {
                $.getJSON('{{ route('admin.contacts.status') }}?id=' + message.pk_i_id, function (data) {
                    $('#datatable').DataTable().ajax.reload(null, false);
                });

            }

            modal.modal('show');
        });




        const table = $('#datatable');
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.contacts.data') }}',
            columns: [
                {data: 'pk_i_id'},
                {data: 's_name'},
                {data: 's_mobile'},
                {data: 's_email',},
                {data: 'dt_created_date'},
                {data: 'enabled_html', name: "b_seen", searchable: false},
                {data: 'actions_column', searchable: false, sortable: false, responsivePriority: -1},
            ]
        });

        $(document).on('click','#exportBtn',function (e) {
            let _href = $(this).data('href');
            let formData = $('#filterForm').serialize();
            $(this).attr('href',_href+ '?' + formData);
        })
    </script>
@endpush
