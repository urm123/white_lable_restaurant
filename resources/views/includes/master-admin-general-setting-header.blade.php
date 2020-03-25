<ul class="nav nav-tabs">
    <li @if($active=='general') class="active" @endif>
        <a href="{{route('master-admin.settings.general')}}">Theme</a>
    </li>
    <li @if($active=='app-settings') class="active" @endif>
        <a href="{{route('master-admin.settings.app-settings')}}">App Config</a>
    </li>
    <li @if($active=='mail') class="active" @endif>
        <a href="{{route('master-admin.settings.mail')}}">Mail Config</a>
    </li>
    <li @if($active=='api') class="active" @endif>
        <a href="{{route('master-admin.settings.services-api')}}">Services API</a>
    </li>
</ul>
