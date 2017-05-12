<?php

namespace Abyskit\Http\Controllers;

use AbysKit\CategoryInfo;
use AbysKit\Http\Requests\UpdateCategoryInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AbysKit\Http\Requests\UpdateCategoryInfo  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryInfo $request)
    {
        foreach ($request->input('info') as $requestItemId => $requestItem) {
            $item = CategoryInfo::find($requestItemId);

            if($item) {
                $item->title = $requestItem['title'];
                $item->price_measurement = $requestItem['price_measurement'];
                $item->excerpt = $requestItem['excerpt'];

                $item->save();
            }
        }

        return redirect()->back()->with('success', trans('abyskit::actions.update_success', ['name' => trans('abyskit::default.category')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
