<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="active treeview menu-open">
          <a href="{{route('pcst_department.index')}}">
            <i class="fa fa-dashboard"></i> <span>Departments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pcst_department.index')}}"><i class="fa fa-circle-o"></i> Manage Department</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Programs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pcst_program.index')}}"><i class="fa fa-circle-o"></i>Manage Program</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>cirriculum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pcst_curriculum.index')}}"><i class="fa fa-circle-o"></i>Manage Curriculum</a></li>
            
          </ul>
        </li>
        <li><a href="{{route('class_year.index')}}"><i class="fa fa-circle-o text-red"></i> <span>class year</span></a></li>
        <li><a href="{{route('pcst_section.index')}}"><i class="fa fa-circle-o text-yellow"></i> <span>section</span></a></li>
        <li><a href="{{route('pcst_semester.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>semester</span></a></li>
        <li><a href="{{route('academic_year.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Academic Years</span></a></li>
        <li><a href="{{route('academic_year_semester.index')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Academic Year Semesters</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('payment_type.index')}}"><i class="fa fa-circle-o"></i>Payment Setting</a></li>
            <li><a href="{{route('payment_type.index')}}"><i class="fa fa-circle-o"></i>Semester Payment</a></li>
            <li><a href="{{route('make_payment.index')}}"><i class="fa fa-circle-o"></i>Further Payment</a></li>
            <li><a href="{{route('payment_history.index')}}"><i class="fa fa-circle-o"></i>Payment
                History</a></li>

          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
