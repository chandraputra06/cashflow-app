<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return response()->json([
            'data' => $category,
            'message' => 'success',
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json([
                'data' => $category,
                'message' => 'success',
            ],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' =>$th->getMessage(),
            ],400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        return response()->json([
                'data' => $category,
                'message' => 'success',
            ],200);   
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
         DB::beginTransaction();
        try {
            $category = Category::update([
                'name' => $request->name,
            ]);

            DB::commit();
            return response()->json([
                'data' => $category,
                'message' => 'success',
            ],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi Kesalahan',
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         DB::beginTransaction();
        try {
            $category->delete();

            DB::commit();
            return response()->json([
                'message' => 'success',
            ],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi Kesalahan',
            ],400);
        }
    }
}