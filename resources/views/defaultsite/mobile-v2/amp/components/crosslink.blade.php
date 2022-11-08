<crosslink>
<div class="dt-box dt-box--crosslink p-4" id="crosslink-id-{{ $crosslink['code'] }}">
    <h1 class="dt-box-title font-bold mb-4">{{ $crosslink['title'] }}</h1>
    <ul class="dt-box--crosslink-list font-bold pl-5">
        @foreach($crosslink['content'] as $detail)
        <li class="dt-box--crosslink-list-item py-3"><a href="{{ $detail['url'] }}" target="_blank">{{ $detail['text'] }}</a></li>
        @endforeach
    </ul>
</div>
</crosslink>