<template>
    <section class="IContent">

        <table border="0" style="width: 750px;margin: 0 auto ;text-align: left ;" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td id="bandeau">
                        <h1>bandeau</h1>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <b-form id="identite">
                            <h2>Informations relatives aux faits :</h2>
                            Les champs suivis de (*) sont obligatoires.
                            <br><br>
                            <b-form-group label-class="bg-danger">
                                <template v-slot:label>
                                    <span
                                        style="color:white;padding-top:7px ; marging:7px ;font-weight: bold; font-size: 18px;">
                                        3. Eléments susceptibles d'orienter l'enquête</span>
                                </template>
                                <br>
                                <div class="message" style="text-align:justify;font-style:italic;">
                                    <p>
                                         <b-icon @click="openModal()" icon="exclamation-triangle-fill"
                                          variant="danger"  class="h3 mb-2"></b-icon>  Les
                                        informations que vous nous communiquez ne peuvent servir de
                                        support à la désignation nominative de l'auteur présumé des faits. Si vous
                                        connaissez son identité,
                                        vous devez vous rendre directement dans une unité de gendarmerie ou un service
                                        de
                                        police. <br>
                                        
                                             
                                         
                                    </p>

                                </div>
                                <br> 
                                <div>
                                    <b>Avez-vous des éléments pouvant servir à l'identification du ou des auteurs de
                                        l'infraction ? (*)</b><br>
                                    
                                    <b-form-radio v-model="selected" name="orientation" value="0"
                                        id="Faits_Orientation_Aucune-0">
                                        J'ai des éléments susceptibles d'orienter l'enquête. </b-form-radio> <br>
                                
                                        <b-form-group label-for="faits_orientaion" >
                                            <template v-slot:label>
                                                <p>Indiquez ici tous les renseignements susceptibles de faciliter l’identification
                                            des
                                            auteurs: description, vêtements, faits similaires connus, éléments de
                                            localisation, présence de caméra, pseudo utilisé, lien URL vers une publication
                                            haineuse. Nous vous invitons par ailleurs à conserver les éléments de preuve
                                            (support papier, SMS, capture d’écran, courriel, photo ou vidéo…). En cas de
                                            présence de témoins, faites part de leurs coordonnées."</p>
                                            </template>
                                            <b-form-textarea id="faits_orientaion" placeholder="Enter something..."
                                                rows="5" max-rows="15" alt=" Eléments susceptibles d'orienter l'enquête "
                                                name="Faits">
                                            </b-form-textarea>
                                        </b-form-group>
                                        <br>
                                        <b-form-radio v-model="selected" name="orientation" value="0">
                                            Je n'ai pas d'élément susceptible d'orienter l'enquête.
                                        </b-form-radio>
                                    
                                    </div>
                                   <!--
                                    <div >

                                        <button >
                                            <modal :adaptative=true :shiftX=0.8 :width="800" :height="auto" :scrollable=true
                                                name="my_message">
                                                <h1>Title</h1>
                                                <hr>
                                                <div>
                                                    <p style="font-size:18px">La mise en cause mensongère d'une personne,
                                                        dans le but de lui nuire, est susceptible
                                                        d'entraîner des poursuites pour dénonciation calomnieuse.
                                                        Article 226-10 du code pénal :
                                                        «La dénonciation, effectuée par tout moyen et dirigée contre une
                                                        personne déterminée, d'un
                                                        fait qui est de nature à entraîner des sanctions judiciaires,
                                                        administratives ou
                                                        disciplinaires et que l'on sait totalement ou partiellement inexact,
                                                        lorsqu'elle est
                                                        adressée soit à un officier de justice ou de police administrative
                                                        ou judiciaire, soit à une
                                                        autorité ayant le pouvoir d'y donner suite ou de saisir l'autorité
                                                        compétente, soit aux
                                                        supérieurs hiérarchiques ou à l'employeur de la personne dénoncée,
                                                        est punie de cinq ans
                                                        d'emprisonnement et de 45000 euros d'amende.
                                                        La fausseté du fait dénoncé résulte nécessairement de la décision,
                                                        devenue définitive,
                                                        d'acquittement, de relaxe ou de non-lieu déclarant que la réalité du
                                                        fait n'est pas établie
                                                        ou que celui-ci n'est pas imputable à la personne dénoncée.
                                                        En tout autre cas, le tribunal saisi des poursuites contre le
                                                        dénonciateur apprécie la
                                                        pertinence des accusations portées par celui-ci.»</p>
                                                </div>
                                            </modal> Open Modal
                                    
                                        </button>
                                    </div>
                                    -->
                                
                            </b-form-group>

                                <br>
                            <b-form-group label-class="bg-danger">
                                <template v-slot:label>
                                    <span
                                        style="color:white;padding-top:7px ; marging:7px ;font-weight: bold; font-size: 18px;">
                                        4. Préjudice</span>
                                </template>
<br>

                                <div>

                                    <b>Avez-vous subi un préjudice moral et/ou matériel ? (*)</b> <br>


                                    <b-form-radio v-model="selected" name="prejudice" value="0">
                                        J'ai subi un préjudice moral et/ou
                                        matériel.</b-form-radio> <br>

                                    <b-form-group label-for="faits_prejudice"
                                        label="Dans ce cas, veuillez le décrire ci-dessous.">
                                        <b-form-textarea id="faits_prejudice" placeholder="Enter something..." rows="10"
                                            max-rows="15" alt="Description du préjudice autre." name="faits_prejudice">
                                        </b-form-textarea>
                                    </b-form-group>



                                    <b-form-radio v-model="selected" name="prejudice" value="0">
                                        Je n'ai pas subi un préjudice moral et/ou
                                        matériel.</b-form-radio>

                                </div>
                            </b-form-group>
                            <div align="right">

                                <router-link to="/confirm">
                                    <b-button type="">Continuer >></b-button>
                                </router-link>
                            </div>
                        </b-form>
                    </td>
                </tr>
            </tbody>
        </table>


    </section>
</template>
<script>
    export default {
        name: 'fait',
        data() {
            return {

            }
        },
        mounted() {

        },
        methods: {
            openModal() {
                this.$modal.show('my_message');
            }
        }



    }
</script>
<style scoped src="@/assets/styles/plaintes.css">

</style>