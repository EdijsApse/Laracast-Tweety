@if (session('success'))
    <notification-component containerclass="success" heading="Success" message="{{ session('success') }}"></notification-component>
@endif

@if (session('warning'))
    <notification-component containerclass="warning" heading="Warning" message="{{ session('warning') }}"></notification-component>
@endif

@if (session('error'))
    <notification-component containerclass="error" heading="Error" message="{{ session('error') }}"></notification-component>
@endif