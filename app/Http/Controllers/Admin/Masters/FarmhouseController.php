<?php

namespace App\Http\Controllers\admin\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frarmhouse;
use App\Http\Requests\Admin\Masters\Storefarmhouse;
use App\Http\Requests\Admin\Masters\Updatefarmhouse;
use Illuminate\Support\Facades\DB;

class FarmhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmhouse = Frarmhouse::whereNull('deleted_by')->get();

        return view('admin.masters.farmhouse')->with(['farmhouse'=> $farmhouse]);
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
    public function store(Storefarmhouse $request)
     {
         try
         {

         DB::beginTransaction();
             $input = $request->validated();
             Frarmhouse::create($input);
             DB::commit();

             return response()->json(['success'=> 'Frarmhouse created successfully!']);
         }
         catch(\Exception $e)
         {
             // Replace the respondWithAjax method with a standard JSON response
             return response()->json([
                 'error' => 'An error occurred while creating the farmhouse.',
                 'message' => $e->getMessage(),
         ], 500);
       }
     }


    // Display the specified resource.
    //  */
    public function show(string $id)
     {
    //     //
     }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
     public function edit(string $id)
     {
         $farmhouse = DB::table('frarmhouses')->where('id', $id)->first();
         if ($farmhouse) {
             $response = [
                 'result' => 1,
                 'farmhouse' => $farmhouse,
             ];
         } else {
             $response = ['result' => 0];
         }
         return $response;
     }

    // /**
    //  * Update the specified resource in storage.
    //  */
     public function update(Updatefarmhouse $request, string $id)
     {
         try {
            DB::beginTransaction();
             $input = $request->validated();
             DB::table('frarmhouses')->where('id', $id)->update($input);
            
             DB::commit();

             return response()->json(['success' => 'Frarmhouses updated successfully!']);
         } catch (\Exception $e) {
             // Replace the respondWithAjax method with a standard JSON response
             return response()->json([
                 'error' => 'An error occurred while updating the farmhouse.',
                 'message' => $e->getMessage(),
             ], 500);
        }
     }

    // /**
    //  * Remove the specified resource from storage.
    //  */
     public function destroy(string $id)
       {
         try {
             DB::beginTransaction();
             DB::table('frarmhouses')->where('id', $id)->update([
                 'deleted_by' => auth()->user()->id,
                 'deleted_at' => now(),
             ]);
             DB::commit();

             return response()->json(['success' => 'Frarmhouses deleted successfully!']);
         } catch (\Exception $e) {
             // Replace the respondWithAjax method with a standard JSON response
             return response()->json([
                 'error' => 'An error occurred while deleting the farmhouse.',
                 'message' => $e->getMessage(),
             ], 500);
       }
    }
}
