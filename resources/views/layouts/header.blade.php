	<?php $Ica = new \App\Ica; ?>
		<!-- Logo -->
        <a href="{!!URL::to('/auth/')!!}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>M</b>ŞT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Müşteri</b>Takip</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
			  -->
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">
				  {!!$adet=\DB::table('siparis')->where('firma_id',\Session::get('firma'))->where('durum',0)->count('id')!!}
				  </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">{{$adet}} Adet Bildirim Bulunuyor?</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
					@foreach(\DB::table('siparis')->where('firma_id',\Session::get('firma'))->where('durum',0)->get() as $val)
					<?php $urun=\DB::table('urun')->select('urunadi','birim')->where('id',$val->urun_id)->first(); ?>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-aqua"></i> 
						  {{$val->miktar }} {{$urun->birim}} {{$urun->urunadi}} sipariş geldi.
                        </a>
                      </li>
					 @endforeach
                    </ul>
                  </li>
                  <li class="footer"><a href="#">Bildirimler</a></li>
                </ul>
              </li>
              <!-- 
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{!!$Ica->d_img(md5(Auth::id()).'.jpg','dist/img/users')!!}" class="user-image" alt="{{Session::get('name')}}"/>
                  <span class="hidden-xs">{{Session::get('name')}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{!!$Ica->d_img(md5(Auth::id()).'.jpg','dist/img/users')!!}" class="img-circle" alt="User Image" />
                    <p>
					  {{Session::get('name')}}
                      <small>{{date('d / m / Y')}}</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{!!URL::to('/auth/profile')!!}" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="{!!URL::to('/auth/logout')!!}" class="btn btn-default btn-flat">Çıkış</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button 
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>-->
            </ul>
          </div>
        </nav>