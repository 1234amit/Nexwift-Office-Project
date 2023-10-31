 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
     <ul>
         <li><a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
                 class="btn btn-primary">Logout</a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </li>
     </ul>
 </aside>
 <!-- /.control-sidebar -->
