@extends ('layouts.base')

<style>
    .error {
        color: red;
    }
    #msg {
        text-align: center;
        color: red;
    }
</style>

@section ('title', 'ログイン画面')

@section ('content')
    <div id="login">
        <p id="msg">{{$msg}}</p>
        <form action="/login" method="post">
            {{ csrf_field() }}
            <table align="center">
                @if ($errors->has('email'))
                    <tr class="error"><th align="right">※ERROR：</th><td>{{$errors->first('email')}}</td></tr>
                @endif
                <tr>
                    <td width="200" align="right">email（必須）：</td><td width="300"><input type="text" name="email" size="45" value="{{old('email')}}"></td>
                </tr>
                @if ($errors->has('password'))
                    <tr class="error"><th align="right">※ERROR：</th><td>{{$errors->first('password')}}</td></tr>
                @endif
                <tr>
                    <td width="200" align="right">password（必須）：</td><td width="300"><input type="password" name="password" size="45" value="{{old('password')}}"></td>
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