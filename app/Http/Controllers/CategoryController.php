<?php

namespace Abyskit\Http\Controllers;

use AbysKit\Http\Controllers\FileController as Files;
use AbysKit\CategoryInfo;
use AbysKit\Http\Requests\CreateCategory;
use AbysKit\Http\Requests\UpdateCategory;
use AbysKit\Locale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use AbysKit\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Category::select('categories.id', 'slug', 'status', 'title', 'categories.created_at');

        ($request->input("status") > -1) && $list = $list->where('status', (int) $request->input("status"));
        ($request->input('parent')) && $list = $list->where('category_parent_id', $request->input('parent'));

        $list = $list->leftJoin('category_infos', 'categories.id', 'category_infos.category_id')->where('locale_id', session('locale.id'));

        ($request->input('search')) && $list = $list->where('title', 'like', '%'. $request->input('search') .'%');

        return view('abyskit::layouts.category.list', [
            "list" => $list->orderBy('categories.id', 'desc')->paginate(15),
            "parentList" => Category::where('category_parent_id', 0)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abyskit::layouts.category.new', [
            'list' => Category::where('category_parent_id', 0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \AbysKit\Http\Requests\CreateCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $item = new Category();

        $item->slug = str_slug($request->input('slug'));
        $item->status = $request->input('status');
        $item->category_parent_id = $request->input('category_parent_id');
        $item->product = $request->input('product');
        $item->thumbnail = '/abyskit/img/default_bg.jpg';

        $item->save();

        $locales = Locale::all();

        foreach ($locales as $locale) {
            $itemInfo = new CategoryInfo();

            $itemInfo->title = ucfirst($request->input('slug'));
            $itemInfo->locale_id = $locale->id;
            $itemInfo->category_id = $item->id;

            $itemInfo->save();
        }

        return redirect()->back()->with('success', trans('abyskit::actions.create_success', ['name' => trans('abyskit::default.category')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::find($id);

        return ($item)
            ? view('abyskit::layouts.category.edit', ['item' => $item, 'list' => Category::where('category_parent_id', 0)->get()])
            : response(view('abyskit::errors.404'), 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \AbysKit\Http\Requests\UpdateCategory $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $item = Category::find($id);

        if($item) {
            $item->slug = str_slug($request->input('slug'));
            $item->status = $request->input('status');
            $item->category_parent_id = $request->input('category_parent_id');
            $item->product = $request->input('product');

            ($request->hasFile("thumbnail")) && $item->thumbnail = Files::upload_image($request->file('thumbnail'), 'categories/' . $id, 'thumbnail');

            $item->save();
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
        $item = Category::find($id);

        ($item) && $item->delete();

        return redirect()->back()->with('success', trans('abyskit::actions.delete_success', ['name' => trans('abyskit::default.category')]));
    }
}
