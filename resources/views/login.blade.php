@extends ('layouts.base')

<style>
    #msg {
        text-align:center;
        color: red;
    }
    h1 {
        margin-top:10px;
        margin-bottom:.5rem
    }
</style>
@section ('title', 'ログイン画面')

@section ('content')
    <div id="login">
        @if (count($errors) > 0)
            @if ($errors->has('email') && $errors->has('password'))
                <p id="msg">メールアドレスとパスワードを設定してください。<p>
            @elseif ($errors->has('email'))
                <p id="msg">メールアドレスを設定してください。<p>
            @else
                <p id="msg">パスワードを設定してください。<p>
            @endif
        @else
            @if (isset($msg))
                <p id="msg">{{$msg}}</p>
            @endif
        @endif
        <form action="/login" method="post">
            {{ csrf_field() }}
            <table border="1" align="center">
                <tr>
                    <td>メール（必須）</td><td><input type="text" name="email" size="30" value="{{old('email')}}"></td>
                </tr>
                <tr>
                    <td>パスワード（必須）</td><td><input type="password" name="password" size="30" value="{{old('password')}}"></td>
                    {{--<td>パスワード（必須）</td><td><input type="password" name="password" size="30"></td>--}}
                </tr>
                <tr align="center">
                    <td></td><td><input type="submit" value="send"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection

@section ('footer')
    copyright 2019 Metaps-payment.
@endsection