<div id="parentNotification" style="
position: absolute;
     top: 88%;
     text-align: center;
     font-size: 20px;
     max-width:400px;
     left:38%;
padding-top:20px;
color: white;">
    <p id="notification" 
    class="bg-blue-300 border border-blue-700 rounded-2xl p-3">
        @if (isset($n)) {{ $n }} @endif
         @if (isset($user))
        {{ $user->name }}
        @endif

    </p>
</div>