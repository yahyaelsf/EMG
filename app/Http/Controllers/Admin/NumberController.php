<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNumberRequest;
use App\Models\TNumber;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    protected $model;

    public function __construct(TNumber $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.numbers');
        $pageDescription = trans('navigation.numbers');

        return view('admin.numbers.index', compact('pageTitle', 'pageDescription'));
    }


    public function form()
    {
        $id = request('id');
        $number = null;

        if ($id) {
            $number = $this->model->findOrFail($id);
        }

        $inputs = [
            [
                'name' => 's_title',
                'type' => 'text',
                'label' => __('general.title'),
            ],
            [
                'name' => 's_number',
                'type' => 'text',
                'label' => __('general.number'),
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
                'page' => view('admin.numbers.form', compact('number', 'inputs'))->render()
            ]
        );
    }

    public function store(StoreNumberRequest $request)
    {

        $input = $request->except('s_cover');
        $localizable = $request->get('localizable');


        if ($id = request('pk_i_id')) {
            $number = $this->model->find($id);
            $number->update($input);
        } else {
            $number = $this->model->create($input);
        }

        $number->syncTranslations($localizable);

        return response()->json([
            'success' => true,
            'message' => trans('alerts.successfully_added'),
            'data' => $number
        ]);
    }

    public function updateStatus(Request $request)
    {
        $number = $this->model->findOrFail($request->id);
        $number->b_enabled = (int) $request->enabled;
        $number->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }


    public function destroy(TNumber $number)
    {
        $number->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }


    public function datatable(ParentFilter $filters)
    {
        $numbers = $this->model->select('t_numbers.*')->filter($filters)->distinct();
        return datatables($numbers)->addColumn('actions_column', function ($row) {
            return view('admin.numbers.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
}
