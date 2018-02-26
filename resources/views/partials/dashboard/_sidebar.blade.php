<div class="uk-card uk-card-primary uk-card-body" style="z-index: 980;" uk-sticky="offset: 40; bottom: #top">
    <div class="uk-padding uk-padding-remove-horizontal">
        <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
            <li class="uk-active uk-margin">
                <a href="{{ route('home') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: home"></span>Dashboard</a>
            </li>
            <li class="uk-parent uk-margin">
                <a href="#">
                    <span class="uk-margin-small-right" uk-icon="icon: file-edit"></span>Posts</a>
                <ul class="uk-nav-sub">
                    <li class="uk-margin-small-top">
                        <a href="{{ route('post.index') }}">All Posts</a>
                    </li>
                    <li class="uk-margin-small-top">
                        <a href="{{ route('post.create') }}">Create Posts</a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent uk-margin">
                <a href="#">
                    <span class="uk-margin-small-right" uk-icon="icon: bookmark"></span>Categories</a>
                <ul class="uk-nav-sub">
                    <li class="uk-margin-small-top">
                        <a href="{{ route('category.index') }}">All Categories</a>
                    </li>
                    <li class="uk-margin-small-top">
                        <a href="{{ route('category.create') }}">Create Categories</a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent uk-margin">
                <a href="#">
                    <span class="uk-margin-small-right" uk-icon="icon: tag"></span>Tags</a>
                <ul class="uk-nav-sub">
                    <li class="uk-margin-small-top">
                        <a href="{{ route('tag.index') }}">All Tags</a>
                    </li>
                    <li class="uk-margin-small-top">
                        <a href="{{ route('tag.create') }}">Create Tags</a>
                    </li>
                </ul>
            </li>
            <li class="uk-parent uk-margin">
                    <a href="#">
                        <span class="uk-margin-small-right" uk-icon="icon: tag"></span>User</a>
                    <ul class="uk-nav-sub">
                        <li class="uk-margin-small-top">
                            <a href="{{ route('user.index') }}">All Users</a>
                        </li>
                        <li class="uk-margin-small-top">
                            <a href="{{ route('user.create') }}">Create User</a>
                        </li>
                    </ul>
                </li>
            <li>
                <a href="{{ route('post.trash') }}">
                    <span class="uk-margin-small-right" uk-icon="icon: trash"></span>Trash</a>
            </li>
        </ul>
    </div>
</div>