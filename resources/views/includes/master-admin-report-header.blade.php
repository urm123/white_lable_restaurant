<ul class="nav nav-tabs">
    <li @if($active=='sales') class="active" @endif>
        <a href="{{route('master-admin.report.sales')}}">Sales Figures </a>
    </li>
    <li @if($active=='sales') class="active" @endif>
        <a href="{{route('master-admin.report.revenue')}}">Revenue</a>
    </li>
    <li @if($active=='sales') class="active" @endif>
        <a href="{{route('master-admin.report.subscription')}}">Subscription Report</a>
    </li>
</ul>
