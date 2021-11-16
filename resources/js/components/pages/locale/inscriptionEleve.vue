<template>
    <div>
        <div class="wrapper">
            <Header />
            <MenuLocal />
            <div class="content-wrapper">
                <div class="container-full">
                    <section class="content">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    Formulaire d'inscription d'un eleve
                                </h4>
                                <!-- <h6 class="box-subtitle">You can us the validation like what we did</h6> -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body wizard-content">
                                <form
                                    action="#"
                                    class=""
                                    @submit.prevent="onSubmit"
                                >
                                    <!-- Step 1 -->

                                    <hr class="my-15" />
                                    <section>
                                        <div></div>
                                        <Upload
                                            multiple
                                            type="drag"
                                            action="api/admin/upload"
                                            :on-success="handleSuccess"
                                            :on-error="handleError"
                                            :format="['jpg', 'jpeg', 'png']"
                                            :max-size="2048"
                                            :on-format-error="handleFormatError"
                                            :on-exceeded-size="handleMaxSize"
                                            :headers="{
                                                'X-Requested-With':
                                                    'XMLHttpRequest'
                                            }"
                                        >
                                            <div style="padding: 20px 0">
                                                <Icon
                                                    type="ios-cloud-upload"
                                                    size="52"
                                                    style="color: #3399ff"
                                                ></Icon>
                                                <p class="text-center">
                                                    Cliquer ou glisser deposer
                                                    pour inserer la photo
                                                </p>
                                            </div>
                                        </Upload>
                                        <Modal title="Image" v-model="visible">
                                            <img
                                                :src="
                                                    `/Photos/Logos/${data.imageLogo}`
                                                "
                                                v-if="visible"
                                                style="width: 100%"
                                            />
                                            <div slot="footer">
                                                <Button
                                                    type="primary"
                                                    @click="visible = false"
                                                    >Close</Button
                                                >
                                            </div>
                                        </Modal>
                                        <div
                                            class="demo-upload-list"
                                            v-if="data.imageLogo"
                                        >
                                            <img
                                                :src="
                                                    `/Photos/Logos/${data.imageLogo}`
                                                "
                                            />
                                            <div class="demo-upload-list-cover">
                                                <Icon
                                                    type="ios-eye-outline"
                                                    @click.native="
                                                        handleView(
                                                            data.imageLogo
                                                        )
                                                    "
                                                ></Icon>
                                                <Icon
                                                    type="ios-trash-outline"
                                                    @click.native="
                                                        handleRemove(
                                                            data.imageLogo
                                                        )
                                                    "
                                                ></Icon>
                                            </div>
                                        </div>

                                        <br />
                                    </section>

                                    <section>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Matricule :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.matricule
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.matricule
                                                                .required &&
                                                                $v.data
                                                                    .matricule
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le matricule est requis
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Nom :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="data.nom"
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.nom
                                                                .required &&
                                                                $v.data.nom
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le nom est requis
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Prénom :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.Prenom
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.Prenom
                                                                .required &&
                                                                $v.data.Prenom
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le prénom est requis
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2">
                                                        Addresse email :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="email"
                                                        class="form-control required"
                                                        v-model="data.email"
                                                    />
                                                    <span
                                                        class="text-danger mt-2"
                                                        v-if="
                                                            (
                                                                !$v.data.email
                                                                    .email) &&
                                                                $v.data.email
                                                                    .$dirty
                                                        "
                                                    >
                                                        L'addresse email est
                                                        invalide
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2">
                                                        Sexe :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <select
                                                        class="custom-select form-control required"
                                                        v-model="data.sexe"
                                                    >
                                                        <option value="">
                                                            Selectioner son sexe
                                                        </option>
                                                        <option value="M"
                                                            >Masculin</option
                                                        >
                                                        <option value="F"
                                                            >Feminin</option
                                                        >
                                                    </select>
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.sexe
                                                                .required &&
                                                                $v.data.sexe
                                                                    .$dirty
                                                        "
                                                    >
                                                        La sexe est requis
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2">
                                                        Classe :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <select

                                                        class="custom-select form-control required"
                                                        v-model="data.classe"
                                                    >
                                                        <option
                                                            v-for="(data,
                                                            i) in classes"
                                                            :key="i"
                                                            :value="data.id"
                                                        >
                                                             {{data.libelleClasse }}

                                                        </option>
                                                    </select>
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.classe
                                                                .required &&
                                                                $v.data.classe
                                                                    .$dirty
                                                        "
                                                    >
                                                        La classe est requise
                                                    </span>
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Date de naissance  :


                                                    </label>
                                                    <input
                                                        type="date"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.dateNaiss
                                                        "
                                                    />

                                                </div>
                                                 <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.dateNaiss
                                                                .required &&
                                                                $v.data
                                                                    .dateNaiss
                                                                    .$dirty
                                                        "
                                                    >
                                                        La date de naissance est
                                                        requise </span
                                                    >
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Lieu de naissance :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.lieuNaiss
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.lieuNaiss
                                                                .required &&
                                                                $v.data
                                                                    .lieuNaiss
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le lieu de naissance est requis
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Nationalite :
                                                    </label>
                                                    <input
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.natio
                                                        "
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2">
                                                        Login :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.login
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.login
                                                                .required &&
                                                                $v.data.login
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le login est
                                                        requis</span
                                                    >

                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.login
                                                                .minLength &&
                                                                $v.data.login
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le login doit contenir
                                                        au moins 6 caracteres
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2">
                                                        Mot de passe :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="password"
                                                        class="form-control required"
                                                        v-model.trim="data.pass"
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.pass
                                                                .required &&
                                                                $v.data.pass
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le mot de passe est
                                                        requis</span
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2">
                                                        Mot de passe de
                                                        confirmation :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="password"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.Cpass
                                                        "
                                                    />

                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.Cpass
                                                                .required &&
                                                                $v.data.Cpass
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le mot de passe de
                                                        confirmation est requis
                                                    </span>
                                                    <span
                                                        class="text-danger"
                                                        v-else-if="
                                                            $v.data.Cpass
                                                                .$error &&
                                                                $v.data.Cpass
                                                                    .$dirty
                                                        "
                                                    >
                                                        Les mots de passe ne
                                                        sont pas identiques
                                                    </span>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <label for="">
                                                    Nouveau ?
                                                </label>

                                                <div class="form-group">
                                                    <RadioGroup
                                                        v-model="data.redoubl"
                                                        type="button"
                                                        button-style="solid"
                                                    >
                                                        <Radio
                                                            label="Oui"
                                                        ></Radio>
                                                        <Radio
                                                            label="Non"
                                                        ></Radio>
                                                    </RadioGroup>
                                                </div>
                                            </div>

                                            <Divider>
                                                LIAISON AVEC SON PARENT
                                            </Divider>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <Button
                                                    icon="ios-search"
                                                    type="primary"
                                                    @click="modal7 = true"
                                                    size="large"
                                                >
                                                    Rechercher
                                                </Button>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <Button
                                                    icon="md-add"
                                                    type="success"
                                                    @click="ParentForm"
                                                    size="large"
                                                >
                                                    Nouveau
                                                </Button>
                                            </div> -->
                                        </div>

                                        <br />

                                        <div
                                            class="row"
                                            v-if="
                                                nouveauParent == true ||
                                                    trouverParent == true
                                            "
                                        >
                                             <Divider>
                                                INFORMATION DU PARENT TROUVE
                                            </Divider>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Nom :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.nomParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.nomParent
                                                                .required &&
                                                                $v.data
                                                                    .nomParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le nom du parent est
                                                        requis
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Prenom :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.prenomParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data
                                                                .prenomParent
                                                                .required &&
                                                                $v.data
                                                                    .prenomParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le prenom du parent est
                                                        requis
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wemailAddress2">
                                                        Addresse email :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="email"
                                                        class="form-control required"
                                                        v-model="
                                                            data.emailParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger mt-2"
                                                        v-if="
                                                            (!$v.data
                                                                .emailParent
                                                                .required ||
                                                                !$v.data
                                                                    .emailParent
                                                                    .email) &&
                                                                $v.data
                                                                    .emailParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        L'addresse email est
                                                        invalide
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Profession :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.professionParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data
                                                                .professionParent
                                                                .required &&
                                                                $v.data
                                                                    .professionParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        La profession du parent
                                                        est requise
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        CNI :
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.cniParent
                                                        "
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlocation2">
                                                        Sexe :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <select
                                                        readonly
                                                        class="custom-select form-control required"
                                                        v-model="
                                                            data.sexeParent
                                                        "
                                                    >
                                                        <option value="">
                                                            Selectioner son sexe
                                                        </option>
                                                        <option value="M"
                                                            >Masculin</option
                                                        >
                                                        <option value="F"
                                                            >Feminin</option
                                                        >
                                                    </select>
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.sexeParent
                                                                .required &&
                                                                $v.data
                                                                    .sexeParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        La sexe est requis
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Addresse :
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.addressParent
                                                        "
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>
                                                        Téléphone :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        readonly
                                                        type="number"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.telParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.telParent
                                                                .required &&
                                                                $v.data
                                                                    .telParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le telephone du parent
                                                        est requis
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- <div class="form-group">
                                                    <label for="wlastName2">
                                                        Login du parent :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="text"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.loginParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.loginParent
                                                                .required &&
                                                                $v.data
                                                                    .loginParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le login est
                                                        requis</span
                                                    >

                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.loginParent
                                                                .minLength &&
                                                                $v.data
                                                                    .loginParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le login doit contenir
                                                        au moins 6 caracteres
                                                    </span>
                                                </div> -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <div class="form-group">
                                                    <label for="wlastName2">
                                                        Mot de passe du parent :
                                                        <span class="danger"
                                                            >*</span
                                                        >
                                                    </label>
                                                    <input
                                                        type="password"
                                                        class="form-control required"
                                                        v-model.trim="
                                                            data.passParent
                                                        "
                                                    />
                                                    <span
                                                        class="text-danger"
                                                        v-if="
                                                            !$v.data.passParent
                                                                .required &&
                                                                $v.data
                                                                    .passParent
                                                                    .$dirty
                                                        "
                                                    >
                                                        Le mot de passe est
                                                        requis</span
                                                    >
                                                </div> -->
                                            </div> <br>
                                            <div class="col-md-6">
                                                <input
                                                    type="submit"
                                                    class="btn btn-success"
                                                    value="Valider l'inscription"
                                                />
                                            </div>
                                        </div>
                                    </section>
                                </form>

                                <Modal
                                    title="Rechercher un parent "
                                    v-model="modal7"
                                >
                                    <Row>
                                        <Col span="16">
                                            <div class="form-group">
                                                <input
                                                    type="text"
                                                    placeholder="Entrer le télephone du parent"
                                                    class="form-control required"
                                                    v-model.trim="data.telSeach"
                                                />
                                            </div>
                                        </Col>
                                        <Col span="4" offset="1">
                                            <div class="form-group">
                                                <Button
                                                    type="primary"
                                                    icon="ios-search"
                                                    @click="SearchParent"
                                                    >Rechercher</Button
                                                >
                                            </div>
                                        </Col>
                                    </Row>

                                    <div slot="footer"></div>
                                    <br /><br />

                                    <div
                                        class="table-responsive"
                                        v-if="parent != ''"
                                    >
                                        <table
                                            id="example"
                                            class="table table-bordered "
                                            style="width:100%"
                                        >
                                            <thead class="bg-success">
                                                <tr>
                                                    <th>Nom et prénoms</th>
                                                    <th>Téléphone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ parent.nomParent }}
                                                        {{
                                                            parent.prenomParent
                                                        }}
                                                    </td>
                                                    <td>
                                                        {{ parent.telParent }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <Button
                                            style="background-color:#04A08B;color:white"
                                            icon="md-repeat"
                                            @click="getParentSearch"
                                        >
                                            Liaison
                                        </Button>
                                    </div>
                                </Modal>
                            </div>
                            <!-- /.box-body -->
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
import {
    required,
    minLength,
    alpha,
    email,
    maxLength,
    sameAs
} from "vuelidate/lib/validators";
import { log } from "util";

export default {
    components: { Header, MenuLocal, Chats },
    data() {
        return {
            UserData: [],
            modal7: false,
            data: {
                matricule: "",
                nom: "",
                classe: "",
                Prenom: "",
                sexe: "",
                email: "",
                login: "",
                pass: "",
                Cpass: "",
                dateNaiss:"",
                lieuNaiss:"",
                imageLogo: "",
                natio: "",
                address: "",
                nomParent: "",
                prenomParent: "",
                professionParent: "",
                addressParent: "",
                telParent: "",
                emailParent: "",
                idParent:"",
                telSeach: "",
                redoubl:"Oui"
            },
            EtabInfos: "",
            EcoleInfos: "",
            visible: false,
            uploadList: [],
            parent: "",
            nouveauParent: false,
            trouverParent: false,
            cniParent: "",
            loginParent: "",
            passParent: "",
            classes: [],

        };
    },

    validations: {
        data: {
            matricule: {
                required
            },
            classe: {
                required
            },
            nom: {
                required
            },
            Prenom: {
                required
            },

            profession: {
                required
            },
            Cni: {
                required
            },
            sexe: {
                required
            },
            email: {

                email
            },
            dateNaiss:{
                required
            },
            lieuNaiss:{
                required
            },


            emailParent: {
                required,
                email
            },
            login: {
                required,
                minLength: minLength(6)
            },
            pass: {
                required
            },
            Cpass: {
                required,
                sameAs: sameAs("pass")
            },
            nomParent: {
                required
            },
            prenomParent: {
                required
            },
            professionParent: {
                required
            },
            sexeParent: {
                required
            },
            telParent: {
                required
            },
            loginParent: {
                required,
                minLength: minLength(6)
            },
            passParent: {
                required
            }
        }
    },

    async mounted() {
        // Recuperer toutes les infos de cette ecole dans le storage

        if (localStorage.EtabInfos) {
            this.EtabInfos = JSON.parse(localStorage.getItem("EtabInfos"));
        }

        // Recuperer toutes les classes pour pouvoir inscrire

        const res = await this.callApi(
            "post",
            "api/locale/getClasseEtablissement",
            this.EtabInfos
        );

        this.classes = res.data;

        // console.log(this.classes);
    },

    methods: {
        async handleRemove(file) {
            const image = this.data;

            this.data.imageLogo = "";

            this.$refs.uploads.clearFiles();

            try {
                await axios.post("api/admin/delateImage", image);
            } catch (e) {
                this.generalError = e.response.data.errors;
            }
        },

        handleView(name) {
            this.data.imageLogo = name;
            this.visible = true;
        },

        handleSuccess(res, file) {
            this.data.imageLogo = res;
            console.log(res);
        },

        handleError(res, file) {
            this.w("Selectionner un jpg, png ou jpeg.");
        },
        handleFormatError(file) {
            this.w("Selectionner un jpg, png ou jpeg");
        },
        handleMaxSize(file) {
            this.w("Selctionner un fichier de moins de 2M.");
        },

        handleBeforeUpload() {
            const check = this.uploadList.length < 1;
            if (!check) {
                this.w("Le logo est requi...");
            }
            return check;
        },
        async onSubmit() {

            this.data.EcoleInfos = this.EtabInfos;
            this.$v.$touch();
            if (this.$v.$invalid) {
                const res = await this.callApi(
                    "post",
                    "api/locale/inscripEleve",
                    this.data
                );

                if (res.status == 200) {
                    this.s("Eleve inscrit  correctement");
                } else {
                    this.e("Une erreure est survenue");
                }
            } else {
                console.log("Errorrrrr");
            }
        },

        async SearchParent() {
            if (this.data.telSeach == "") {
                this.e("Veillez saisir le  téléphone du parent.");
            } else {
                this.data.EcoleInfos = this.EtabInfos;

                const res = await this.callApi(
                    "post",
                    "api/locale/SearchParent",
                    this.data
                );

                if (res.data == "") {
                    this.e("Aucun parent trouvé avec ce numéro");
                } else {
                    this.parent = res.data[0];
                    this.data.nomParent = this.parent.nomParent;
                    this.data.prenomParent = this.parent.prenomParent;
                    this.data.professionParent = this.parent.professionParent;
                    this.data.sexeParent = this.parent.sexeParent;
                    this.data.telParent = this.parent.telParent;
                    this.data.addressParent = this.parent.addressParent;
                    this.data.emailParent = this.parent.emailParent;
                    this.data.cniParent = this.parent.cniParent;
                    this.data.idParent = this.parent.id;
                }
            }
        },
        ParentForm() {
            this.nouveauParent = true;
        },

        getParentSearch() {
            this.trouverParent = true;
            this.modal7 = false;
            this.s("liaison parent-enfant faite normalement");
            this.telSeach=""
        },
        onChange:function(evenement,dat){
       console.log(dat);
    }
    }
};
</script>

<style>
.demo-upload-list {
    display: inline-block;
    width: 60px;
    height: 60px;
    text-align: center;
    line-height: 60px;
    border: 1px solid transparent;
    border-radius: 4px;
    overflow: hidden;
    background: #fff;
    position: relative;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    margin-right: 4px;
}
.demo-upload-list img {
    width: 100%;
    height: 100%;
}
.demo-upload-list-cover {
    display: none;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
}
.demo-upload-list:hover .demo-upload-list-cover {
    display: block;
}
.demo-upload-list-cover i {
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    margin: 0 2px;
}
</style>
