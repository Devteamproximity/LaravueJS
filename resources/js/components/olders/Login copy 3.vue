<template>
    <div class="auth-wrapper">
<div class="container auth-content">
<!-- <form> -->
<div class="card">
			<div class="row align-items-center">
            <div class="col-md-6 d-none d-md-block">
					<img src="assets/images/auth/auth-bg.jpg" alt="" class="">
				</div>
				<div class="col-md-6">
					<div class="card-body">
						<img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4" id="logoimg">
						<h4 class="mb-3 f-w-400">Connexion à votre compte</h4>
						<form @submit.prevent="handleSubmit">
                        <div class="form-group mb-2">
							<label class="form-label">Login</label>
							<input type="text" id="login" name="login" v-model="values.login" @blur="validate('login')" @keypress="validate('login')" class="form-control" placeholder="Entrer le login">
						<p  class="form-input-hint" v-if="!!errors.login">
                            {{ errors.login }}
                        </p>
                        </div>
						<div class="form-group mb-3">
							<label class="form-label">Mot de passe</label>
							<input type="password" id="motdepasse" name="motdepasse" v-model="values.motdepasse" @blur="validate('motdepasse')" @keypress="validate('motdepasse')"   class="form-control" placeholder="Entrer le mot de passe">
						<p  class="form-input-hint" v-if="!!errors.motdepasse">
                            {{ errors.motdepasse }}
                        </p>
                        </div>

						<div class="form-group text-left mt-2">
							<div class="checkbox checkbox-primary d-inline">
								<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
								<label for="checkbox-fill-a1" class="cr">Rester connecter</label>
							</div>
						</div>
						<button class="btn btn-primary mb-4">Login</button>
                        </form>
						<p class="mb-2 text-muted">Mot de passe oublié ? <a href="#" class="f-w-400">Réinitialiser</a></p>
						<p class="mb-0 text-muted">Vous êtes dejà inscrit ? <a href="#" class="f-w-400">Se connecter</a></p>
					</div>
				</div>

			</div>
		</div>
<!-- </form> -->

    </div>

</div>
</template>

<script>
import { object, string } from "yup";
import * as yup from "yup";
const loginFormSchema = object().shape({
  login: string().required("Merci de renseigner le login"),
  motdepasse: string().required("Merci de renseigner le mot de passe")
  .min(6,'Le mot de passe doit contenir au moins 6 caractères')
});
    export default {
        data()
        {
            return {

                   values: {
                    login: "",
                    motdepasse: "",
                },
                errors: {
                    login: "",
                    motdepasse: "",
                },


                IsloggIn:false,

            }

        },
        methods:{

         async  handleSubmit()
            {
                loginFormSchema
        .validate(this.values, { abortEarly: false })
        .then(() => {
          this.errors = {};

          // login the user
           const data={
                    login:this.values.login,
                    motdepasse:this.values.motdepasse,
                }



                axios.post("/api/login", data)
                    .then(response => {

                        console.log(response);

                    })
                    .catch(function (error) {
                        console.error(error.response);
                    });


            //      try {
            //     const response = axios.post("/api/login", data);
            //     console.log(response);

            //     // this.$emit("onUserChanged", response.data.user);
            // } catch (e) {
            //     // this.generalError = e.response.data.error;
            // }
        })
        .catch(err => {
          err.inner.forEach(error => {
            this.errors[error.path] = error.message;
          });
        });
    },
    validate(field) {
      loginFormSchema
        .validateAt(field, this.values)
        .then(() => {
          this.errors[field] = "";
        })
        .catch(err => {
          this.errors[field] = err.message;
        });
    }




        },
        mounted() {
            // console.log('Component mounted.')
        }
    }
</script>

<style scoped>
form p {
    color:red;
}
#logoimg{
    /* margin-top:-200px; */
}
</style>


