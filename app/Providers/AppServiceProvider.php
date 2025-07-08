<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Session, View;
use App\models\website\Setting;
use App\models\website\Banner;
use Cart, Auth;
use App\models\PageContent;
use Laravel\Dusk\DuskServiceProvider;
use App\models\product\Category;
use App\models\language\Language;
use App\models\blog\BlogCategory;
use App\models\ServiceCate;
use App\models\website\Video;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            if (Auth::guard('customer')->user() != null) {
                $profile = Auth::guard('customer')->user();
            } else {
                $profile = "";
            }
            $language_current = Session::get('locale');
            $setting = Setting::first();
            $lang = Language::get();
            $video = Video::where('status', 1)->orderBy('id', 'DESC')->get();
            $pageContent = PageContent::where(['language' => $language_current, 'status' => 1])->get();
            $categoryhome = Category::with([
                'typeCate' => function ($query) {
                    $query->with(['products'])->where('status', 1)->orderBy('id', 'ASC')->select('cate_id', 'id', 'name', 'avatar', 'slug', 'cate_slug');
                }
            ])->where('status', 1)->orderBy('id', 'ASC')->get(['id', 'name', 'imagehome', 'avatar', 'slug'])->map(function ($query) {
                $query->setRelation('product', $query->product->take(8));
                return $query;
            });
            $banner = Banner::where(['status' => 1])->get(['id', 'image', 'link', 'title', 'description']);
            $servicehome = ServiceCate::where('status', 1)->get();
            $hotrokhachhang = PageContent::where([
                'type' => 'ho-tro-khanh-hang',
                'language' => $language_current,
                'status' => 1
            ])->get();
            $blogCate = BlogCategory::with([
                'typeCate' => function ($query) {
                    $query->select('id', 'slug', 'name', 'avatar', 'category_slug');
                }
            ])
                ->where('status', 1)
                ->orderBy('id', 'DESC')
                ->get(['id', 'name', 'slug', 'avatar'])->map(function ($query) {
                    $query->setRelation('listBlog', $query->listBlog->take(12));
                    return $query;
                });
            $view->with([
                'setting' => $setting,
                'pageContent' => $pageContent,
                'lang' => $lang,
                'banner' => $banner,
                'profile' => $profile,
                'categoryhome' => $categoryhome,
                'blogCate' => $blogCate,
                'servicehome' => $servicehome,
                'hotrokhachhang' => $hotrokhachhang,
                'video' => $video,
            ]);
        });
    }
}
