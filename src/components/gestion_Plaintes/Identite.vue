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
                                        <h1>Infos perso</h1>
                                        <!-- <h3>apres avoir rempli le formumlaire , afficher les infos pr confirmer/modifier</h3>-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--
                        <div class="globalFil">
                            <ul id="breadcrumbs">
                                <li><a href="" class="past">Lieu de dépôt de plainte</a>
                                </li>
                                <li><a href="" class="current">Identité</a>
                                </li>
                                <li><a href="#">Les faits</a>
                                </li>
                                <li><a href="#">Préjudice matériel</a>
                                </li>
                                <li><a href="#">Contact</a>
                                </li>
                                <li><a href="#">Confirmation</a>
                                </li>
                            </ul>
                            <div style="float:right;position:relative;top:-42px;"><a href="/exit"
                                    title="Annuler ma démarche"><img src="/images/sortie32.png"></a></div>
                        </div>
                        -->

                        <!-- <form name="identite" method="post" action="" id="identite">-->
                        <b-form id="identite">
                            <h1>Identité</h1>
                            Les champs suivis de (*) sont obligatoires.
                            <br><br>
                            <h2>Informations vous concernant</h2>

                            <p>
                                <i>
                                    <font size="2">Seule la victime, ou son représentant légal le cas échéant, peut
                                        établir cette déclaration.</font>
                                </i><br>
                                <!--qualit&eacute; de :-->
                            </p>
                            <p>

                                <b-form-group label-class="bg-danger">
                                    <template v-slot:label>
                                        <label
                                            style="color:white ;width:auto; padding-top:7px ; marging:7px; font-size: 18px;">Vous
                                            déposez plainte en qualité de: </label>
                                    </template>
                                    <b-form-radio v-model="selected" name="Personne_Implication" value="Victime">Victime
                                    </b-form-radio>
                                    <b-form-radio v-model="selected" name="Personne_Implication" value="morale">
                                        représentant légal d'une personne morale</b-form-radio>
                                    <b-form-radio v-model="selected" name="Personne_Implication" value="tuteur">
                                        représentant légal d'une personne physique (mineure, sous
                                        tutelle, ...)</b-form-radio>

                                </b-form-group>

                                <b-form-group label-class="bg-danger">
                                    <template v-slot:label>
                                        <label for=""
                                            style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">Etat
                                            Civil</label>
                                    </template>

                                    <div>
                                        <b-form-group label-for="sex" align="center">
                                            <template v-slot:label>Vous êtes: <span
                                                    class="text-danger">*</span></template>
                                            <b-form-radio inline v-model="selected" name="sexe" value="Mr">Mr
                                            </b-form-radio>
                                            <b-form-radio inline v-model="selected" name="sexe" value="Mme"> Mme
                                            </b-form-radio>


                                        </b-form-group>
                                    </div>
                                    <div>

                                   <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Nom de naissance(*):" label-for="name">
                                            <template v-slot:label>
                                                Nom Naissance <span class="text-danger">*</span>
                                            </template>
                                            <b-form-input id="name" v-model="name" required placeholder="Enter name">
                                            </b-form-input>
                                        </b-form-group>

                                    </div>
                                    <div>

                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Nom d'époux(se)" label-for="nomEp">
                                            <b-form-input id="nomEp" v-model="name" required
                                                placeholder="Enter nom epoux">
                                            </b-form-input>
                                        </b-form-group>

                                    </div>
                                    <div>

                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="prenom">
                                            <template v-slot:label>
                                                Prenom(s) <span class="text-danger">*</span>
                                            </template>
                                            <b-form-input id="prenom" v-model="name" required placeholder="prenom">
                                            </b-form-input>
                                        </b-form-group>
                                    </div>

                                    <div>

                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="nais" description="(jj/mm/aaaa)">
                                            <template v-slot:label>
                                                Date de naissance <span class="text-danger">*</span>
                                            </template>
                                            <b-form-input id="nais" v-model="name" required placeholder="date nais"
                                                pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/(19|20)[0-9]{2}$"
                                                max="2020-11-17"></b-form-input>
                                        </b-form-group>

                                    </div>

                                    <b>Lieu de naissance</b>
                                    <div>

                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="dept" label="Département:">
                                            <b-form-input id="dept" v-model="name" required placeholder="departement">
                                            </b-form-input>
                                        </b-form-group>
                                    </div>
                                    <div>
                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Code postal:" label-for="CP">
                                            <b-form-input id="CP" v-model="name" required placeholder="code postal">
                                            </b-form-input>
                                        </b-form-group>


                                    </div>

                                    <div>

                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Commune" label-for="commune">
                                            <b-form-input id="" v-model="name" required placeholder="commune">
                                            </b-form-input>
                                        </b-form-group>
                                        <p>

                                            <p>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="4"
                                                    label-align-md="left" label-for="SF">
                                                    <template v-slot:label> Situation familiale <span
                                                            class="text-danger">*</span></template>
                                                    <b-form-select id="SF" v-model="selected" :options="options">
                                                    </b-form-select>
                                                </b-form-group>

                                            </p>
                                            <!--Nationalit&eacute;-->
                                            <p>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label-for="nationalite">
                                                    <template v-slot:label> Nationalité <span
                                                            class="text-danger">*</span></template>
                                                    <b-form-input id="nationalite" v-model="name" required
                                                        placeholder="nationalite">
                                                    </b-form-input>
                                                </b-form-group>
                                            </p>
                                            <!--Profession-->
                                            <p>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label-for="prof">
                                                    <template v-slot:label> Profession: <span
                                                            class="text-danger">*</span></template>
                                                    <b-form-input id="prof" v-model="name" required
                                                        placeholder="profesion">
                                                    </b-form-input>
                                                </b-form-group>

                                            </p>


                                    </div>


                                </b-form-group>

                                <b-form-group label-class="bg-danger">
                                    <template v-slot:label>
                                        <label for=""
                                            style="color:white;padding-top:7px ; marging:7px ;font-weight: bold; font-size: 18px;">Domicile</label>
                                    </template>

                                    <!-- Personne_Residence_Pays-->
                                    <p>


                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label="Pays(*):" label-for="pays">
                                            <b-form-input id="pays" v-model="name" required placeholder="pays">
                                            </b-form-input>
                                        </b-form-group>
                                    </p>
                                    <!-- Personne_Residence_Departement-->
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

                                            <p>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label="Adresse:" label-for="adresse">
                                                    <b-form-input id="adresse" v-model="name" required
                                                        placeholder="Adresse">
                                                    </b-form-input>
                                                </b-form-group>
                                            </p>

                                </b-form-group>

                                <div align="right">
                                    <!-- <input class="continuer" name="Button1" value="Continuer >>" id="Button1"
                                    type="submit" ><br><br>-->
                                    <router-link to="/fait">
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
        name: 'identite',
        data() {
            return {
                options: [{
                        value: null,
                        text: 'Please select an option'
                    },
                    {
                        value: 'a',
                        text: 'Célibataire'
                    },
                    {
                        value: 'a',
                        text: 'Concubinage'
                    },
                    {
                        value: 'b',
                        text: 'Marié(e)'
                    },
                    {
                        value: 'b',
                        text: 'Pacsé(e)'
                    },
                    {
                        value: 'b',
                        text: 'Divorcé(e)'
                    },
                    {
                        value: 'b',
                        text: 'Veuf(ve)'
                    },
                    {
                        value: {
                            C: '3PO'
                        },
                        text: 'This is an option with object value'
                    },
                    {
                        value: 'd',
                        text: 'This one is disabled',
                        disabled: true
                    }
                ]
            }
        }

    }
</script>
<style scoped src="@/assets/styles/plaintes.css">
    /**/
</style>