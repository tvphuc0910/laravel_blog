<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\TagService;

class TagController extends Controller
{

    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [
            'tags' => $this->tagService->index(),
        ];

        return view('admin.tag.index')->with($viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $this->tagService->store($request);

        toastr()->closeButton(true)->addSuccess('Thêm thành công !');

        return redirect()->route('tags.index')->with('message', 'Thêm thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tag.show', [
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $tag)
    {
        $this->tagService->update($request, $tag);

        toastr()->closeButton(true)->addSuccess('Cập nhật thành công !');

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyTagRequest $request, $tag)
    {
        $this->tagService->destroy($tag);
        toastr()->closeButton(true)->addSuccess('Xoá thành công !');
//        return redirect()->route('tags.index');
    }
}
