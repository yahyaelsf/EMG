@extends('admin.layouts.dashboard')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand fa fa-list"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('navigation.mailing_list')
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">&nbsp;
                        <a href="{{ route('admin.mailing_list.export') }}"
                           class="btn btn-success btn-icon-sm">
                           <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                          تصدير اكسل
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                <thead>
                <tr>
                    <th >@lang('general.email')</th>
                    <th >@lang('general.created_at')</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


@endsection


@push('js')

    <script>


        const table = $('#datatable');
        table.DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.mailing_list.data') }}',
            columns: [
                {data: 's_email'},
                {data: 'dt_created_date'},
            ]
        });

        $(document).on('click','#exportBtn',function (e) {
            let _href = $(this).data('href');
            let formData = $('#filterForm').serialize();
            $(this).attr('href',_href+ '?' + formData);
        })
    </script>
@endpush
