<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eating;
use App\Models\Food_Area;
use App\Models\Food_Genre;
use App\Http\Requests\FoodRequest;
use App\Models\Scenery;
use App\Models\Scenery_Area;
use App\Models\Scenery_Genre;
use App\Http\Requests\SceneryRequest;

class SuggestionController extends Controller
{
    // 飲食
    public function eating(Request $request)
    {
        $foodAreas = Food_Area::all();
        $foodGenres = Food_Genre::all();

        $eatings = Eating::with('food_area', 'food_genre', 'profile')
        ->AreaSearch($request->food_area)
        ->GenreSearch($request->food_genre)
        ->TitleSearch($request->title)
        ->orderBy('created_at', 'desc')->get();
        
        return view('eating', compact('eatings', 'foodAreas', 'foodGenres', 'request'));
    }

    // 飲食・詳細
    public function detail($id)
    {
        $eating = Eating::with('food_area', 'food_genre', 'profile')->findOrFail($id);

        return view('food_detail', compact('eating'));
    }

    // 飲食・紹介
    public function introduction()
    {
        $foodAreas = Food_Area::all();
        $foodGenres = Food_Genre::all();

        return view('food_introduction', compact('foodAreas', 'foodGenres'));
    }
    public function intro(FoodRequest $request)
    {
        $profile = auth()->user()->profile;
        $areaString = $request->input('area');
        $genreString = $request->input('genre');
        $title = $request->input('title');
        $content = $request->input('content');
        if ($content === null) {
            $content = '';
        }

        $area = Eating::convertAreaToId($areaString);
        $genre = Eating::convertGenreToId($genreString);


        // アップロードされた画像ファイル名を取得
        $uploadedImage = $request->file('image');
        $imageName = $uploadedImage->getClientOriginalName();
        
        // 画像を保存ディレクトリに移動
        $uploadedImage->storeAs('public', $imageName);


        $eating = Eating::create([
            'profile_id' => $profile->id,
            'food_area_id' => $area,
            'food_genre_id' => $genre,
            'title' => $title,
            'image' => $imageName,
            'content' => $content, 
            'image1' => null,
            'image2' => null,
            'image3' => null,
        ]);

        // 各追加の画像も同様に保存する場合
        for ($i = 1; $i <= 3; $i++) {
            $columnName = "image{$i}";
            if ($request->hasFile($columnName)) {
                // 画像がアップロードされた場合にのみ保存
                $uploadedImage = $request->file($columnName);
                $imageName = $uploadedImage->getClientOriginalName();
                $uploadedImage->storeAs('public', $imageName);

                // 対応するカラムに値を設定
                $eating->$columnName = $imageName;
                $eating->save();
            }
        }

        return redirect('eating');
    }

    
    // 風景
    public function scenery(Request $request)
    {
        $sceneryAreas = Scenery_Area::all();
        $sceneryGenres = Scenery_Genre::all();

        $sceneries = Scenery::with('scenery_area', 'scenery_genre', 'profile')
        ->AreaSearch($request->scenery_area)
        ->GenreSearch($request->scenery_genre)
        ->TitleSearch($request->title)
        ->orderBy('created_at', 'desc')->get();

        return view('scenery', compact('sceneries', 'sceneryAreas', 'sceneryGenres', 'request'));
    }

    // 風景・詳細
    public function specifics($id)
    {
        $scenery = Scenery::with('scenery_area', 'scenery_genre', 'profile')->findOrFail($id);

        return view('scenery_specifics', compact('scenery'));
    }

    // 風景・紹介
    public function referral()
    {
        $sceneryAreas = Scenery_Area::all();
        $sceneryGenres = Scenery_genre::all();

        return view('scenery_referral', compact('sceneryAreas', 'sceneryGenres'));
    }
    public function refe(SceneryRequest $request)
    {
        $profile = auth()->user()->profile;
        $areaString = $request->input('area');
        $genreString = $request->input('genre');
        $title = $request->input('title');
        $content = $request->input('content');
        if ($content === null) {
            $content = ''; 
        }

        $area = Scenery::convertAreaToId($areaString);
        $genre = Scenery::convertGenreToId($genreString);

        $uploadedImage = $request->file('image');
        $imageName = $uploadedImage->getClientOriginalName();

        $uploadedImage->storeAs('public', $imageName);

        $scenery = Scenery::create([
            'profile_id' => $profile->id,
            'scenery_area_id' =>$area,
            'scenery_genre_id' => $genre,
            'title' => $title,
            'image' => $imageName,
            'content' => $content,
            'image1' => null,
            'image2' => null,
            'image3' => null,
        ]);

        for ($i = 1; $i <= 3; $i++) {
            $columnName = "image{$i}";
            if ($request->hasFile($columnName)) {
                $uploadedImage = $request->file($columnName);
                $imageName = $uploadedImage->getClientOriginalName();
                $uploadedImage->storeAs('public', $imageName);

                $scenery->$columnName = $imageName;
                $scenery->save();
            }
        }

        return redirect('scenery');
    }
}