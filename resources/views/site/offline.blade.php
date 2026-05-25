@extends('layouts.site')

@section('title', 'Offline | Clinovah')

@section('content')

<style>
.cv-offline-wrap{
    min-height:70vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px 20px;
}

.cv-offline-card{
    max-width:620px;
    width:100%;
    background:#fff;
    border-radius:32px;
    padding:50px 40px;
    text-align:center;
    border:1px solid #e5eee8;
    box-shadow:0 20px 60px rgba(14,82,63,0.08);
}

.cv-offline-icon{
    width:100px;
    height:100px;
    margin:0 auto 24px;
    border-radius:50%;
    background:#e8f5ef;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:42px;
    color:#0e523f;
}

.cv-offline-title{
    font-size:42px;
    font-weight:900;
    color:#163229;
    margin-bottom:16px;
    letter-spacing:-1px;
}

.cv-offline-text{
    color:#647067;
    line-height:1.8;
    margin-bottom:28px;
    font-size:16px;
}

.cv-offline-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:52px;
    padding:0 28px;
    border-radius:999px;
    background:#0e523f;
    color:#fff !important;
    font-weight:900;
    text-decoration:none;
    box-shadow:0 14px 35px rgba(14,82,63,0.18);
}
</style>

<div class="cv-offline-wrap">

    <div class="cv-offline-card">

        <div class="cv-offline-icon">
            📡
        </div>

        <h1 class="cv-offline-title">
            You're Offline
        </h1>

        <p class="cv-offline-text">
            Clinovah cannot reach the internet right now.
            Please reconnect and try again.
        </p>

        <a href="{{ url('/') }}" class="cv-offline-btn">
            Retry Connection
        </a>

    </div>

</div>

@endsection