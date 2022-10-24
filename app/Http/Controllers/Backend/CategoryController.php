<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Interfaces\CrudInterface;
use Exception;
use File;

class CategoryController extends Controller
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
        $categories= $this->crudInterface->getAll();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();
        if($request->has('image')){
            $reImage =  ImageUpload::upload($request,'image','images/category');
              //now save in database
             $data['image'] = $reImage;
 
         }else{
            $data['image'] = '';
         }
        // Category::create($data);
      try {
        $this->crudInterface->add($data);
      } catch (Exception $e) {
        return $e->getMessage();
      }
        return back()->with('success','Category add Successfully');
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
        $category = $this->crudInterface->findById($id);
        return view('backend.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->crudInterface->findById($id);
    
        $data = $request->validated();
        if($request->has('image')){
            
            if (File::exists('images/category/' . $category->image)) {
                File::delete('images/category/' . $category->image);
            }
            $reImage =  ImageUpload::upload($request,'image','images/category');
              //now save in database
             $data['image'] = $reImage;
 
         }
        $this->crudInterface->update($data,$id);
        return back()->with('success','Category add Successfully');

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
        return back()->with('success','Category deleted successfully.');
    }
}
