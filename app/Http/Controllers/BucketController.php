<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return Response
     */
    public function store()
    {
        Bucket::create($this->validateRequest());
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
     *
     * @param Bucket $bucket
     * @return Response
     */
    public function update(Bucket $bucket)
    {
        $bucket->update($this->validateRequest());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bucket $bucket
     * @return Response
     */
    public function destroy(Bucket $bucket)
    {
        //
    }
}
