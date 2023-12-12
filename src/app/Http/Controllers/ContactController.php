<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    public function confimation(ContactRequest $request)
    {
        $inputs = $request->all();
        
        return view('confimation', compact('inputs'));
    }
    public function thanks(Request $request)
    {
        $action = $request->input('action');
        $inputs = $request->except('action');

        //actionの値で分岐
        if ($action !== 'submit') {
            return redirect()
                ->route('contact')
                ->withInput($inputs);
        } else {
            // セッションからログインユーザーの情報を取得
            $userSessionData = session('user_data', []);

            // フォームからの入力がセッションと一致するか確認
            if ($inputs['name'] === $userSessionData['name'] && $inputs['email'] === $userSessionData['email']) {
                // 名前とメールアドレスがデータベースに存在するか確認
                $user = User::where('name', $inputs['name'])
                    ->where('email', $inputs['email'])
                    ->first();

                // ユーザーが存在する場合は関連付けてコメントを保存
                if ($user) {
                    $contact = new Contact([
                        'comment' => $inputs['comment'],
                    ]);

                    $user->contact()->save($contact);
                }
                // 送信完了ページのviewを表示
                return view('thanks');
            } else {
                // セッションと一致しない場合はエラーを返すか、リダイレクトなどを行う
                return redirect()
                    ->route('contact')
                    ->withInput($inputs);
            }
        }
    }
}
