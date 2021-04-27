<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Workspace;
use App\User;
use Illuminate\Support\Facades\Auth;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.workspace.index');
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
        $workspace = new Workspace;
        $workspace->name = $request->name;
        $workspace->slug = $request->name;
        $workspace->created_by = Auth::user()->id;
        $workspace->save();




    }

    public function workspacetable()
    {

        //$all_asset = AssetType::latest()->first();
        //return $all_asset;
        $workspace = Workspace::all();
        return response()->json(['data'=>$workspace]);


    }
    public function delete($id){
        $workspace = Workspace::find($id);

        $workspace->delete();
        return response()->json($workspace);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function show(Workspace $workspace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function edit(Workspace $workspace,$id)
    {
        $workspace = Workspace::find($id);
        return response()->json($workspace);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workspace $workspace,$id)
    {
        $workspace = Workspace::find($id);
        $workspace->name = $request->name;
        $workspace->slug = $request->name;
        //$workspace->created_by = Auth::user()->id;
        $workspace->save();
        return response()->json($workspace);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workspace $workspace)
    {
        //
    }
}
