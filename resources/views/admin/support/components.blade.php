@component('admin.layouts.app', [
    'icon' => 'far fa-life-ring',
    'title' => 'Support'
])
    <div class="container-fluid">
        <h1>Bewerk Justijn Depover</h1>
        <br>
        <div class="row">
            <div class="col-md-9">
                <form class="form">
                    <div class="wrow">
                        <div class="w50">
                            <label for="InputEmail">Email address</label>
                            <input type="email" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="w50">
                            <label for="InputEmail">Email address</label>
                            <input type="email" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="wrow">
                        <div class="w100">
                            <label for="InputPassword">Password</label>
                            <input type="password" id="InputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="wrow">
                        <div class="w100">
                            <label for="InputTextarea">Text</label>
                            <textarea id="InputTextarea" rows="10" placeholder="Text"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="col-md-3">
                <div class="panel" style="padding: 10px; background-color: #fafafa;">
                    <button type="button" name="button" class="btn btn-default btn-link btn-sm btn-block">Dupliceer gebruiker</button>
                    <button type="button" name="button" class="btn btn-default btn-link btn-sm btn-block">Verwijder gebruiker</button>
                </div>
            </div>
        </div>
    </div>
@endcomponent