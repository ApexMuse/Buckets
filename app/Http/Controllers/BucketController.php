<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class BucketController extends Controller
{

    private function validateRequest(): array
    {
        return request()->validate([
            'name' => 'required|max:25',
            'balance' => 'required|between:0,999999.99'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store()
    {
        $bucket = Bucket::create($this->validateRequest());
        return redirect($bucket->path);
    }

    /**
     * Display the specified resource.
     *
     * @param Bucket $bucket
     * @return Response
     */
    public function show(Bucket $bucket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bucket $bucket
     * @return Response
     */
    public function edit(Bucket $bucket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Bucket $bucket
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Bucket $bucket)
    {
        $bucket->update($this->validateRequest());
        return redirect($bucket->path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bucket $bucket
     * @return Application|RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy(Bucket $bucket)
    {
        $bucket->delete();
        return redirect('/buckets');
    }
}
