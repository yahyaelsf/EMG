<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ParentFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Models\TSlider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
        protected $model;

    public function __construct(TSlider $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $pageTitle = trans('navigation.sliders');
        $pageDescription = trans('navigation.sliders');

        return view('admin.sliders.index', compact('pageTitle', 'pageDescription'));
    }


    public function form()
    {
        $id = request('id');
        $slider = null;

        if ($id) {
            $slider = $this->model->findOrFail($id);
        }

        $inputs = [
            [
                'name' => 's_title',
                'type' => 'text',
                'label' => __('general.title'),
            ],

        ];


        return response()->json(
            [
                'title' => trans('general.add_edit'),
                'page' => view('admin.sliders.form', compact('slider', 'inputs'))->render()
            ]
        );
    }

    public function store(StoreSliderRequest $request)
    {

        $input = $request->except('s_cover');
        $localizable = $request->get('localizable');


        if ($id = request('pk_i_id')) {
            $slider = $this->model->find($id);
            $slider->update($input);
        } else {
            $slider = $this->model->create($input);
        }

        $slider->syncTranslations($localizable);

        return response()->json([
            'success' => true,
            'message' => trans('alerts.successfully_added'),
            'data' => $slider
        ]);
    }

    public function updateStatus(Request $request)
    {
        $slider = $this->model->findOrFail($request->id);
        $slider->b_enabled = (int) $request->enabled;
        $slider->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }


    public function destroy(TSlider $slider)
    {
        $slider->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', trans('alerts.successfully_deleted'));
    }


    public function datatable(ParentFilter $filters)
    {
        $sliders = $this->model->select('t_sliders.*')->filter($filters)->distinct();
        return datatables($sliders)->addColumn('actions_column', function ($row) {
            return view('admin.sliders.datatable.actions', compact('row'));
        })->rawColumns(['enabled_html', 'actions_column'])->make(true);
    }
}
