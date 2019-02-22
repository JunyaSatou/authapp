@extends ('layouts.base')

<style>
    h1 {
        margin-top:10px;
        margin-bottom:.5rem
    }
    #logout {
        margin-top:50px;
        text-align: center;
    }
</style>
@section ('title', 'Index')

@section ('content')
    <div id="info">
        <p align="center">{{$msg}}</p>
        <form action="/test" method="post">
            {{ csrf_field() }}
            <div id="/logout">
                <input type="submit" value="ログアウト">
            </div>
        </form>
    </div>
@endsection

@section ('footer')
    copyright 2019 Metaps-payment.
@endsection