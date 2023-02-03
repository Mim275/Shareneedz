<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\MobileBanking;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Team;
use App\Models\Donner;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $gallerys = Gallery::all();
        $teams = Team::all();
        $donners = Donner::all();
        $localization   =  App::getLocale();
        $setting = SiteSetting::first();
        return view('index', compact('setting','sliders','gallerys', 'teams', 'donners', 'localization'));
    }
   
    public function donate(){
        $banks = BankAccount::all();
        $mobils = MobileBanking::all();
        $setting = SiteSetting::first();
        return view('donate', compact('setting','mobils','banks'));
    }
    public function share(){
        $setting = SiteSetting::first();
        $user = Auth::user();
        return view('share', compact('setting', 'user'));
    }
    public function food(){
        $setting = SiteSetting::first();
        $posts = Post::where('category' ,'=' ,'food')->orWhere('category', '=' , 'খাদ্য')->orderBy('id', 'DESC')->paginate(9);
        return view('category/food', compact('setting', 'posts'));
    }
    public function cloth(){
        $setting = SiteSetting::first();
        $posts = Post::where('category' ,'=' ,'cloth')->orWhere('category', '=' , 'কাপড়')->orderBy('id', 'DESC')->paginate(9);
        return view('category/cloth', compact('setting', 'posts'));
    }
    public function book(){
        $setting = SiteSetting::first();
        $posts = Post::where('category' ,'=' ,'book')->orWhere('category', '=' , 'বই')->orderBy('id', 'DESC')->paginate(9);
        return view('category/book', compact('setting','posts'));
    }
    public function help(){
        $setting = SiteSetting::first();
        return view('help', compact('setting'));
    }
     // search 
     public function search(Request $request){
        $setting = SiteSetting::first();
        if(isset($_GET['search'])){
            $search_text = $_GET['search'];
            $posts = Post::where('product', 'LIKE','%'.$search_text.'%')->orWhere('category', 'LIKE','%'.$search_text.'%')->orWhere('address', 'LIKE','%'.$search_text.'%')->orWhere('type', 'LIKE','%'.$search_text.'%')->paginate(9);
            $posts->appends($request->all());
            return view('category/search', ['posts' => $posts],compact('setting'));
        }else{
            return view('category/search', compact('setting'));
        }
    }
   

}
