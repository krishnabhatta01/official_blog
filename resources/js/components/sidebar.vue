<template>
    <div>
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <router-link to="/" class="nav-link collapsed">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span></router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link to="/tags" class="nav-link collapsed">
                       <i class="bi bi-tags"></i>
                        <span>Tags</span></router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link to="/category" class="nav-link collapsed">
                        <i class="bi bi-card-checklist"></i>
                        <span>Category</span></router-link
                    >
                </li>
                <!-- End Dashboard Nav -->
            </ul>
        </aside>
    </div>
</template>
