<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">

         

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('dashboard')}}">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('order.entry')}}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Order Entry
              </a>
            </li>

        

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('product.list')}}">
                <svg class="bi"><use xlink:href="#cart"/></svg>
                Product Info
              </a>
            </li>

            


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/customer')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Customer
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{route('Stock')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Stock
              </a>
            </li>


            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/category')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Category
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/payment')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Payment
              </a>
            </li>

  
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/business-setting')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Business Setting
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/sales-executive')}}">
                <svg class="bi"><use xlink:href="#people"/></svg>
                Sales Executive
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/report')}}">
                <svg class="bi"><use xlink:href="#graph-up"/></svg>
                Reports
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="#">
                <svg class="bi"><use xlink:href="#puzzle"/></svg>
                Account
              </a>
            </li>
          </ul>

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/Login')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Login
              </a>
            </li>

          
          <ul class="nav flex-column mb-auto">
            
          
           
            

            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{url('/admin')}}">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                Admin
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{Route('logout')}}">
                <svg class="bi"><use xlink:href="#door-closed"/></svg>
                Sign out

              </a>
            </li>
          
          </ul>
        </div>
      </div>
    </div>