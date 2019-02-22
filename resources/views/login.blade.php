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
        @if (isset($msg))
            <p id="msg">{{$msg}}</p>
        @endif
        <form action="/login" method="post">
            {{ csrf_field() }}
            <table border="1" align="center">
                <tr>
                    <td>メール</td><td><input type="text" name="email" size="30"></td>
                </tr>
                <tr>
                    <td>パスワード</td><td><input type="password" name="password" size="30"></td>
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