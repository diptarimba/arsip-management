{{-- <x-sidebar.sidebar-parent text="" icon=""> --}}
<li class="sidebar-item has-sub">
    <a href="#" class='sidebar-link'>
        <i class="{{$icon}}"></i>
        <span>{{$text}}</span>
    </a>
    <ul class="submenu ">
        {{ $slot }}
    </ul>
</li>
