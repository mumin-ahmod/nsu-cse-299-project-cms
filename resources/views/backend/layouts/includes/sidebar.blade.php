<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Admin Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Active Projects</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="components-pagination.html">
                        <i class="bi bi-circle"></i><span>Active Projects</span>
                    </a>

                </li>
            </ul>
        </li><!-- End Components Nav -->


        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cast-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Customers</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cast-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{route('customers.create')}}">
                        <i class="bi bi-circle"></i><span>Add Customers</span>
                    </a>

                </li>
                <li>
                    <a href="{{route('customers.index')}}">
                        <i class="bi bi-circle"></i><span>All Customers</span>
                    </a>

                </li>
            </ul>
        </li><!-- End Components Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#compn-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Companies</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="compn-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{route('companies.create')}}">
                        <i class="bi bi-circle"></i><span>Add Company</span>
                    </a>

                </li>
                <li>
                    <a href="{{route('companies.index')}}">
                        <i class="bi bi-circle"></i><span>All Companies</span>
                    </a>

                </li>
            </ul>
        </li><!-- End Components Nav -->

        
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#sale-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Sales</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="sale-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{route('sales.create')}}">
                        <i class="bi bi-circle"></i><span>Add Sales Data</span>
                    </a>

                </li>
                <li>
                    <a href="{{route('sales.index')}}">
                        <i class="bi bi-circle"></i><span>All Sales Data</span>
                    </a>

                </li>
            </ul>
        </li><!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <a href="{{route('leave-requests.my-requests')}}">
                    <i class="bi bi-circle"></i><span>Leave Request</span>
                </a>

                <a href="{{route('leave-requests.index')}}">
                    <i class="bi bi-circle"></i><span>Approve Leave Requests</span>
                </a>

                <a href="{{route('products.index')}}">
                    <i class="bi bi-circle"></i><span>Products</span>
                </a>



                <a href="forms-layouts.html">
                    <i class="bi bi-circle"></i><span>My Projects</span>
                </a>


                <a href="forms-layouts.html">
                    <i class="bi bi-circle"></i><span>Memo</span>
                </a>


                <a href="forms-layouts.html">
                    <i class="bi bi-circle"></i><span>Explore Opportunities</span>
                </a>
        </li>



    </ul>
    </li><!-- End Forms Nav -->



    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Analytics</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <a href="{{route('sales.chart')}}">
                <i class="bi bi-circle"></i><span>Sales Analytics</span>
            </a>
    </li>
    </ul>
    </li><!-- End Charts Nav -->


    <li class="nav-heading">Pages</li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user-roles.index')}}">
            <i class="bi bi-person"></i>
            <span>Make Admin</span>
        </a>
    </li><!-- End Profile Page Nav -->




    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('logout')}}">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>Log out</span>
        </a>
    </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
