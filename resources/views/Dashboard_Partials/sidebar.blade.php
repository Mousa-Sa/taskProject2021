<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('plugins_dashboard/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
Task Project        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="sidebar1 nav-item  ">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="sidebar2 nav-item">
                <a class="nav-link" href="{{route('order.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Orders</p>
                </a>
            </li>


        </ul>
    </div>
</div>
