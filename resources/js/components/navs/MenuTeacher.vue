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
                                <router-link to="dashTeacher">
                                    <i class="icon-Layout-4-blocks"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Dashboard </span>
                                </router-link>
                            </li>

                            <!-- Menu local session   -->

                            <li class="treeview">
                                <router-link to="enseignements">
                                    <i class="icon-Write"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Enseignements  </span>
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

                            <!-- Menu gestion eleve   -->

                             <li class="treeview">
                                <router-link to="teacher.classe">
                                    <i class="icon-User"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Elèves </span>
                                </router-link>
                            </li>

                             <!-- Menu gestion des messsages  -->

                             <li class="treeview">
                                <router-link to="messageDash">
                                    <i class="icon-Mail"
                                        ><span class="path1"></span
                                        ><span class="path2"></span
                                    ></i>
                                    <span> Messages  </span>
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
