@php
$notificationCnt = 0;
foreach (auth()->user()->unreadNotifications as $notification) {
    $notificationCnt++;
}
@endphp

@if ($notificationCnt == 0)
<svg  class="
mr-2 w-5 h-5 mt-1
"><path d="M6 8v7h8V8a4 4 0 1 0-8 0zm2.03-5.67a2 2 0 1 1 3.95 0A6 6 0 0 1 16 8v6l3 2v1H1v-1l3-2V8a6 6 0 0 1 4.03-5.67zM12 18a2 2 0 1 1-4 0h4z"/>
</svg> 
    
@else
<p  class="
text-sm bg-red-500 text-white rounded-full py-1 px-2.5 mr-2"> {{ $notificationCnt }} </p>
@endif
