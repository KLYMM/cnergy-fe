<div class="dt-box dt-box--crosslink p-4" id="crosslink-id-{{ $crosslink['code'] }}">
    <h1 class="dt-box-title text-16 font-bold mb-4">{{ $crosslink['title'] }}</h1>
    <ul class="dt-box--crosslink-list text-12 font-bold flex flex-wrap list-none -mx-2">
        @foreach($crosslink['content'] as $detail)
        <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="{{ $detail['url'] }}" target="_blank">{{ $detail['text'] }}</a></li>
        @endforeach
    </ul>
</div>