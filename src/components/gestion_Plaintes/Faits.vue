<template>
    <section class="IContent">
        <table border="0" cellspacing="0" style="margin-bottom: 15px;  margin: 0 auto;">
            <tbody>
                <tr>
                    <td id="bandeau">
                        <table border="0" width="100%" cellspacing="0" style="margin-bottom: 15px;">
                            <tbody>
                                <tr id="haut">
                                    <td>
                                        <h1>Infos sur les Faits</h1>
                                        <!--  <p>Rappel : les informations que vous nous communiquez ne peuvent servir de
                                            support à la désignation nominative de l'auteur présumé des faits. Si vous
                                            connaissez son identité, vous devez vous rendre directement dans une unité
                                            de gendarmerie ou un service de police.</p>-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b-form id="identite">
                            <h1>Informations relatives au faits</h1>
                            Les champs suivis de (*) sont obligatoires.
                            <br><br>
                            <b-form-group label-class="bg-danger">
                                <template v-slot:label>
                                    <label for=""
                                        style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">1.
                                        Faits et Circonstances</label>
                                </template>

                                <div>


                                    <b-form-group label-class="bg-dark">
                                        <template v-slot:label>
                                            <span
                                                style="color:white ;width:auto; padding-top:7px ; marging:7px; font-size: 18px;">Vous
                                                Quels sont les faits dont vous avez été victime ?<span
                                                    class="text-danger">*</span> </span>
                                        </template>
                                        <b-form-radio v-model="selected" name="Personne_Implication" value="Victime">
                                            Atteinte aux biens
                                        </b-form-radio>
                                        <b-form-radio v-model="selected" name="Personne_Implication" value="morale">
                                            Fait discriminatoire</b-form-radio>
                                    </b-form-group>

                                </div>
                                <div>

                                    <div>
                                        <font size="2" id="txtExpl_1">
                                            Indiquez ici brièvement le motif de votre plainte
                                            (actes de discrimination, provocation
                                            à la discrimination ou à la haine, injure ou diffamation
                                            à caractère discriminatoire...). Une définition des infractions
                                            les plus courantes et des exemples sont disponibles dans la rubrique
                                            d'aide.</font>
                                    </div>

                                    <b-form-group label-for="motif">
                                        <b-form-textarea id="motif" v-model="text" placeholder="Enter something..."
                                            rows="1" max-rows="1" name="Faits_Expose" alt="Motif de la plainte">
                                        </b-form-textarea>
                                    </b-form-group>
                                </div>
                                <div>

                                    <p>
                                        <font size="2">Indiquez, le plus précisément possible, de quelle façon les faits
                                            se
                                            sont produits ou comment vous pensez qu'ils se sont produits. Indiquez
                                            également
                                            si vous avez subi des menaces au moment où ces faits se sont produits.
                                            Précisez
                                            lesquelles.</font>
                                    </p>

                                    <b-form-group label-for="faits">
                                        <template v-slot:label> <b>Décrivez les faits et comment vous en avez pris
                                                connaissance.</b> <span class="text-danger">*</span></template>
                                        <b-form-textarea id="faits" v-model="text" placeholder="Enter something..."
                                            rows="10" max-rows="15" alt="Description des faits" name="Faits">
                                        </b-form-textarea>
                                    </b-form-group>

                                </div>
                            </b-form-group>


                            <b-form-group label-class="bg-danger">
                                <template v-slot:label>
                                    <span
                                        style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">
                                        2. Le lieu de l'infraction</span>
                                </template>
                                <legend> </legend>
                                <div id="localisation_div">
                                    <p>


                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Pays(*):" label-for="pays">
                                            <b-form-input id="pays" v-model="name" required placeholder="pays">
                                            </b-form-input>
                                        </b-form-group>
                                    </p>

                                    <p>
                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="dept" label="Département:">
                                            <b-form-input id="dept" v-model="name" required placeholder="departement">
                                            </b-form-input>
                                        </b-form-group>
                                    </p>
                                    <p>
                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Code postal:" label-for="CP">
                                            <b-form-input id="CP" v-model="name" required placeholder="code postal">
                                            </b-form-input>
                                        </b-form-group>
                                    </p>

                                    <p>
                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Commune" label-for="commune">
                                            <b-form-input id="" v-model="name" required placeholder="commune">
                                            </b-form-input>
                                        </b-form-group>
                                        <p>


                                            <div width="100%">






                                                <br>
                                                <b> Où cela s'est-il passé ?</b> <br><br>
                                                <b-form-group label-for="loc_faits" id="localisation_fait">
                                                    <template v-slot:label>
                                                        <i id="lieuInfra">
                                                            <font size="2">Mentionner le lieu où les faits se sont
                                                                produits […],
                                                                voie publique, affichage dans un lieu public (préciser
                                                                le lieu et le
                                                                mode d’affichage), internet (préciser: réseau social,
                                                                page
                                                                privée ou accessible à tous (facebook,twitter,blog …) et
                                                                copier le
                                                                lien URL précis vers la publication.</font>
                                                        </i>
                                                        <span class="text-danger">*</span>
                                                    </template>
                                                    <b-form-textarea id="loc_faits" v-model="text"
                                                        placeholder="Enter something..." rows="2" max-rows="5"
                                                        name="Faits_Expose" alt="Localisation des faits"
                                                        :disabled="disabled">
                                                    </b-form-textarea>
                                                    {{disabled}}
                                                </b-form-group>
                                                <div id="memo_" class="memoNb">
                                                    <br><br>

                                                    <b-form-checkbox id="" v-model="status" name="checkbox-1"
                                                        value="accepted" unchecked-value="not_accepted">
                                                        Je ne sais pas où se sont produits les faits
                                                    </b-form-checkbox>
                                                    {{status}}

                                                </div>
                                            </div>
                                            <!--
                                            <div width="100%">
                                                <p><b>Quand cela s'est-il passé?</b><span class="text-danger">*</span>
                                                </p>
                                                <p> <i>
                                                        <font size="2">Indiquez le moment où les faits se sont produits,
                                                            en
                                                            cochant et complétant une des trois rubriques :
                                                            <br>Soyez le plus précis possible, à défaut cochez la case
                                                            "Je ne
                                                            sais pas quand se sont produits les faits"?
                                                        </font>
                                                    </i></p>

                                                <b-form-radio v-model="selected" name="date_faits" value="">
                                                    Je connais la date et l'heure des
                                                    faits
                                                </b-form-radio>
                                                <b-form-group label-for="date_fait" description="(format jj/mm/aaaa)">
                                                    <b-form-input style="width:30%" id="date_fait" type="text ">
                                                    </b-form-input>
                                                </b-form-group>
                                                <b-form-radio v-model="selected" name="date_faits" value="Je ne
                                                connais pas précisement la
                                                date et/ou l'heure des faits">
                                                    Je ne
                                                    connais pas précisement la
                                                    date et/ou l'heure des faits</b-form-radio>




                                                <b-form-group label-for="date_incertaine"
                                                    description="(format jj/mm/aaaa)">
                                                    Entre le
                                                    <b-form-input id="date_incertaine" style="width:30%"></b-form-input>
                                                    et le
                                                    <b-form-input style="width:30%" id="date_incertaine"></b-form-input>
                                                </b-form-group>

                                                <br>
                                            <b-form-radio>Je
                                                ne sais pas quand se sont produits les faits</b-form-radio>

                                            </div>
                                            -->
                                </div>
                            </b-form-group>

                            <div align="right">
                                <router-link to="/fait2">
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
                status: 'not_accepted',
                disabled: false
            }
        },
        methods: {
            change() {
                if (this.status === "accepted") {
                    this.disabled = true
                    console.log(this.disabled);
                    return this.disabled

                } else {
                    return this.disabled = false
                }

            }

        }


    }
</script>
<style scoped src="@/assets/styles/plaintes.css">

</style>