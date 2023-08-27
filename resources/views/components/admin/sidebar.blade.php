<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">News Aggregator</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item ">
              <a class="nav-link @if(request()->routeIs('index')) active @endif" href="/admin">
                
                Панель управления              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif"  href="/categories">
               
                Категории
              </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link " 
                href="{{ route('admin.categoriesIndex') }}" 
                style="@if(request()->routeIs('admin.news.*')) color: red @endif">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Категории+
                </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/news">
                
               Новости
              </a> -->
              <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости+
                </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="{{ route('admin.profile.index') }}">
                
                Пользователи
              </a>
            </li>
           
          </ul>

        
        </div>
      </div>
    </div>