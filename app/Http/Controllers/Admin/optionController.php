<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\optionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class optionController extends Controller
{
    public function index()
    {
        return view('admin.options.index',[
            'options' => Option::paginate(10)
        ]);
    }

    public function create()
    {
        $option = new Option();
        return view('admin.options.form',[
            'option' => $option
        ]);
    }

    public function store(Option $option,optionFormRequest $request)
    {
        $option->create($request->validated());

        return to_route('admin.option.index')->with('success', 'L\'option a été bien creér');
    }

    public function edit(Option $option)
    {
        return view('admin.options.form',[
            'option' => $option
        ]);
    }

    public function update(Option $option,optionFormRequest $request)
    {
        $option->update($request->validated());

        return to_route('admin.option.index')->with('success', 'L\'option a été bien modifier');
    }

    public function destroy(Option $option)
    {
        $option->delete();

        return to_route('admin.option.index')->with('success', 'L\'option a été bien supprimer');
    }

}
