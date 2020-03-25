<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Cuisine;
use App\Http\Controllers\Controller;
use App\Repository\CuisineRepository;
use Illuminate\Http\Request;

/**
 * Class CuisineController
 * @package App\Http\Controllers\MasterAdmin
 */
class CuisineController extends Controller
{
    protected $cuisine;

    /**
     * CuisineController constructor.
     * @param CuisineRepository $cuisine_repository
     */
    public function __construct(CuisineRepository $cuisine_repository)
    {
        $this->cuisine = $cuisine_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuisines = $this->cuisine->all();

        foreach ($cuisines as $cuisine) {
            $cuisine->logo = getStorageUrl() . $cuisine->logo;
        }

        return view('master-admin.cuisine.index', [
            'cuisines' => $cuisines
        ]);
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:cuisines',
            'image' => 'required'
        ]);

        if ($request->image) {
            $path = $request->file('image')->store('cuisine');
            $request->request->set('logo', $path);
        }

        $cuisine = $this->cuisine->create($request->except(['_token', 'image']));

        if ($cuisine) {
            $request->session()->flash('success', 'Saved successfully!');
            return redirect(route('master-admin.cuisine.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function show(Cuisine $cuisine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuisine $cuisine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Cuisine $cuisine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuisine $cuisine)
    {
        if ($request->image) {
            $path = $request->file('image')->store('cuisine');
            $request->request->set('logo', $path);
        }

        $update = $cuisine->update($request->except(['_token', 'image']));

        if ($update) {
            $request->session()->flash('success', 'Saved successfully!');
            return redirect(route('master-admin.cuisine.index'));
        }
    }

    /**
     * @param Cuisine $cuisine
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Cuisine $cuisine)
    {
        $delete = $cuisine->delete();
        if ($delete) {
            return response()->json([
                'message' => 'success',
                'data' => []
            ]);
        }
    }
}
