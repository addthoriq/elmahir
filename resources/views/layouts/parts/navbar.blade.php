<div class="navbar-header">
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    <form role="search" class="navbar-form-custom" action="search_results.html">
        <div class="form-group align-items-center">
            <input type="text" placeholder="Penelusuran..." class="form-control" name="top-search" id="top-search">
        </div>
    </form>
</div>
<ul class="nav navbar-top-links navbar-right">
    <li style="padding: 20px">
        <span class="m-r-sm text-muted welcome-message"><?= date('l, d F Y') ?></span>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
        </a>
        <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
            <li>
                <div class="dropdown-messages-box">
                    <a class="dropdown-item float-left" href="profile.html">
                        <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a7.jpg') }}">
                    </a>
                    <div class="media-body">
                        <small class="float-right">46h ago</small>
                        <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                        <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                    </div>
                </div>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <div class="dropdown-messages-box">
                    <a class="dropdown-item float-left" href="profile.html">
                        <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/a4.jpg') }}">
                    </a>
                    <div class="media-body ">
                        <small class="float-right text-navy">5h ago</small>
                        <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                        <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                    </div>
                </div>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <div class="dropdown-messages-box">
                    <a class="dropdown-item float-left" href="profile.html">
                        <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/profile.jpg') }}">
                    </a>
                    <div class="media-body ">
                        <small class="float-right">23h ago</small>
                        <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                        <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                    </div>
                </div>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <div class="text-center link-block">
                    <a href="mailbox.html" class="dropdown-item">
                        <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                    </a>
                </div>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
            <li>
                <a href="mailbox.html" class="dropdown-item">
                    <div>
                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                        <span class="float-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <a href="profile.html" class="dropdown-item">
                    <div>
                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                        <span class="float-right text-muted small">12 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <a href="grid_options.html" class="dropdown-item">
                    <div>
                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                        <span class="float-right text-muted small">4 minutes ago</span>
                    </div>
                </a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                <div class="text-center link-block">
                    <a href="notifications.html" class="dropdown-item">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle count-info d-flex flex-row" data-toggle="dropdown" href="#">
            <img alt="image" class="rounded-circle" src="{{ asset('inspinia/img/profile_small.jpg') }}" width="20px" height="20px" />
            <span class="mb-0 ml-2 text-muted welcome-message">Suryo Widiyanto</span>
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="login.html">Logout</a></li>
        </ul>
    </li>
</ul>