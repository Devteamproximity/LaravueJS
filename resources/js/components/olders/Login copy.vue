<template>
    <div class="auth-wrapper">
<div class="container auth-content">
<!-- <form> -->
<div class="card">
			<div class="row align-items-center">
            <div class="col-md-6 d-none d-md-block">
					<img src="assets/images/auth/auth-bg.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-md-6">
					<div class="card-body">
						<img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Connexion à votre compte</h4>
						<div class="form-group mb-2">
							<label class="form-label">Login</label>
							<input type="text" id="login" name="login" v-model="data.login" class="form-control" placeholder="Entrer le login">
						</div>
						<div class="form-group mb-3">
							<label class="form-label">Mot de passe</label>
							<input type="password" id="motdepasse" name="motdepasse" v-model="data.motdepasse" class="form-control" placeholder="Entrer le mot de passe">
						</div>

						<div class="form-group text-left mt-2">
							<div class="checkbox checkbox-primary d-inline">
								<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
								<label for="checkbox-fill-a1" class="cr">Rester connecter</label>
							</div>
						</div>
						<button class="btn btn-primary mb-4" @click="connexion()">Login</button>
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
    export default {
        data()
        {
            return {

                data:{
                   login:'',
                   motdepasse:'',
                   msg: [],
                },
                IsloggIn:false,

            }

        },
        methods:{

            async connexion()
            {
                if(this.data.login.trim()=='') this.e("Merci de renseigner le login")
                if(this.data.motdepasse.trim()=='') return this.e("Merci de renseigner le mot de passe")
                if(this.data.motdepasse.length <6) return this.e("Le mot de passe doit contenir au moins 6 caractères")
            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
