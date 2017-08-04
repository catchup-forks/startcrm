<div class="col-xs-12" style="padding-bottom:15px;">
    <ul class="nav nav-tabs">
        <li {{ (Route::is('manage.users') ? 'class=active' : '') }}>
            <a href="{{ route('manage.users') }}">All Users</a>
        </li>
        <li {{ (Route::is('manage.users.adduser') ? 'class=active' : '') }}>
            <a href="{{ route('manage.users.adduser') }}">Add User</a>
        </li>
    </ul>
</div>
