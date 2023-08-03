<div class="border-end bg-body" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom pt-5 text-center">
        <img class="sideBarlogo" src="/image/frontend/logo.png">
        <p class="portal pt-4 pb-2">ADMINISTRATOR PORTAL</p>
    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminDashboard"><i class="bi bi-bar-chart-line-fill pe-3"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminNewOrders"><i class="bi bi-box pe-3"></i> New Orders</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminProductCategories"><i class="bi bi-calendar-check pe-3"></i> Categories</a>
        <a class="list-group-item list-group-item-action list-group-item-light haveSubMenu" href="#"><i class="bi bi-bag pe-3"></i> Products <i class="bi bi-plus plus"></i></a>
        <ul class="list-group collapse">
            <a class="list-group-item list-group-item-action list-group-item-light" href="/adminViewGear"><i class="bi bi-gear ps-4 pe-2"></i>Gears</a>
            <a class="list-group-item list-group-item-action list-group-item-light" href="/adminViewBolts"><i class="bi bi-lightning ps-4 pe-2"></i>Bolts</a>
            <a class="list-group-item list-group-item-action list-group-item-light" href="/adminViewOthers"><i class="bi bi-motherboard ps-4 pe-2"></i>Others</a>
        </ul>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminSalesReport"><i class="bi bi-receipt-cutoff pe-3"></i> Sales Report</a>
    </div>
    <div class="sidebar-footing border-top pt-4 text-center">
        <p class="text-center" id="dateDisplay"></p>
        <p class="text-center" id="clockDisplay"></p>

        <a href="/userLogout" type="button" class="btn btn-sm" id="logout" data-title="Logout?">
            <i class="bi bi-box-arrow-left fs-4"></i>
        </a>
    </div>
</div>
