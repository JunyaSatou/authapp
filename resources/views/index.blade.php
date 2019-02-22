@extends ('layouts.base')

<style>
    #logout {
        margin-top:50px;
        text-align: center;
    }
</style>
@section ('title', 'Index')

@section ('content')
    <div id="info">
        <p align="center">{{$msg}}</p>
        <form action="/logout" method="post">
            {{ csrf_field() }}
            <div id="logout">
                <input type="submit" value="ログアウト">
            </div>
        </form>
    </div>
@endsection

@section ('footer')
    copyright 2019 Metaps-payment.
@endsection