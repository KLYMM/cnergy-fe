@extends('defaultsite.desktop.layouts.main')
@push('styles')
<style>
    .body-container{
        min-height: 40vh;
    }
</style>
@endpush

@push('preload')
{!! RecaptchaV3::initJs() !!}
@endpush

@section('content')
<div class="container w-kly px-8 my-5 body-container modal-inner-body py-0">
    <h1 class="dt-title text-30 font-bold mb-4">Kontak Kami</h1>
    <div class="mb-6">
        <p>{{ config('site.attributes.title') }} adalah media online yang menyajikan berita terkini secara lengkap, akurat dan terpercaya.</p>
        <p>Kirimkan pertanyaan, kritik , dan saran Anda melalui form berikut.</p>
    </div>
    <div class="modal-form">
        <form class="form-submit" id="form-contact-us">
            <div class="form-box">
                <input type="hidden" class="form-control" value="{{url()->current()}}" name="url" hidden readonly>
            </div>
            <div class="form-box">
                <input type="text" class="form-control " placeholder="Nama" value="" name="name" required>
                <label id="name-error" class="error label-error" for="name"></label>
            </div>
            <div class="form-box">
                <input type="email" class="form-control  " placeholder="Email" value="" name="from"  required='required' >
                <label id="from-error" class="error label-error" for="from"></label>
            </div>
            <div class="form-box">
                <input type="text" class="form-control  " placeholder="Nomor HP" value="" name="phone" rule='[^0-9]' required='required' minlength='9' maxlength='12'>
                <label id="phone-error" class="error label-error" for="phone"></label>
            </div>
            <input type="hidden" name="type" value="Contact Us">
            <div class="form-box">
                <input type="text" class="form-control  " placeholder="Subject" value="" name="subject"  required='required'>
                <label id="subject-error" class="error label-error" for="subject"></label>
            </div>
            <div class="form-box">
                <textarea class="form-control " rows="5" placeholder="Content" value="" name="content"  required='required'></textarea>
                <label id="content-error" class="error label-error" for="content"></label>
            </div>
            <div class="form-box flex justify-between items-center">
                <div class="form-recapthca" >
                    <div hidden class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        {!! RecaptchaV3::field('register') !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="flex">
                        <img class="object-contain inline-block mr-1 google-captcha-error" style="display: none" src="{{ Src::asset('img/error.e43b81ee4b1c02e23191db01caefee9e.svg') }}" width="15" height="17">
                        <label id="g-recaptcha-response-error" class="error label-error" for="g-recaptcha-response"></label>
                    </div>
                </div>
                <div class="form-button">
                    <button type="submit" class="btn btn--submit py-2 px-6 rounded-md">Kirim</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-alert" style="display:none">
        <div class="modal-alert-body flex items-center justify-center flex-col" style="min-height: 300px">
            <img class="modal-icon object-contain mb-4" src="{{ Src::asset('img/checkmark-modal.f381295fc0b9b93ca76855ce5a5b507e.svg') }}" width="74" height="64">
            <h1 class="modal-title">BERHASIL</h1>
            <p class="modal-text">Pesan Anda berhasil dikirim</p>
        </div>
    </div>
</div>
@endsection