<div>
    hello {{ $activity}}
    <a href="{{
        route('calendar.ics',
            ['activities' => ['1','2']]
        )
}}">
    Subscribe
</a>
</div>
