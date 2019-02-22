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
@section ('title', 'ログインエラー')

@section ('content')
    <div id="error">
        @foreach ($msgs as $msg)
            <p id="msg">{{$msg}}</p>
        @endforeach
    </div>
@endsection

@section ('footer')
    copyright 2019 Metaps-payment.
@endsection