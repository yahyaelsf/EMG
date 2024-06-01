<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Models\TService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $model;

    public function __construct(TService $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.services');
        $pageDescription = trans('navigation.services');

        return view('admin.services.index', compact('pageTitle', 'pageDescription'));
    }


    public function form()
    {
        $id = request('id');
        $service = null;

        if ($id) {
            $service = $this->model->findOrFail($id);
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
                'page' => view('admin.services.form', compact('service', 'inputs'))->render()
            ]
        );
    }

    public function store(StoreServiceRequest $request)
    {

        $input = $request->except('s_cover');
        $localizable = $request->get('localizable');


        if ($id = request('pk_i_id')) {
            $service = $this->model->find($id);
            $service->update($input);
        } else {
            $service = $this->model->create($input);
        }

        $service->syncTranslations($localizable);

        return response()->json([
            'success' => true,
            'message' => trans('alerts.successfully_added'),
            'data' => $service
        ]);
    }

    public function updateStatus(Request $request)
    {
        $service = $this->model->findOrFail($request->id);
        $service->b_enabled = (int) $request->enabled;
        $service->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }


    public function destroy(TService $service)
    {
        $service->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }


    public function datatable(ParentFilter $filters)
    {
        $services = $this->model->select('t_services.*')->filter($filters)->distinct();
        return datatables($services)->addColumn('actions_column', function ($row) {
            return view('admin.services.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
}
