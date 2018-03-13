@component('admin.layouts.app', [
    'icon' => 'far fa-chart-bar',
    'title' => 'Reports'
])
<s-table key_url="/api/keys" data_url="/api/table"></s-table>
@endcomponent