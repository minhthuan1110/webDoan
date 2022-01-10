<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Article;
use App\Models\Attribute;
use App\Models\Comment;
use App\Models\Location;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\Tour;
use App\Models\TourImage;
use App\Models\TourPlan;
use App\Models\Vote;
use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    // protected $baseRepository;

    // public function __construct(RepositoryInterface $repositoryInterface)
    // {
    //     $this->baseRepository = $repositoryInterface;
    // }

    /**
     * Trang HOME.
     */
    public function home()
    {
        $sliders = Slider::where('display', 1)->get();
        $northTours = Area::where('name', 'like', 'mien bac')->first()
            ->tours()->where('display', 1)->latest()->take(10)->get();
        $centralTours = Area::where('name', 'like', 'mien trung')->first()
            ->tours()->where('display', 1)->latest()->take(10)->get();
        $southTours = Area::where('name', 'like', 'mien nam')->first()
            ->tours()->where('display', 1)->latest()->take(10)->get();
        $hotTours = Tag::where('name', 'like', 'hot')->first()
            ->tours()->where('display', 1)->take(12)->get();
        // dd($hotTours);
        $northId =  Area::where('name', 'like', 'mien bac')->first()->id;
        $centralId =  Area::where('name', 'like', 'mien trung')->first()->id;
        $southId =  Area::where('name', 'like', 'mien nam')->first()->id;
        $foreignTours = Tour::where([
            ['area_id', '<>', $northId],
            ['area_id', '<>', $centralId],
            ['area_id', '<>', $southId],
            ['display', 1],
        ])->take(10)->get();
        $articles = Article::limit(3)->latest()->get();

        return view('frontend.index', compact('sliders', 'northTours', 'centralTours', 'southTours', 'hotTours', 'foreignTours', 'articles'));
    }

    /**
     * Trang hien thi tour (All tour, tour theo tag)
     */
    public function listTour(Request $request)
    {
        $tag = $request->query('tag');
        $area = $request->query('area');
        $location = $request->query('location');

        // lấy danh sách theo khu vực (bắc, trung, nam)
        if (isset($area)) {
            $title = [
                'slider' => __('Khu vực không chính xác'),
                'title' =>  __('Khu vực không chính xác'),
            ];
            $tours = null;

            if (strcasecmp($area, 'mien bac') == 0) {
                $title = [
                    'slider' => __('Tour Miền Bắc'),
                    'title' =>  __('Tour Miền Bắc'),
                ];
                $tours = Area::where('name', 'like', $area)->first()
                    ->tours()->where('display', 1)->latest()->paginate(10);
            }
            if (strcasecmp($area, 'mien trung') == 0) {
                $title = [
                    'slider' => __('Tour Miền Trung'),
                    'title' =>  __('Tour Miền Trung'),
                ];
                $tours = Area::where('name', 'like', $area)->first()
                    ->tours()->where('display', 1)->latest()->paginate(10);
            }
            if (strcasecmp($area, 'mien nam') == 0) {
                $tt = '';
                $title = [
                    'slider' => __('Tour Miền Nam'),
                    'title' =>  __('Tour Miền Nam'),
                ];
                $tours = Area::where('name', 'like', $area)->first()
                    ->tours()->where('display', 1)->latest()->paginate(10);
            }
            if (strcasecmp($area, 'nuoc ngoai') == 0) {
                $title = [
                    'slider' => __('Tour Nước Ngoài'),
                    'title' =>  __('Tour Nước Ngoài'),
                ];
                $tours = Area::where([
                    ['name', '<>', 'mien bac'],
                    ['name', '<>', 'mien trung'],
                    ['name', '<>', 'mien nam'],
                    ['display', 1],
                ])->first()->tours()->latest()->paginate(10);
            }
        }

        if (isset($location)) {
            $title = [
                'slider' => __('Tour theo địa điểm'),
                'title' =>  __('Tour theo địa điểm'),
            ];
            $tours = Location::where('name', 'like', $area)->first()
                ->tours()->where('display', 1)->latest()->paginate(10);
        }

        // lấy list theo tag (hot, new,...)
        if (isset($tag)) {
            $tours = Tag::where('name', 'like', $tag)->first()
                ->tours()->where('display', 1)->latest()->paginate(10);
            $title = [
                'slider' => 'Tag: ' . $tag,
                'title' =>  __('Tìm kiếm Tag'),
            ];
        }
        // dd(empty($area), $tag, $title, $tours);
        return view('frontend.tour.list', compact('title', 'tours'));
    }

    public function search(Request $request)
    {
        $tours = Tour::where([
            ['name', 'like', '%' . $request->keyword . '%'],
            ['display', 1],
        ])->orderBy('name')->paginate(10);
        $title = [
            'slider' => __('Kết quả tìm kiếm'),
            'title' => __('Kết quả tìm kiếm'),
        ];
        // dd($tours);

        return view('frontend.tour.list', compact('tours', 'title'));
    }

    /**
     * ! Trang DESTINATION.
     */
    public function destination()
    {
        $tours = Location::has('tours')->get();

        return view('frontend.destination', compact('tours'));
    }

    /**
     * Tất cả tour
     */
    public function allTour()
    {
        $tours = Tour::latest()->where('display', 1)->paginate(10);
        $title = [
            'slider' => __('Toàn bộ tour'),
            'title' =>  __('Tour'),
        ];

        return view('frontend.tour.list', compact('title', 'tours'));
    }

    /**
     * Trang TOUR DOMESTIC.
     */
    public function domestic()
    {
        $tours = Tour::select('tours.id', 'tours.name', 'tours.image_path', 'tours.description', 'tours.other_day', 'tours.adult_price', 'tours.destination', 'tours.slot')
            ->join('areas', 'tours.area_id', '=', 'areas.id')->where([
                ['areas.domestic', 1],
                ['display', 1],
            ])->paginate(10);
        $title = [
            'title' => 'Tour trong nước',
            'slider' => 'Tour trong nước',
        ];
        // dd($tours);

        return view('frontend.tour.list', compact('tours', 'title'));
    }

    /**
     * Trang TOUR FOREIGN.
     */
    public function foreign()
    {
        $tours = Tour::select('tours.id', 'tours.name', 'tours.image_path', 'tours.description', 'tours.other_day', 'tours.adult_price', 'tours.destination', 'tours.slot')
            ->join('areas', 'tours.area_id', '=', 'areas.id')->where([
                ['areas.domestic', 0],
                ['display', 1],
            ])->paginate(10);
        $title = [
            'title' => 'Tour nước ngoài',
            'slider' => 'Tour nước ngoài',
        ];
        // dd($tours);

        return view('frontend.tour.list', compact('tours', 'title'));
    }

    /**
     * Trang DETAIL TOUR
     */
    public function detailTour($tourId)
    {
        $tour = Tour::find($tourId);
        $tags = $tour->tags()->get();
        $vehicles = $tour->vehicles()->get();
        $includes =
            Tour::select('values.id', 'values.attribute_id', 'values.tour_id', 'values.value')->join('values', 'tours.id', '=', 'values.tour_id')
            ->where([
                ['values.attribute_id', Attribute::select('id')->where('name', 'included')->first()->id],
                ['values.tour_id', $tourId],
            ])->first();
        $notIncludes =
            Tour::select('values.id', 'values.attribute_id', 'values.tour_id', 'values.value')->join('values', 'tours.id', '=', 'values.tour_id')
            ->where([
                ['values.attribute_id', Attribute::select('id')->where('name', 'not included')->first()->id],
                ['values.tour_id', $tourId],
            ])->first();
        // $area = $tour->area()->name;
        $location = $tour->location()->first();
        // tinh so trung binh cua vote
        // $tourVote = Vote::where('tour_id', $tour->id);
        // $sum = 0;
        // foreach ($tourVote->get() as $item) {
        //     $sum += $item->rate;
        // }
        // $vote = $sum / ($tourVote->count());

        // Tour Plan
        $plans = TourPlan::where('tour_id', $tourId)->orderBy('day')->get();

        // Tour Image
        $images = TourImage::where('tour_id', $tourId)->get();

        // Binh luan & danh gia
        // $comments = Comment::select('comments.content', 'comments.created_at', 'users.name', 'users.avatar_image_path', 'users.profile_image_path')->join('users', 'comments.user_id', '=', 'users.id')->where('comments.tour_id', $tourId)->get();
        // dd(array_slice($images->toArray(), 0, 3));


        return view('frontend.tour.detail', compact('tour', 'tags', 'vehicles', 'includes', 'notIncludes', 'plans', 'location', 'images'));
        // , 'area', 'vote', 'images', 'comments'
    }

    /**
     * Trang BLOG
     */
    public function blog()
    {
        $articles = Article::where('display', 1)->latest()->paginate(10);

        return view('frontend.blog.list', compact('articles'));
    }

    public function detailArticle($articleId)
    {
        $article = Article::where([
            ['id', '=', $articleId],
            ['display', '=', 1],
        ])->first();

        $latest = Article::where([
            ['display', 1],
            ['id', '<>', $articleId],
        ])->latest()->take(3)->get();

        $publisher = isset($article) ? Article::find($articleId)->admin()->first() : null;
        // dd($article);

        return view('frontend.blog.detail', compact('article', 'latest', 'publisher'));
    }

    /**
     * Trang CONTACT US
     */
    public function contact()
    {
        $contacts = DB::table('contacts')->get();

        return view('frontend.contact_us', compact('contacts'));
    }

    /**
     * Trang ABOUT US
     */
    public function about()
    {
        $aboutUs = DB::table('about')->first('about_us');
        $hotTours = Tag::where('name', 'like', 'hot')->first()->tours()->take(12)->get();

        return view('frontend.about_us', compact('aboutUs', 'hotTours'));
    }
}
