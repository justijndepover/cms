@component('admin.layouts.app', [
    'icon' => 'far fa-life-ring',
    'title' => 'Support'
])
<h1>Bewerk Justijn Depover</h1>
<br>
<div class="row">
    <div class="col-md-9">
        <div class="panel">
            {{ html()->form('PUT', '/post')->class('form')->open() }}
                <div class="wrow">
                    <div class="w50">
                        <label for="firstname">Firstname</label>
                        {{ html()->text()->placeholder('Firstname')->id('firstname') }}
                    </div>
                    <div class="w50">
                        <label for="lastname">Lastname</label>
                        {{ html()->text()->placeholder('Firstname')->id('lastname') }}
                    </div>
                </div>
                <div class="wrow">
                    <div class="w100">
                        <label for="password">Password</label>
                        {{ html()->password()->placeholder('Password')->id('password') }}
                    </div>
                </div>
                <div class="wrow">
                    <div class="w100">
                        <label for="color">Colorpicker</label>
                        <div class="select__wrapper">
                            <select>
                                <option>Test</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="wrow">
                    <div class="w100">
                        <label for="textarea">Text</label>
                        {{ html()->textarea()->placeholder('Text')->id('textarea')->attribute('rows', 10) }}
                    </div>
                </div>
                {{ html()->button('Submit')->type('submit')->class('btn btn-default') }}
            {{ html()->form()->close() }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel">
            <button type="button" name="button" class="btn btn-default btn-link btn-sm btn-block">Dupliceer gebruiker</button>
            <button type="button" name="button" class="btn btn-default btn-link btn-sm btn-block">Verwijder gebruiker</button>
        </div>
    </div>
</div>
@endcomponent
