				<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="{{url('/' . $page='index')}}">
							<img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
							<img src="{{URL::asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Admintro logo">
						</a>
					</div>
					<div class="app-sidebar__user">
					</div>
					<ul class="side-menu app-sidebar3">
                        @if (auth()->user()->can('View Dashboard') && auth()->user()->user_type === 1)
						    <li class="slide">
                                <a class="side-menu__item"  href="{{ url('/admin/dashboard') }}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg><span class="side-menu__label">{{ __('admin.Dashboard') }}</span></a>
                            </li>
                        @elseif (auth()->user()->can('View Dashboard') && auth()->user()->user_type === 2)
						    <li class="slide">
                                <a class="side-menu__item"  href="{{ url('/moderator/dashboard') }}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg><span class="side-menu__label">{{ __('moderator.Dashboard') }}</span></a>
                            </li>
                        @elseif (auth()->user()->can('View Dashboard') && auth()->user()->user_type === 3)
						    <li class="slide">
                                <a class="side-menu__item" href="{{ url('/trader/dashboard') }}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg><span class="side-menu__label">{{ __('trader.Dashboard') }}</span></a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Products Management') && auth()->user()->user_type === 1)
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('admin/products')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Products') }}</span>
                                </a>
                            </li>
                        @elseif (auth()->user()->can('Products Management') && auth()->user()->user_type === 2)
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('moderator/products')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                                    <span class="side-menu__label">{{ __('moderator.Products') }}</span>
                                </a>
                            </li>
                        @elseif (auth()->user()->can('Products Management') && auth()->user()->user_type === 3)
                            <li class="slide">
                                <a class="side-menu__item" href="{{ url('trader/products')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                                    <span class="side-menu__label">{{ __('trader.Products') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Orders Management'))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{url('/' . $page='#')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Orders') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Financial Management'))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{url('/' . $page='#')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Financial') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Users Management'))
                            <li class="slide">
                                <a class="side-menu__item" href="{{url('/admin/users')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Users') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Roles Management'))
                            <li class="slide">
                                <a class="side-menu__item" href="{{ url('/admin/roles') }}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Roles') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Inventory Management'))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{url('/' . $page='#')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Inventory') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Report Management'))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{url('/' . $page='#')}}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                    <span class="side-menu__label">{{ __('admin.Reports') }}</span>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('Settings Management'))
                            <li class="slide">
                                <a class="side-menu__item" data-toggle="slide" href="{{url('/' . $page='#')}}">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M17.73 12.02l3.98-3.98c.39-.39.39-1.02 0-1.41l-4.34-4.34c-.39-.39-1.02-.39-1.41 0l-3.98 3.98L8 2.29C7.8 2.1 7.55 2 7.29 2c-.25 0-.51.1-.7.29L2.25 6.63c-.39.39-.39 1.02 0 1.41l3.98 3.98L2.25 16c-.39.39-.39 1.02 0 1.41l4.34 4.34c.39.39 1.02.39 1.41 0l3.98-3.98 3.98 3.98c.2.2.45.29.71.29.26 0 .51-.1.71-.29l4.34-4.34c.39-.39.39-1.02 0-1.41l-3.99-3.98zM12 9c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-4.71 1.96L3.66 7.34l3.63-3.63 3.62 3.62-3.62 3.63zM10 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2 2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2.66 9.34l-3.63-3.62 3.63-3.63 3.62 3.62-3.62 3.63z"/></svg>
                                <span class="side-menu__label">{{ __('admin.Settings') }}</span><i class="angle fa fa-angle-left"></i></a>
                                <ul class="slide-menu">
                                    @if (auth()->user()->can('Payment Methods Management'))
                                        <li><a href="{{ route('admin.settings.payment-methods.index') }}" class="slide-item"> {{ __('admin.Payment Methods') }}</a></li>
                                    @endif
                                    @if (auth()->user()->can('Settings Management'))
                                        <li><a href="{{ route('admin.settings.categories.index') }}" class="slide-item"> {{ __('admin.Categories') }}</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
					</ul>
				</aside>
				<!--aside closed-->
