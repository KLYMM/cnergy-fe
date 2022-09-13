@extends('defaultsite.mobile.layouts.main')

@section('content')
@push('styles')
<style>
    .error-message {
        margin-top: 130px;
    }
    .error-message__caption {
        margin-top: 40px;
        color:#999999;
    }
    .error-message__sub-caption {
        font-size: 14px;
        text-align: center;
        width: 250px;
        color:#999999;
    }
</style>
@endpush
<div class="main-body px-4">
    <div class="main-article">
        <div class="error-message flex flex-col items-center" >
            <img class="error-message__image" src="{{ Src::asset('img/Group.065682658afc8548110241f9a4c11c81.png') }}">
            <h2 class="error-message__caption text-14 font-black">{{__('Halaman tidak ditemukan')}}</h2>
            <p class="error-message__sub-caption">{{__('Alamat yang anda masukkan salah, tidak tersedia, atau sudah dihapus')}}</p>
        </div>
        @include('defaultsite/mobile/components/popular')
    </div>    
</div>

@endsection