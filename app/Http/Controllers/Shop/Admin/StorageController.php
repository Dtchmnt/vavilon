<?php

namespace App\Http\Controllers\shop\Admin;

use App\Http\Controllers\Shop\Admin\AdminBaseController;
use App\Storage;
use Illuminate\Http\Request;

class StorageController extends AdminBaseController
{

    public function index(Storage $productStorage)
    {
        $rootStorages = $productStorage->rootStorages();
        return view('shop.admin.storage.index', [
            'rootStorages' => $rootStorages,
        ]);
    }

    public function create()
    {
        return view('shop.admin.storage.create', [
            'storage' => [],
            'storages' => Storage::class,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::create($request->all());
        return redirect()->route('shop.admin.storage.index.store');
    }

    public function edit(Storage $storage)
    {
        return view('shop.admin.storage.edit', [
            'storage' => $storage,
            'storages' => Storage::class,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Storage $storage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storage $storage)
    {
        $storage->update($request->all());
        return redirect()->route('shop.admin.storage.index.index');
    }


    /**
     * @param Storage $storage
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Storage $storage)
    {
        $storage->delete();

        return redirect()->route('shop.admin.storage.index.store');
    }
}
