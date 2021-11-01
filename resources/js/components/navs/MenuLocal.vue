<template>
     <div>
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar position-relative">
                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%;">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <!--  Menu local dashboard -->
                            <li class="treeview">
                                <router-link to="dashboardLocal">
                                    <i class="icon-Layout-4-blocks"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Dashboard </span>
                                </router-link>
                            </li>

                            <!-- Menu local session   -->

                            <li class="treeview">
                                <router-link to="session">
                                    <i class="icon-Library"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Session </span> 
                                </router-link>
                            </li>

                             <!-- Menu local administration   -->

                             <li class="treeview">
                                <router-link to="administration">
                                    <i class="icon-File"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Administration</span>
                                </router-link>
                            </li>
                    
                        </ul>
                    </div>
                </div>
            </section>
            <div class="sidebar-footer">
                <a
                    href="javascript:void(0)"
                    class="link"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Settings"
                    aria-describedby="tooltip92529"
                    ><span class="icon-Settings-2"></span
                ></a>
                <a
                    href="mailbox.html"
                    class="link"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Email"
                    ><span class="icon-Mail"></span
                ></a>
                <a
                    href="javascript:void(0)"
                    class="link"
                    data-toggle="tooltip"
                    title=""
                    data-original-title="Logout"
                    ><span class="icon-Lock-overturning"
                        ><span class="path1"></span
                        ><span class="path2"></span></span
                ></a>
            </div>
        </aside>
        
        <div class="control-sidebar-bg"></div>
    </div>
</template>

<script>
export default {
    mounted() {
        // console.log('Component mounted.')
    }
};
</script>

<style scoped>
.sidebar-menu {
    white-space: nowrap;
    overflow: hidden;
    background-color: white;
}
</style>
