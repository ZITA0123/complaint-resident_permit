<template>
    <div class="update">
        <h3>Update plainte</h3>
        <section >
            <b-form id="identite" @submit.prevent="handleSubmit(onSubmit)" class="update1">
                <section class="identite" v-if="currentStep==1">
                    <p> Seule la victime, ou son représentant légal le cas échéant,
                        peut
                        établir cette déclaration. </p>
                    <p>


                        <b-form-group label-class="bg-danger">
                            <template v-slot:label>
                                <label
                                    style="color:white ;width:auto; padding-top:7px ; marging:7px; font-size: 18px;">Vous
                                    déposez plainte en qualité de: </label>
                            </template>
                            <b-form-radio-group v-model="plaignants.qualiteDepot" :aria-describedby="ariaDescribedby">
                                <b-form-radio name="Personne_Implication" value="Victime">Victime
                                </b-form-radio><br>
                                <b-form-radio name="Personne_Implication" value="morale">
                                    représentant légal d'une personne morale</b-form-radio><br>
                                <b-form-radio name="Personne_Implication" value="tuteur">
                                    représentant légal d'une personne physique (mineure, sous
                                    tutelle, ...)</b-form-radio>
                            </b-form-radio-group>

                        </b-form-group>

                        <b-form-group label-class="bg-danger">
                            <template v-slot:label>
                                <label for=""
                                    style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">
                                    Etat Civil</label>
                            </template>

                            <div>

                                <b-form-group label-for="sex" align="center">
                                    <template v-slot:label>Vous êtes: <span class="text-danger">*</span></template>
                                    <b-form-radio-group v-model="plaignants.sexe" :aria-describedby="ariaDescribedby">
                                        <b-form-radio inline name="sexe" value="Mr">Mr
                                        </b-form-radio>
                                        <b-form-radio inline name="sexe" value="Mme">
                                            Mme
                                        </b-form-radio>
                                    </b-form-radio-group>

                                </b-form-group>


                            </div>
                            <div>


                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label="Nom de naissance(*):" label-for="name">
                                    <template v-slot:label>
                                        Nom Naissance <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="name" v-model="plaignants.nomNais" placeholder="Enter name">
                                    </b-form-input>
                                </b-form-group>



                            </div>
                            <div>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label="Nom d'époux(se)" label-for="nomEp">
                                    <b-form-input id="nomEp" v-model="plaignants.nomEpoux"
                                        placeholder="Enter nom epoux">
                                    </b-form-input>
                                </b-form-group>

                            </div>
                            <div>


                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="prenom">
                                    <template v-slot:label>
                                        Prenom(s) <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="prenom" v-model="plaignants.prenom" placeholder="prenom">
                                    </b-form-input>
                                </b-form-group>


                            </div>

                            <div>


                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="nais" description="(jj/mm/aaaa)">
                                    <template v-slot:label>
                                        Date de naissance <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="nais" v-model="plaignants.dateNais" placeholder="date nais"
                                        pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/(19|20)[0-9]{2}$"
                                        max="2020-11-17"></b-form-input>
                                </b-form-group>



                            </div>

                            <h4>Lieu de naissance</h4>

                            <div>


                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="dept">
                                    <template v-slot:label>
                                        Département <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="dept" v-model=" lieuNaisPlaignant.departement"
                                        placeholder="departement">
                                    </b-form-input>
                                </b-form-group>


                            </div>
                            <div>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="CP" label="Code postal">

                                    <b-form-input id="CP" v-model=" lieuNaisPlaignant.codePostal"
                                        placeholder="code postal">
                                    </b-form-input>
                                </b-form-group>




                            </div>

                            <div>


                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="commune">
                                    <template v-slot:label>
                                        Commune: <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="" v-model=" lieuNaisPlaignant.commune" placeholder="commune">
                                    </b-form-input>
                                </b-form-group>


                                <p>

                                    <p>


                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="4"
                                            label-align-md="left" label-for="SF">
                                            <template v-slot:label> Situation familiale <span
                                                    class="text-danger">*</span></template>
                                            <b-form-select id="SF" v-model="plaignants.situaFamiliale"
                                                :options="options">
                                            </b-form-select>
                                        </b-form-group>



                                    </p>
                                    <p>


                                        <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="nationalite">
                                            <template v-slot:label> Nationalité <span
                                                    class="text-danger">*</span></template>
                                            <b-form-input id="nationalite" v-model="plaignants.nationalite"
                                                placeholder="nationalite">
                                            </b-form-input>
                                        </b-form-group>


                                    </p>

                                    <p>
                                     <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                            label-align-md="left" label-for="nationalite">
                                            <template v-slot:label>Profession <span
                                                    class="text-danger">*</span></template>
                                            <b-form-input id="profession" v-model="plaignants.profession"
                                                placeholder="profession">
                                            </b-form-input>
                                        </b-form-group>
                                    </p>


                            </div>


                        </b-form-group>

                        <b-form-group label-class="bg-danger">
                            <template v-slot:label>
                                <label for="" style="color:white;padding-top:7px ;
                                                     marging:7px ;font-weight: bold; font-size: 18px;">
                                    Domicile</label>
                            </template>


                            <p>



                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="pays">
                                    <template v-slot:label> Pays <span class="text-danger">*</span></template>
                                    <b-form-input id="pays" v-model="domicilePlaignant.pays" placeholder="pays">
                                    </b-form-input>
                                </b-form-group>


                            </p>

                            <p>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="dept">
                                    <template v-slot:label> Département <span class="text-danger">*</span></template>
                                    <b-form-input id="dept" v-model="domicilePlaignant.departement"
                                        placeholder="departement">
                                    </b-form-input>
                                </b-form-group>


                            </p>
                            <p>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label="Code postal:" label-for="CP">
                                    <b-form-input id="CP" v-model="domicilePlaignant.codePostal"
                                        placeholder="code postal">
                                    </b-form-input>
                                </b-form-group>
                            </p>

                            <p>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="commune">
                                    <template v-slot:label> Commune <span class="text-danger">*</span></template>
                                    <b-form-input id="" v-model="domicilePlaignant.commune" placeholder="commune">
                                    </b-form-input>
                                </b-form-group>




                                <p>

                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                        label-for="adresse">
                                        <template v-slot:label> Adresse <span class="text-danger">*</span></template>
                                        <b-form-input id="adresse" v-model="domicilePlaignant.adresse"
                                            placeholder="Adresse">
                                        </b-form-input>
                                    </b-form-group>


                                </p>

                        </b-form-group>

                        <div align="right">


                            <b-button type="submit" class="float-right" variant="primary" @click="onClickNext">
                                Continuer >></b-button>

                        </div>
                </section>
                <section class="fait1" v-else-if="currentStep==2">

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

                                <b-form-radio-group v-model="faits.typeFait">
                                    <b-form-radio name="Personne_Implication" value="Victime">
                                        Atteinte aux biens
                                    </b-form-radio><br>
                                    <b-form-radio name="Personne_Implication" value="morale">
                                        Fait discriminatoire</b-form-radio>
                                </b-form-radio-group>


                            </b-form-group>

                        </div>
                        <div>
                            <strong>Indiquez ici brièvement le motif de votre
                                plainte</strong>

                            <b-form-group label-for="motif">
                                <b-form-textarea id="motif" v-model="faits.motif" placeholder="Enter something..."
                                    rows="1" max-rows="1" name="Faits_Expose" alt="Motif de la plainte">
                                </b-form-textarea>
                            </b-form-group>


                        </div>
                        <div>

                            <p>
                                <label for=""> <strong>Description:</strong> Indiquez, le plus précisément
                                    possible, de quelle façon
                                    les
                                    faits
                                    se
                                    sont produits</label>

                                <b-form-group label-for="faits">
                                    <template v-slot:label> <b>Décrivez les faits et comment vous en
                                            avez
                                            pris
                                            connaissance.</b> <span class="text-danger">*</span></template>
                                    <b-form-textarea id="faits" v-model="faits.descriptionFait"
                                        placeholder="Enter something..." rows="10" max-rows="15"
                                        alt="Description des faits" name="Faits">
                                    </b-form-textarea>
                                </b-form-group>

                            </p>

                        </div>
                    </b-form-group>


                    <b-form-group label-class="bg-danger">
                        <template v-slot:label>
                            <span style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">
                                2. Le lieu de l'infraction</span>
                        </template>
                        <legend> </legend>
                        <div id="localisation_div">
                            <p>



                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="pays">
                                    <template v-slot:label>
                                        Pays <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="pays" v-model="lieuFaits.pays" placeholder="pays">
                                    </b-form-input>
                                </b-form-group>


                            </p>

                            <p>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="dept">
                                    <template v-slot:label>
                                        Departement <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="dept" v-model="lieuFaits.departement" placeholder="departement">
                                    </b-form-input>
                                </b-form-group>


                            </p>
                            <p>
                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label="Code postal:" label-for="CP">
                                    <b-form-input id="CP" v-model="lieuFaits.codePostal" placeholder="code postal">
                                    </b-form-input>
                                </b-form-group>
                            </p>

                            <p>

                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3" label-align-md="left"
                                    label-for="commune">
                                    <template v-slot:label>
                                        Commune <span class="text-danger">*</span>
                                    </template>
                                    <b-form-input id="" v-model="lieuFaits.commune" placeholder="commune">
                                    </b-form-input>
                                </b-form-group>


                                <p>


                                    <div width="100%">
                                        <br>
                                        <b> Où cela s'est-il passé ?</b> <br><br>
                                        <b-form-group label-for="loc_faits" id="localisation_fait">
                                            <label for=""> <strong>Description detaillée du lieu des
                                                    faits:</strong></label>
                                            <b-form-textarea id="loc_faits" v-model="lieuFaits.lieu"
                                                placeholder="Enter something..." rows="2" max-rows="5"
                                                name="Faits_Expose" alt="Localisation des faits" :disabled="disabled">
                                            </b-form-textarea>

                                            <div id="memo_" class="memoNb">
                                                <br>

                                                <b-form-checkbox id="" v-model="status" name="checkbox-1"
                                                    value="accepted" unchecked-value="not_accepted">
                                                    Je ne sais pas où se sont produits les faits
                                                </b-form-checkbox>

                                            </div>
                                        </b-form-group>

                                    </div>

                        </div>
                    </b-form-group>

                    <div align="right">

                        <b-button class="float-left" variant="secondary" @click="onClickBack"> Back
                        </b-button>


                        <b-button type="submit" class="float-right" variant="primary" @click="onClickNext">
                            Continuer >></b-button>


                    </div>

                </section>

                <section v-else-if="currentStep == 3">
                    <h2>Informations relatives aux faits :</h2>
                    <p>Les champs suivis de (*) sont obligatoires.</p>
                    <p>cliquer sur
                        <b-icon icon="exclamation-triangle-fill" variant="danger"></b-icon>
                        pour des informations complémentaires</p>

                    <b-form-group label-class="bg-danger">
                        <template v-slot:label>
                            <span
                                style="color:white;padding-top:7px ; marging:7px ;font-weight: bold; font-size: 18px;">
                                3. Eléments susceptibles d'orienter l'enquête</span>
                        </template>
                        <br>

                        <br>
                        <div>
                            <b>Avez-vous des éléments pouvant servir à l'identification du ou des
                                auteurs de
                                l'infraction ? (*)</b><br>

                            <b-form-radio-group v-model="Rorientation">
                                <b-form-radio name="orientation" value="oui" id="Faits_Orientation_Aucune-0">
                                    J'ai des éléments susceptibles d'orienter l'enquête. </b-form-radio>
                                <br>
                                <b-form-radio name="orientation" value="non">
                                    Je n'ai pas d'élément susceptible d'orienter l'enquête.
                                </b-form-radio>
                            </b-form-radio-group>


                            <b-form-group label-for="faits_orientaion">
                                <label for="">renseignements susceptibles de faciliter
                                    l’identification
                                    des
                                    auteurs</label>
                                <b-form-textarea id="faits_orientaion" placeholder="Enter something..." rows="5"
                                    max-rows="15" alt=" Eléments susceptibles d'orienter l'enquête " name="Faits"
                                    v-model="plainteOrientation.element" :disabled="disabled2">
                                </b-form-textarea>
                            </b-form-group>




                        </div>



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


                            <b-form-radio-group v-model="Rprejudice">
                                <b-form-radio name="prejudice" value="oui">
                                    J'ai subi un préjudice moral et/ou
                                    matériel.</b-form-radio> <br>
                                <b-form-radio name="prejudice" value="non">
                                    Je n'ai pas subi un préjudice moral et/ou
                                    matériel.</b-form-radio>
                            </b-form-radio-group>
                            <!-- <ValidationProvider name="prejudice" rules="required" v-slot="{ errors }">
                                           
                                        -->


                            <b-form-group label-for="faits_prejudice"
                                label="Dans ce cas, veuillez le décrire ci-dessous.">
                                <b-form-textarea id="faits_prejudice" placeholder="Enter something..." rows="10"
                                    max-rows="15" alt="Description du préjudice autre." name="faits_prejudice"
                                    v-model="plainteOrientation.prejudice" :disabled="disabled3">
                                </b-form-textarea>
                            </b-form-group>

                        </div>
                    </b-form-group>
                    <div align="right">


                        <b-button class="float-left" variant="secondary" @click="onClickBack">Back
                        </b-button>

                        <b-button type="" class="float-right" variant="primary" @click="onClickNext">
                            Continuer >></b-button>

                    </div>
                </section>






                <div align="right">

                    <b-button class="float-left" variant="secondary" @click="onClickBack"> Back
                    </b-button>

                </div>
            </b-form>
        </section>
    </div>

