@extends('layouts.backend.app')

@section('content')

    <section class="bootstrap-grid mx-5 my-5">
        <div class="d-flex flex-wrap">

            @component('layouts.backend.components.action_box')
                @slot('icon') fa-paper-plane @endslot
                @slot('url') {{ route('admin.news.index') }} @endslot
                {{ trans('dashboard.news') }}
            @endcomponent

            @if($permit)
                @component('layouts.backend.components.action_box')
                    @slot('icon') fa-users @endslot
                    @slot('url') {{ route('admin.users.index') }} @endslot
                    {{ trans('dashboard.administrator') }}
                @endcomponent
            @endif

            @component('layouts.backend.components.action_box')
                @slot('icon') fa-user-circle-o @endslot
                @slot('url') {{ route('admin.members.index') }} @endslot
                {{ trans('dashboard.members') }}
            @endcomponent

            @component('layouts.backend.components.action_box')
                @slot('icon') fa-sign-out @endslot
                @slot('url') {{ route('admin.logout') }} @endslot
                @slot('javascript') onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  @endslot
                {{ trans('dashboard.logout') }}
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endcomponent

        </div>
    </section>

@endsection
