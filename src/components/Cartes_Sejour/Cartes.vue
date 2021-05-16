
<template>
    <div class="sejour">
        <div>
            <header-content></header-content>
        </div>

        <div class="container fluid cartes">
            <div class="row info" style="margin: 0 auto;">
                <h2>Effectuer une prise de rendez-vous en ligne </h2>
                <p class="rappel"> <span style="color:#ed3f4e">Rappel:</span>
                    Cette plateforme est un moyen rapide vous permettant d'effectuer une prise de rendez-vous en ligne
                    pour un depot ulterieur du dossier de demande de carte de séjour dans
                    le service approprié.</p>
            </div>

            <div class="row infosupplementaires">
                <div class="col-md-6">
                    <p>pour plus d'informations relatives à la
                        composition du du dossier de demande de carte de sejour en tunisie,
                        <a href=" http://www.sicad.gov.tn/Fr/Prestation_Octroi-de-la--carte-de-sejour-pour-etrangers_57_3_D1024 "
                            target="_blank">Cliquez ici</a>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>Avoir un avis sur les penalités de dépassement de sejour
                        <a href="http://www.centresmigrants.tn/fr/vivre-en-tant-que-migrant-en-tunisie/les-penalites-de-depassement-de-sejour"
                            target="_blank">Cliquez ici</a>
                    </p>

                </div>
            </div>


            <div align="right">
                <router-link to="rdv">
                    <button class="rdv" type="">Prenez un RDV</button>
                </router-link>
            </div>
        </div>
        <div style="bottom: 0;">
            <app-footer></app-footer>
        </div>
    </div>
</template>
<script>
    import AppFooter from '../dashboard/pages/AppFooter.vue'
    import HeaderContent from '../dashboard/pages/HeaderContent.vue'
    //import bus from '../../main'
    //import {mapState} from 'vuex'
    export default {
        components: {
            HeaderContent,
            AppFooter

        },
        methods: {
            save() {

                //this.$store.state.plainte=this.$store.state.message;
                this.$store.commit('updatePlainte', this.$store.state.message)
                // bus.$emit('pl',this.store.state.message)
            }
        },
        computed: {

            message: {
                get() {
                    return this.$store.state.message
                },
                set(value) {
                    this.$store.commit('updateMessage', value)

                }
            }
        },
        data() {
            return {
                show: false,
                show1: false,
                //plainte:''

            }
        }

    }
</script>

<style scoped>
.sejour{
    min-height: 100vh;
    background-color: #f4f5e7;
}
    .infosupplementaires p {
        font-size: 18px;
        font-style: italic;
    }

    .rdv {
        width: 400px;
        height: 50px;
        font-size: 20px;
        font-weight: bold;
    }

    .info {
        padding: 30px;
        margin: 50px;
    }

    .info h2 {
        color: #ed3f4e;
        margin: 0 auto;
        padding-bottom: 30px;
    }

    .info .rappel {
        font-size: 18px;
        font-weight: bold;
    }

    .dossier {
        flex-direction: column;
        align-content: space-around;
    }

    .dossier h3 {
        margin: 20px;

    }

    .cartes {

        margin: 0 auto;
        margin-top: 110px;
        padding: 80px;

        border-radius: 7px;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }

    button {
        width: 500px;
        height: 100px;
        background-color: #ed3f4e;
    }

    .infoDossier ul li {
        font-size: 20px;
        list-style: square outside;
    }

    .infoDossier {
        padding: 10px;
        margin: 10px;
    }
</style>