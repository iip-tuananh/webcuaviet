<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\BannerAds;
use App\models\website\Video;
use App\models\website\Founder;
use App\models\website\Prize;
use App\models\website\AlbumAffter;
use App\models\ReviewCus;
use App\models\PageContent;
use App\models\Services;
use App\models\Project;

class HomeController extends Controller
{
    public function home()
    {
        $data['hotnews'] = Blog::where([
            ['status','=',1]
        ])->orderBy('id','DESC')->limit(8)->get(['id','title','slug','created_at','image','description']);
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image']);
        $data['taisao'] = PageContent::where(['slug'=>'tai-sao','language'=>'vi'])->first(['id','title','content','image','description']);
        $data['service'] = Services::where(['status'=>1,'status_home'=>1])->get();
        $data['bannerads'] = BannerAds::where(['status'=>1,'status_show'=>'banner_ads'])->get();
        $data['ReviewCus'] = ReviewCus::where(['status'=>1])->get();
        $data['Partner'] = Partner::where(['status'=>1])->get();
        $data['duan'] = Project::with(['cateService'])->where('status',1)->limit(6)->get();
        $data['homePro'] = Product::where(['status'=>1,'discountStatus'=>1])
            ->select('id','category','name','discount','price','images','slug','cate_slug','type_slug','description','status_variant')
            ->limit(10)->orderBy('id','DESC')->get();
        return view('home',$data);
    }
}
