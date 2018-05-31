@component('admin.layouts.app', [
    'icon' => 'far fa-chart-bar',
    'title' => 'Reports'
])
<h1>Users</h1>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <s-table key_url="/api/keys" data_url="/api/table"></s-table>
        </div>
    </div>
</div>
@endcomponent
