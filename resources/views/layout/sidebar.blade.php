     <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
             <!-- Sidebar user panel -->
             <div class="user-panel">
             </div>
             <!-- sidebar menu: : style can be found in sidebar.less -->
             <ul class="sidebar-menu" data-widget="tree">
                 <li class="header">Main Navigation</li>
                 <li>
                     <a href="{{ route('users.index') }}"><i class="fa fa-cube"></i>
                         <span>Admin</span>
                     </a>
                 </li>
                 <li>
                     <a href="{{ route('goods.index') }}"><i class="fa fa-cube"></i>
                         <span>Barang</span></a>
                 </li>
                 <li>
                     <a href="{{ route('containers.index') }}"><i class="fa fa-cube"></i>
                         <span>Kontainer</span></a>
                 </li>
                 <li>
                     <a href="{{ route('sendingItems.index') }}"><i class="fa fa-cube"></i>
                         <span>Pengiriman Barang</span></a>
                 </li>
                 <li>
                     <a href="{{ route('print.index') }}"><i class="fa fa-cube"></i>
                         <span>Print Laporan Barang</span></a>
                 </li>
                 <li>
                     <a href="{{ route('printContainer.index') }}"><i class="fa fa-cube"></i>
                         <span>Print Laporan Kontainer</span></a>
                 </li>
                 <li>
                     <a href="{{ url('/logout') }}">
                         <i class="fa fa-circle-o-notch">
                         </i><span>Logout</span>
                     </a>
                 </li>
             </ul>
         </section>
         <!-- /.sidebar -->
     </aside>
