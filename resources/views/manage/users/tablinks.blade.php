<div class="col-xs-12" style="padding-bottom:15px;">
    <ul class="nav nav-tabs">
        <li {{ (Route::is('admin.users') ? 'class=active' : '') }}>
            <a href="{{ route('admin.users') }}">All Users</a>
        </li>
        <li {{ (Route::is('admin.users.adduser') ? 'class=active' : '') }}>
            <a href="{{ route('admin.users.adduser') }}">Add User</a>
        </li>
    </ul>
</div>
