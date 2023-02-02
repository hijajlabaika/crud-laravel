<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project_name = $request->project_name;
        $client_id = $request->client_id;
        $project_status = $request->project_status;


        $client = Client::all();
        if (!empty($project_name)) {
            $datas = dashboard::where('project_name', 'LIKE', '%' . $project_name . '%')
                ->where('client_id', 'LIKE', '%' . $client_id . '%')
                ->where('project_status', 'LIKE', '%' . $project_status . '%')
                ->with('client')
                ->latest()
                ->get();
        } else if (!empty($client_id)) {
            $datas = dashboard::where('client_id', 'LIKE', '%' . $client_id . '%')
                ->where('project_status', 'LIKE', '%' . $project_status . '%')
                ->with('client')
                ->latest()
                ->get();
        } else if (!empty($project_status)) {
            $datas = dashboard::where('project_status', 'LIKE', '%' . $project_status . '%')
                ->with('client')
                ->latest()
                ->get();
        } else {
            $datas = dashboard::with('client')
                ->latest()
                ->get();
        }

        return view('index', compact(
            'datas',
            'client',
            'project_name',
            'project_status',
            'client_id'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();

        return view('project.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new dashboard;

        $model->project_name = $request->project_name;
        $model->project_start = $request->project_start;
        $model->project_end = $request->project_end;
        $model->project_status = $request->project_status;
        $model->client_id = $request->client_id;
        $model->save();

        return redirect('/')->with('toast_success', 'Project Created Successfully!');
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
    public function edit(Request $request)
    {
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
        $model = dashboard::findOrfail($id);

        $model->project_name = $request->project_name;
        $model->client_id = $request->client_id;
        $model->project_start = $request->project_start;
        $model->project_end = $request->project_end;
        $model->project_status = $request->project_status;

        $model->save();
        return redirect('/')->with('toast_success', 'Update has been Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = dashboard::find($id);
        $model->delete();
        return response()->json(['success' => 'Project has been deleted']);
    }

    public function destroyAll(Request $request)
    {
        $ids = $request->ids;
        dashboard::whereIn('id', $ids)->delete();

        return back();
    }
}
