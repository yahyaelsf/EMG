<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuccessRequest;
use App\Models\TSuccess;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
        protected $model;

    public function __construct(TSuccess $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.successes');
        $pageDescription = trans('navigation.successes');

        return view('admin.successes.index', compact('pageTitle', 'pageDescription'));
    }


    public function form()
    {
        $id = request('id');
        $success = null;

        if ($id) {
            $success = $this->model->findOrFail($id);
        }

        $inputs = [
            [
                'name' => 's_title',
                'type' => 'text',
                'label' => __('general.title'),
            ],
            [
                'name' => 's_description',
                'type' => 'textarea',
                'label' => __('general.description'),
                'rows' => '2'
            ]
        ];


        return response()->json(
            [
                'title' => trans('general.add_edit'),
                'page' => view('admin.successes.form', compact('success', 'inputs'))->render()
            ]
        );
    }

    public function store(StoreSuccessRequest $request)
    {

        $input = $request->except('s_cover');
        $localizable = $request->get('localizable');


        if ($id = request('pk_i_id')) {
            $success = $this->model->find($id);
            $success->update($input);
        } else {
            $success = $this->model->create($input);
        }

        $success->syncTranslations($localizable);

        return response()->json([
            'success' => true,
            'message' => trans('alerts.successfully_added'),
            'data' => $success
        ]);
    }

    public function updateStatus(Request $request)
    {
        $success = $this->model->findOrFail($request->id);
        $success->b_enabled = (int) $request->enabled;
        $success->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }


    public function destroy(TSuccess $success)
    {
        $success->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }


    public function datatable(ParentFilter $filters)
    {
        $successes = $this->model->select('t_success.*')->filter($filters)->distinct();
        return datatables($successes)->addColumn('actions_column', function ($row) {
            return view('admin.successes.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
}
