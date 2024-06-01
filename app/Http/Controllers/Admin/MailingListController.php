<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MailingListExport;
use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Models\TEmail;
use Maatwebsite\Excel\Facades\Excel;

class MailingListController extends Controller
{
    protected $model;

    public function __construct(TEmail $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.mailing_list');
        return view('admin.mailing-list.index', compact('pageTitle'));
    }


    public function export()
    {
        return Excel::download(new MailingListExport(), 'emails_' . time() . '.xlsx');
    }


    public function datatable(ParentFilter $filters)
    {
        $emails = $this->model->query();

        return datatables($emails)->addColumn('actions_column', function ($row) {
            return view('admin.mailing-list.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
}
