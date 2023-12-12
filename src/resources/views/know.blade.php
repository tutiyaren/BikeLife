@extends('layouts.index')

@section('css')
<link rel="stylesheet" href="{{ asset('css/know.css') }}">
@endsection

@section('content')

<div class="know">
    <div class="know-ttl">
        <h2 class="know-ttl__top">バイクのある生活</h2>
    </div>
    <div class="know-inner">
        <p class="know-inner__text">バイクに乗ったら人生が変わったという話を聞いたことがあります。私自身、その一人です。おいしい食べ物はもちろん、ふと通った道の風景や匂い、出先のトラブル、巡る四季を楽しみに感じ、全身で風を感じる非日常感、私の人生に生きる楽しさを教えてくれました。<br>そんな中、ライダーのために特化したwebアプリがこの「バイフ」です。「バイフ」とは、バイクライフの略称で、バイクに関するつぶやきや、マスツーリングの募集、おすすめの飲食、風景を投稿して共有することが出来ます。<br>多くのライダーに活用頂ければ幸いです。ぜひ、ご活用ください！<br>よいバイフを<i class="fa-regular fa-thumbs-up"></i></p>
    </div>
</div>

@endsection