</template>
<script>
    import Axios from 'axios'
    export default {
  data () {
    return {
        currentStep: 1,
                max_step: 4,
                Rprejudice: '',
                Rorientation: '',
                status: 'Naccepted',
                plaignants: {
                    nomNais: '',
                    nomEpoux: '',
                    prenom: '',
                    dateNais: '',
                    nationalite: '',
                    profession: '',
                    situaFamiliale: '',
                    qualiteDepot: '',
                    sexe: ''
                },
                lieuNaisPlaignant: {
                    departement: '',
                    codePostal: '',
                    commune: ''
                },
                domicilePlaignant: {
                    pays: '',
                    departement: '',
                    codePostal: '',
                    commune: '',
                    adresse: ''

                },

                //FAIT PART 1
                faits: {
                    typeFait: '',
                    motif: '',
                    descriptionFait: ''
                },
                lieuFaits: {
                    pays: '',
                    departement: '',
                    codePostal: '',
                    commune: '',
                    lieu: ''
                },

                //FIATS PART 2
                plainteOrientation: {
                    element: '',
                    prejudice: ''
                },


                ///////////////
                options: [
                  /*  {
                        value: null,
                        text: 'Please select an option'
                    },*/
                    {
                        value: 'Célibataire',
                        text: 'Célibataire'
                    },
                    {
                        value: 'Concubinage',
                        text: 'Concubinage'
                    },
                    {
                        value: 'Marié(e)',
                        text: 'Marié(e)'
                    },
                    {
                        value: 'Pacsé(e)',
                        text: 'Pacsé(e)'
                    },
                    {
                        value: 'Divorcé(e)',
                        text: 'Divorcé(e)'
                    },
                    {
                        value: 'Veuf(ve)',
                        text: 'Veuf(ve)'
                    },
                  
                ],
                ariaDescribedby:'',
    }
  },
  methods: {
       onSubmit() {
                if (this.currentStep == 4) {
                    //let user_id = localStorage.getItem('user')
                    let token = localStorage.getItem('token')
                    const config = {
                        headers: {
                            Authorization: 'Bearer ' + token
                        }
                    };
                    
                    let data = {
                        
                        motif:this.faits.motif,
                        EC_sex: this.plaignants.sexe,
                        EC_Nom_Naissance:this.plaignants.nomNais,
                        EC_Nom_epoux:this.plaignants.nomEpoux,
                        EC_Prenom:this.plaignants.prenom,
                        EC_Date_naissance:this.plaignants.dateNais,
                        EC_Département: this.lieuNaisPlaignant.departement,
                        EC_Code_postal:this.lieuNaisPlaignant.codePostal,
                        EC_Commune:this.lieuNaisPlaignant.commune,
                        EC_Situation_familiale: this.plaignants.situaFamiliale,
                        EC_Nationalité:this.plaignants.nationalite,
                        EC_Profession:this.plaignants.profession,

                        D_Pays:this.domicilePlaignant.pays,
                        D_Departement:this.domicilePlaignant.departement,
                        D_CodePostal:this.domicilePlaignant.codePostal,
                        D_Commune:this.domicilePlaignant.commune,
                        D_Adresse:this.domicilePlaignant.adresse,
               
                        Type_Fait:this.faits.typeFait,
                        desc_motif:this.faits.descriptionFait,
                        Inf_Pays:this.lieuFaits.pays,
                        Inf_Departement:this.lieuFaits.departement,
                        Inf_Code_postal:this.lieuFaits.codePostal,
                        Inf_Commune:this.lieuFaits.commune,
                        Desc_lieu:this.lieuFaits.lieu,
                        //lieu_no_mentionned:
                        Eléments_susceptibles:this.plainteOrientation.element,
                        /**enter fichier**/
                        Description_Prejudice:this.plainteOrientation.prejudice

                    }        
                    Axios
                        .post('http://127.0.0.1:8000/api/plainte', data,config)
                        .then(() => {
                            
                            //alert("reussi")
                            this.currentStep=0;
                            this.$router.push('/userSetting')
                        })

                        .catch(error => {
                            console.log(error)
                           
                       }) 
                   
                }
                this.currentStep++;
            },
      //FAIT 1
       change() {
                if (this.status === "accepted") {
                    this.disabled = true
                    console.log(this.disabled);
                    return this.disabled

                } else {
                    return this.disabled = false
                }

            },
  },
  computed:{
      disabled: function () {
                if (this.status == 'accepted') {
                    return true
                }
                return false
            },
            disabled2: function () {
                if (this.Rorientation == 'non') {
                    return true
                }
                return false
            },
            disabled3: function () {
                if (this.Rprejudice == 'non') {
                    return true
                }
                return false
            },

  }

    }
</script>
<style scoped src="@/assets/styles/plaintes.css">

 .card-style {
        width: 90%;
        margin: 0 auto;
    }

</style>