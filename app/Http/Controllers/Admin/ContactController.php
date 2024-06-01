<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ContactUsFilters;
use App\Http\Controllers\Controller;
use App\Models\TContact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $model;

    public function __construct(TContact $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.settings');
        $pageDescription = trans('navigation.settings');

        return view('admin.contacts.index', compact('pageTitle', 'pageDescription'));
    }


    public function updateStatus(Request $request)
    {
        $user = $this->model->findOrFail($request->id);
        $user->b_seen = !$user->b_seen;
        $user->save();

        return response()->json(['message' => 'contact status updated successfully.']);
    }


    public function destroy(TContact $contact)
    {
        $contact->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }

    public function datatable(ContactUsFilters $filters)
    {
        $contacts = $this->model->filter($filters);

        return datatables($contacts)->addColumn('actions_column', function ($row) {
            return view('admin.contacts.datatable.actions', compact('row'));
        })->addColumn('type_label', function ($row) {
            return trans('general.' . strtolower($row->e_type));
        })->addColumn('s_mobile', function ($row) {
            return '<span dir="ltr">' . $row->s_mobile . '</span>';
        })->rawColumns(['enabled_html', 'actions_column', 's_mobile'])->make(true);
    }


}
