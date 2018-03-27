@component('admin.layouts.app', [
    'icon' => 'far fa-life-ring',
    'title' => 'Support'
])
    <div class="container-fluid phpinfo">
        {!! $phpinfo !!}
    </div>
@endcomponent
