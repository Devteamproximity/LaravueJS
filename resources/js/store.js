import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {

        counter:100,

        dataToEdit: {
            groupeName: "",
            groupe: "Non",
            mixte: "Oui",
            codeEtablissement: "",
            libelleEtablissement: "",
            sigleEtablissement: "",
            typeEtablissement: "",
            dateCreation: "",
            emailEtablissement: "",
            telephoneEtablissement: "",
            telephoneEtablissementSecond: "",
            paysEtablissement: "",
            villeEtablissement: "",
            siteInternetEtablissement: "",
            sloganEtablissement: "",
            directeurEtablissement: "",
            telephoneDirecteurEtablissement: "",
            addressEtablissement:"",
            nomAdmin: "",
            PrenomAdmin: "",
            telAdmin: "",
            fonctionAdmin: "",
            emailAdmin: "",
            loginAdmin: "",
            passAdmin: "",
            CpassAdmin: "",
            imageProfil: ""
        },

        datasUser : {},

    
    },

    mutations: { 

        muttation(state, playload) {

           state.dataToEdit = playload

           console.log(playload)
        },

        saveUserdata (state, playload) {

             state.datasUser = playload
 
             console.log(playload) 


         },
 


    },

    // actions: {
    //     changemuttationAction({ commit }, data) {
    //         commit("changemuttation", data);
    //     }
    // }
});
