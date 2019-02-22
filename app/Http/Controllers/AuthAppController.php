<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Log;
use Illuminate\Support\Facades\DB;

class AuthAppController extends Controller{

    /**
     * ログイン画面へ遷移させる
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('login', [
            'msg' => "",
        ]);
    }

    /**
     * メールアドレスとパスワードを使用した認証処理
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function auth_check(Request $request){

        // 該当レコードを検索
        $user = User::where('email', $request->email)->first();

        // 該当レコードが存在
        if (isset($user)) {
            // ロックされているため、入力画面を表示する。
            if ($user->lock_status == 1){
                return view('login', ['msg' => "このアカウントはロックされています。"]);
            }

            // パスワードも一致すれば、ログを無効化し、正常画面を表示する。
            if ($user->password == $request->password){
                // ログの無効化
                $param = [
                    'email' => $user->email,
                    'ip_address' => $request->ip(),
                    'status' => '0',
                    'updated_at' => date("Y/m/d H:i:s"),
                ];

                DB::table('logs')
                    ->where('email', $user->email)
                    ->update($param);

                return view('index', ['msg' => "ようこそ、" . $user->name . "さん！！"]);
            }

            // エラーログの登録
            $param = [
                'email' => $user->email,
                'ip_address' => $request->ip(),
                'status' => '1',
                'created_at' => date("Y/m/d H:i:s"),
            ];

            DB::table('logs')
                ->insert($param);

            // 処理日に出力されているエラーログの個数を取得
            $log_count = Log::where('email', $user->email)
                ->where('status', 1)
                ->where('created_at', '>=', date("Y/m/d 00:00:00"))
                ->count();

            // エラー件数が５件のときアカウントのロックとエラー画面を表示する
            if ($log_count == 5){

                // アカウントのロック
                $param = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'lock_status' => 1,
                    'locked_at' => date("Y/m/d H:i:s"),
                    'unlocked_at' => $user->unlocked_at,
                    'created_at' => $user->created_at,
                    'updated_at' => date("Y/m/d H:i:s"),
                ];

                db::table('users')
                    ->where('email', $user->email)
                    ->update($param);

                $msgs = [
                    "メールアドレス または パスワード を 5回 間違えたため",
                    "アカウントがロックされました。"
                ];

                return view('error', [
                    'msgs' => $msgs,
                ]);
            }

            return view('login', ['msg' => "※メールアドレス 又は パスワード が違います。"]);
        }

        // エラーログの登録
        $param = [
            'email' => $request->email,
            'ip_address' => $request->ip(),
            'status' => '1',
            'created_at' => date("Y/m/d H:i:s"),
        ];

        DB::table('logs')
            ->insert($param);

        return view('login', ['msg' => "※メールアドレス 又は パスワード が違います。"]);
    }
}
