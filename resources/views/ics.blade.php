<div>
    hello {{ $activity}}


    <a href="{{
    str_replace(
        ['http://', 'https://'],
        'http://',
        route('calendar.event'),

    )
}}">
    Subscribe
</a>
</div>
