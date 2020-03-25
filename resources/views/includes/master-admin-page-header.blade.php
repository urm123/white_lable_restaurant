<ul class="nav nav-tabs">
    <li @if($active=='home-page') class="active" @endif>
        <a href="{{route('master-admin.page.home')}}">Home Page</a>
    </li>
    <li @if($active=='menu-page') class="active" @endif>
        <a href="{{route('master-admin.page.menu')}}">Menu Page</a>
    </li>
    <li @if($active=='review-page') class="active" @endif>
        <a href="{{route('master-admin.page.review')}}">Review Page</a>
    </li>
    <li @if($active=='about-page') class="active" @endif>
        <a href="{{route('master-admin.page.about')}}">About Page</a>
    </li>
    <li @if($active=='contact-page') class="active" @endif>
        <a href="{{route('master-admin.page.contact')}}">Contact Page</a>
    </li>
    <li @if($active=='terms-page') class="active" @endif>
        <a href="{{route('master-admin.page.terms')}}">Terms Page</a>
    </li>
    <li @if($active=='privacy-page') class="active" @endif>
        <a href="{{route('master-admin.page.privacy')}}">Privacy Policy Page</a>
    </li>
    <li @if($active=='faq-page') class="active" @endif>
        <a href="{{route('master-admin.page.faq')}}">FAQ Page</a>
    </li>
</ul>
