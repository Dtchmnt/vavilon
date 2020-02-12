<?php

namespace App\Http\Controllers\shop\Admin;

use App\Http\Controllers\Shop\Admin\AdminBaseController;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends AdminBaseController
{

    public function index(Partner $productPartner)
    {
        $rootPartners = $productPartner->rootPartners();
        return view('shop.admin.partner.index', [
            'rootPartners' => $rootPartners,
        ]);
    }

    public function create()
    {
        return view('shop.admin.partner.create', [
            'partner' => [],
            'partners' => Partner::class,
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
        Partner::create($request->all());
        return redirect()->route('shop.admin.partner.index.store');
    }

    public function edit(Partner $partner)
    {
        return view('shop.admin.partner.edit', [
            'partner' => $partner,
            'partners' => Partner::class,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Partner $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->all());
        return redirect()->route('shop.admin.partner.index.index');
    }


    /**
     * @param Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('shop.admin.partner.index.store');
    }
}
