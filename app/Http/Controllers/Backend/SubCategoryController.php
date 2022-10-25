<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageUpload;
use App\Helpers\SubCategory\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Interfaces\CrudInterface;
use App\Models\Category;
use App\Models\SubCategory as ModelsSubCategory;
use Exception;
use File;

class SubCategoryController extends Controller
{
    private $crudInterface;
    public function __construct(CrudInterface $crudInterface)
    {
        $this->crudInterface = $crudInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = $this->crudInterface->getAll();
        return view('backend.pages.sub_category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.sub_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->has('image')) {
            $reImage =  ImageUpload::upload($request, 'image', 'images/sub_category');
            //now save in database
            $data['image'] = $reImage;
        } else {
            $data['image'] = '';
        }
            // ModelsSubCategory::create($data);
            $this->crudInterface->add($data); 
        
        return back()->with('success', ' Sub Category add Successfully');
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
        
        $subCategory = $this->crudInterface->findById($id);
        return view('backend.pages.sub_category.edit', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, $id)
    {
        $subCategory = $this->crudInterface->findById($id);

        $data = $request->validated();
        if ($request->has('image')) {

            if (File::exists('images/category/' . $subCategory->image)) {
                File::delete('images/category/' . $subCategory->image);
            }
            $reImage =  ImageUpload::upload($request, 'image', 'images/sub_category');
            //now save in database
            $data['image'] = $reImage;
        }
        $this->crudInterface->update($data, $id);
        return back()->with('success', 'Category add Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->crudInterface->delete($id);
        return back()->with('success', 'Category deleted successfully.');
    }
}
