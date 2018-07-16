<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Libs\Configs\StatusConfig;

class CategoryController extends Controller
{
	private $languageModel, $categoryModel;
	public function __construct(Language $language, Category $category)
	{
		$this->languageModel = $language;
		$this->categoryModel = $category;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Contents.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Contents.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $languages = $this->languageModel::where('status', StatusConfig::CONST_AVAILABLE)
        							  ->get(); 
        try {
        	$this->categoryModel->parent_id = $request->parent_id;
			$this->categoryModel->status    = $request->status;
			$this->categoryModel->save();

        	foreach ($languages as $key => $language) {
				$this->categoryModel->translateOrNew($language->locale)->name             = $request->name[$language->id];
				$this->categoryModel->translateOrNew($language->locale)->description      = $request->description[$language->id];
				$this->categoryModel->translateOrNew($language->locale)->slug             = $request->name[$language->id];
				$this->categoryModel->translateOrNew($language->locale)->meta_title       = $request->meta_title[$language->id];
				$this->categoryModel->translateOrNew($language->locale)->meta_description = $request->meta_description[$language->id];
				$this->categoryModel->translateOrNew($language->locale)->meta_data        = $request->meta_content[$language->id];
				$this->categoryModel->save();
        	}

        	DB::commit();
        } catch (Exception $e) {
        	DB::rollback();
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
