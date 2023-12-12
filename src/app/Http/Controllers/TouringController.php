<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Touring;
use App\Http\Requests\TouringRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile_Touring_Like;
use App\Models\Comment;
use App\Models\Replie;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplieRequest;

class TouringController extends Controller
{
    public function touring(Request $request)
    {
        $tourings = Touring::with('day', 'distance', 'profile', 'profile_touring_likes')
        ->NicknameSearch($request->nickname)
        ->GenderSearch($request->gender)
        ->AgeSearch($request->age)
        ->DateSearch($request->date)
        ->DaySearch($request->day)
        ->DistanceSearch($request->distance)
        ->DestinationSearch($request->destination)
        ->orderBy('created_at', 'desc')->get();

        $likeCounts = [];
        $commentCounts = [];
        $likeExists = [];

        foreach ($tourings as $touring) {
            // お気に入りカウント
            $likeCounts[$touring->id] = Profile_Touring_Like::where('touring_id', $touring->id)->count();

            // コメントカウント
            $commentCounts[$touring->id] = Comment::where('touring_id', $touring->id)->count();

            // お気に入り
            $likeExists[$touring->id] = Profile_Touring_Like::where('profile_id', Auth::id())
            ->where('touring_id', $touring->id)
            ->exists();
        }

        return view('touring', compact('tourings', 'likeCounts', 'commentCounts', 'likeExists'));
    }

    // マスツーリングいいね
    public function like(Request $request)
    {
        $profileId = Auth::id();
        $touringId = $request->input('touringId');

        // User_Shop_Favorite テーブルで指定のユーザーとお店のお気に入り情報を取得
        $like = Profile_Touring_Like::where('touring_id', $touringId)
            ->where('profile_id', $profileId)
            ->first();

        if ($like) {
            // お気に入りが存在する場合、削除
            $like->delete();
        } else {
            // お気に入りが存在しない場合、追加
            Profile_Touring_Like::create([
                'touring_id' => $touringId,
                'profile_id' => $profileId,
            ]);
        }

        return redirect()->back();
    }

    // マスツーリング投稿
    public function recruiting()
    {
        return view('recruiting');
    }
    public function add(TouringRequest $request)
    {
        // フォームからのデータ取得
        $date = $request->input('date');
        $destination = $request->input('destination');
        $content = $request->input('content');
        $dayString = $request->input('day');
        $distanceString = $request->input('distance');
        
        // 選択された日数と距離に対応するレコードを取得
        $day = Touring::convertDayToId($dayString);
        $distance = Touring::convertDistanceToId($distanceString);
        
        // ユーザーのプロフィール取得
        $profile = auth()->user()->profile;

        // プロフィールに紐づくツーリング情報を作成
        $touring = new Touring;

        // ツーリング情報にデータ設定
        $touring->profile_id = $profile->id;
        $touring->date = $date;
        $touring->day_id = $day;
        $touring->destination = $destination;
        $touring->content = $content;
        $touring->distance_id = $distance;

        // ツーリング情報を保存
        $touring->save();

        return redirect('touring');
    }

    // マスツーリングコメント
    public function comment($id)
    {
        $touring = Touring::with('day', 'distance', 'profile', 'profile_touring_likes')->findOrFail($id);

        $comments = Comment::with('profile', 'touring', 'replies.profile')->where('touring_id', $id)->get();

        return view('comment', compact('touring', 'comments'));
    }

    // マスツーリングコメント・追加
    public function transmission(CommentRequest $request)
    {
        $profile = auth()->user()->profile;
        $touringId = $request->input('touring_id');

        Comment::create([
            'profile_id' => $profile->id,
            'touring_id' => $touringId,
            'content' => $request->input('content'),
        ]);

        return redirect()->back();
    }

    // マスツーリングリプライ・追加
    public function replie(ReplieRequest $request)
    {
        $profile = auth()->user()->profile;
        $commentId = $request->input('comment_id');
        
        Replie::create([
            'profile_id' => $profile->id,
            'comment_id' => $commentId,
            'content' => $request->input('content'),
        ]);

        return redirect()->back();
    }
        
}
