<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Tweet;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile_Tweet_Favorite;


class TweetController extends Controller
{
    public function tweet(Request $request)
    {
        $keyword = $request->input('keyword');

        // キーワードが入力されている場合は検索を行う
        if ($keyword) {
            $tweets = Tweet::with(['profile.gender', 'profile_tweet_favorites'])
            ->search($keyword)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // キーワードがない場合は通常の一覧表示
            $tweets = Tweet::with(['profile.gender', 'profile_tweet_favorites'])
            ->orderBy('created_at', 'desc')
                ->get();
        }

        // お気に入り
        $favoriteExists = [];
        foreach ($tweets as $tweet) {
            $exists = Profile_Tweet_Favorite::where('profile_id', Auth::id())
                ->where('tweet_id', $tweet->id)
                ->exists();

            $favoriteExists[$tweet->id] = $exists;
        }
        
        return view('tweet', compact('tweets', 'favoriteExists'));
    }

    // つぶやきいいね
    public function favorite(Request $request)
    {
        $profileId = Auth::id();
        $tweetId = $request->input('tweetId');

        // User_Shop_Favorite テーブルで指定のユーザーとお店のお気に入り情報を取得
        $favorite = Profile_Tweet_Favorite::where('tweet_id', $tweetId)
            ->where('profile_id', $profileId)
            ->first();

        if ($favorite) {
            // お気に入りが存在する場合、削除
            $favorite->delete();
        } else {
            // お気に入りが存在しない場合、追加
            Profile_Tweet_Favorite::create([
                'tweet_id' => $tweetId,
                'profile_id' => $profileId,
            ]);
        }

        return redirect()->back();
    }

    // つぶやき投稿
    public function write()
    {
        return view('write');
    }
    public function post(TweetRequest $request)
    {
        $user = Auth::user();
        $tweetContent = $request->input('tweet');

        $tweet = new Tweet([
            'profile_id' => $user->profile->id,
            'tweet' => $tweetContent
        ]);

        $tweet->save();

        return redirect('tweet');
    }
}
