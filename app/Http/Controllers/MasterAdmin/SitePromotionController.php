<?php

namespace App\Http\Controllers\MasterAdmin;

use App\Repository\SitePromotionRepository;
use App\SitePromotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class SitePromotionController
 * @package App\Http\Controllers\MasterAdmin
 */
class SitePromotionController extends Controller
{
    protected $site_promotion;

    /**
     * SitePromotionController constructor.
     * @param SitePromotionRepository $site_promotion_repository
     */
    public function __construct(SitePromotionRepository $site_promotion_repository)
    {
        $this->site_promotion = $site_promotion_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = $this->site_promotion->getSetting();

        $promotions = $this->site_promotion->get();

        foreach ($promotions as $promotion) {
            $promotion->deleted = true;
            if ($promotion->trashed()) {
                $promotion->deleted = false;
            }
        }

        return view('master-admin.site-promotion.index', [
            'promotions' => $promotions,
            'setting' => $setting
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $setting = $this->site_promotion->getSetting();

        $setting->update([
            'promocode' => $request->promocode
        ]);

        if ($request->promotions) {
//            dd($request->promotions);
            foreach ($request->promotions as $promotion) {
                if (isset($promotion['id'])) {
                    $saved_promotion = $this->site_promotion->getSitePromotion($promotion['id']);
                    if ($saved_promotion) {
                        $saved_promotion->update($promotion);
                    } else {
                        $saved_promotion = $this->site_promotion->create($promotion);
                    }

                } else {
                    $saved_promotion = $this->site_promotion->create($promotion);
                }

                if (isset($promotion['deleted']) && !$promotion['deleted']) {
                    $saved_promotion->delete();
                }

            }
        }


        return response()->json([
            'message' => 'success',
            'data' => [

            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SitePromotion $sitePromotion
     * @return \Illuminate\Http\Response
     */
    public function show(SitePromotion $sitePromotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SitePromotion $sitePromotion
     * @return \Illuminate\Http\Response
     */
    public function edit(SitePromotion $sitePromotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SitePromotion $sitePromotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SitePromotion $sitePromotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SitePromotion $sitePromotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SitePromotion $sitePromotion)
    {
        //
    }
}
