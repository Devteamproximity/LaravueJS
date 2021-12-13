<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div class="row align-items-end">
                            <div class="col-xl-12 col-12">
                                <div class="box bg-primary-light pull-up">
                                    <div class="box-body p-xl-0">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-3">
                                                <img
                                                    src="images/cap3.png"
                                                    alt=""
                                                />
                                            </div>

                                            <div class="col-12 col-lg-9">
                                                <h2
                                                    v-for="(data,
                                                    i) in EtabInfos"
                                                    :key="i"
                                                >
                                                    {{ data.libelleEtab }}
                                                </h2>

                                                <p
                                                    class="text-dark mb-0 font-size-16"
                                                >
                                                    Bienvenu,
                                                    {{
                                                        this.users.prenom
                                                    }}
                                                    (Admin)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="box no-shadow mb-0 bg-transparent">
                                    <div class="box-header no-border px-0">
                                        <Alert fade=true show-icon closable>
                                            Statistiques

                                            <!-- <img  style=""  src="/images/app.gif" alt="" width="30px" height="50px"> -->
                                            <Icon
                                                type="ios-bulb-outline"
                                                slot="icon"
                                            ></Icon>
                                            <template slot="desc">
                                                Quelques chiffres concernant votre école...
                                            </template>
                                        </Alert>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style=" background-color:red">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pr-2 justify-content-between">
									<div class="d-flex">
										<span class="badge badge-primary mr-15">50</span>

									</div>

								</div>
								<h4 class="mt-25 mb-5">ELEVES</h4>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-2.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pr-2 justify-content-between">
									<div class="d-flex">
										<span class="badge badge-dark mr-15">Finished</span>
									</div>
									<div class="dropdown">
										<a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">Programming</h4>
								<p class="text-fade mb-0 font-size-12">1 Days Left</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-3.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pr-2 justify-content-between">
									<div class="d-flex">
										<span class="badge badge-primary mr-15">Active</span>
										<span class="badge badge-primary mr-5"><i class="fa fa-lock"></i></span>
									</div>
									<div class="dropdown">
										<a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">Networking</h4>
								<p class="text-fade mb-0 font-size-12">15 days Left</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6 col-12">
					<div class="box bg-secondary-light pull-up" style="background-image: url(https://www.multipurposethemes.com/admin/eduadmin-template/images/svg-icon/color-svg/st-4.svg); background-position: right bottom; background-repeat: no-repeat;">
						<div class="box-body">
							<div class="flex-grow-1">
								<div class="d-flex align-items-center pr-2 justify-content-between">
									<div class="d-flex">
										<span class="badge badge-warning-light mr-15">Paused</span>
										<span class="badge badge-warning-light mr-5"><i class="fa fa-lock"></i></span>
									</div>
									<div class="dropdown">
										<a data-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
										  <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
										  <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
										  <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
										  <div class="dropdown-divider"></div>
										  <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</div>
								</div>
								<h4 class="mt-25 mb-5">Network Security</h4>
								<p class="text-fade mb-0 font-size-12">21 Days Left</p>
							</div>
						</div>
					</div>
				</div> -->
                        </div>

                        <div class="row">

                            <div class="col-xl-4 col-12">
                                <div
                                    class="box"
                                    style="background-color:#E67D21;color:white"
                                >
                                    <div class="box-body">
                                        <h1 style="font-size: 40px;">
                                            {{ Stats["totalEleves"]
                                            }}
<!--
                                            <Divider type="vertical" /> -->
                                            <Icon type="md-walk" class ="pull-right "  style="font-size: 80px;"/>
                                        </h1>
                                        <p
                                            class="mt-0 mb-20 "
                                            style="font-size: 10px;"
                                        >
                                            ELEVES
                                        </p>
                                        <div id="charts_widget_2_chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div
                                    class="box"
                                    style="background-color:#2196F3;color:white"
                                >
                                    <div class="box-body">
                                        <h1 style="font-size: 40px;">
                                            {{ Stats["totalEnseignants"] }}
                                            <!-- <Divider type="vertical" /> -->
                                          <Icon class ="pull-right "  style="font-size: 80px;" type="ios-man" />
                                        </h1>
                                        <p
                                            class="mt-0 mb-20 "
                                            style="font-size: 10px;"
                                        >
                                            ENSEIGNANTS
                                        </p>
                                        <div id="charts_widget_2_chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-12">
                                <div
                                    class="box"
                                    style="background-color:#E91E63;color:white"
                                >
                                    <div class="box-body">
                                        <h1 style="font-size: 40px;">
                                            {{ Stats["totalParents"] }}
                                            <!-- <Divider type="vertical" /> -->
                                            <Icon type="ios-people" class ="pull-right "  style="font-size: 80px;"/>
                                        </h1>
                                        <p
                                            class="mt-0 mb-20 "
                                            style="font-size: 10px;"
                                        >
                                            PARENTS
                                        </p>
                                        <div id="charts_widget_2_chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <Chats />
    </div>
</template>

<script>
import Header from "../../headers/Header.vue";
import MenuLocal from "../../navs/MenuLocal.vue";
import Chats from "../../navs/Chats.vue";
import { mapState } from "vuex";

export default {
    components: { Header, MenuLocal, Chats },
    data() {
        return {
            EtabInfos: [],
            Stats: [],
            users: []
        };
    },

    //  Recuperer les donnees envoyees dans la store par computed:

    async mounted() {
        if (localStorage.users) {
            this.users = JSON.parse(localStorage.getItem("users"));
        }

        const response = await this.callApi(
            "post",
            "api/locale/getEtabinfos",
            this.users
        );

        this.EtabInfos = response.data;

        // Garder les donnees de l'ecole dans le storage de navigateur

        localStorage.setItem("EtabInfos", JSON.stringify(this.EtabInfos));

        //  STATISTIQUES

        const response2 = await this.callApi(
            "post",
            "api/locale/getstatsEtab",
            this.EtabInfos
        );

        this.Stats = response2.data;
    }
};
</script>
