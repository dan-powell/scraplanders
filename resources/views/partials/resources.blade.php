<!-- Messages: style can be found in dropdown.less-->

@foreach($resources as $key => $resource)

    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="{{ config('ui.resource_icons.' . $key) }}"></i>
            <span class="label label-default">{{ $resource }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">
                <h4>
                    <span class="pull-right"><span class="label label-default">{{ $resource }}</span></span>
                    <i class="{{ config('ui.resource_icons.' . $key) }}"></i> {{ __('resources.' . $key)}}
                </h4>
            </li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <!-- end message -->
                    <li>
                        <a href="#">
                            <span class="pull-right"><span class="label label-default">{{ $resource }}</span></span>
                            <i class="fa fa-plus text-aqua"></i> Gross Gain<br/>
                            <small>{{ __('resources.' . $key)}} spent each day</small>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="pull-right"><span class="label label-default">{{ $resource }}</span></span>
                            <i class="fa fa-minus text-orange"></i> Gross Loss<br/>
                            <small>{{ __('resources.' . $key)}} gained each day</small>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </li>

@endforeach
