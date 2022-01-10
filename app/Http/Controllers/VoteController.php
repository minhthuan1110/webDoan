<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Repositories\Vote\VoteRepositoryInterface;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    protected $repo;

    public function __construct(VoteRepositoryInterface $voteRepository)
    {
        $this->repo = $voteRepository;
    }

    public function store(Request $request)
    {
        $voted = Vote::where([
            ['user_id', $request->user_id],
            ['tour_id', $request->tour_id],
        ])->first()->id;
        if (!empty($voted)) {
            Vote::find($voted)->update($request->all());
        } else {
            Vote::create($request->all());
        }
        return response()->json([
            'title' => __('Done!'),
            'stt' => 'success',
        ]);
    }
}
