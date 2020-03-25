<div class="row sub-breadcrumb">
    <ul>
        <li @if($active=='reservation') class="active" @endif><a href="{{route('user.reservations')}}">
                {{__("Reservations")}} </a></li>
        <li @if($active=='delivery') class="active" @endif><a href="{{route('user.deliveries')}}">Deliveries </a></li>
        <li @if($active=='takeaway') class="active" @endif><a href="{{route('user.takeaways')}}">Takeaways </a></li>
    </ul>
</div>
