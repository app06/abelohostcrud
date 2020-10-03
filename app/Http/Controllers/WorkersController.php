<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Worker;

class WorkersController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        $graphLabels = Worker::getLabelsForGraph();
        $graphValues = Worker::getValuesForGraph();

        return view('workers.index',
            compact('workers', 'graphLabels', 'graphValues'));
    }

    public function create()
    {
        return view('workers.create');
    }

    public function store(WorkerRequest $request)
    {
        Worker::create($request->all());

        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    public function update(WorkerRequest $request, Worker $worker)
    {
        $worker->update($request->all());

        return redirect()->route('workers.index');
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index');
    }
}
