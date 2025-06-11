<?php

namespace App\Http\Controllers;

use App\Models\Seeing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SeeingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "description" => "sometimes|string",
            "image" => "sometimes|image|mimes:png,jpg,jpeg,webp|max:2048",
            "sight_date" => "sometimes|date"
        ]);

        if ($request->hasFile("image")) {
            $uploadedFileUrl = Cloudinary::upload($request->file("image")->getRealPath())->getSecurePath();
            $data['image_url'] = $uploadedFileUrl;
        } else {
            $data['image_url'] = null;
        }

        $data["user_id"] = auth()->id();
        $data['status'] = "pending";

        $seeing = Seeing::create($data);

        return response()->json($seeing, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seeing $seeing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seeing $seeing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seeing $seeing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seeing $seeing)
    {
        //
    }
}
