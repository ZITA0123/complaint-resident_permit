<template>
    <section class="IContent">
        <div class="card-style">
            <b-progress :value="progress" variant="success"></b-progress>
        </div>
        <table border="0" cellspacing="0" style="margin-bottom: 15px;  margin: 0 auto; padding:20px;">
            <tbody>
                <tr>
                    <td>
                        <!-- <form name="identite" method="post" action="" id="identite">  
                             @submit.prevent="handleSubmit(envoyer)"
                             v-slot="{ handleSubmit,invalid }"-->
                        <ValidationObserver v-slot="{ handleSubmit }">
                            <b-form id="identite" @submit.prevent="handleSubmit(onSubmit)">
                                <section class="identite" v-if="currentStep==1">
                                    <h1>Informations relatives au plaignant</h1>

                                    Les champs suivis de (*) sont obligatoires.
                                    <br><br>
                                    <h2>Informations vous concernant</h2>

                                    <p>
                                        <i>
                                            <font size="2">Seule la victime, ou son représentant légal le cas échéant,
                                                peut
                                                établir cette déclaration.</font>
                                        </i><br>

                                    </p>
                                    <p>

                                        <ValidationProvider name="Filing status" rules="required" v-slot="{ errors }">
                                            <b-form-group label-class="bg-danger">
                                                <template v-slot:label>
                                                    <label
                                                        style="color:white ;width:auto; padding-top:7px ; marging:7px; font-size: 18px;">Vous
                                                        déposez plainte en qualité de: </label>
                                                </template>
                                                <b-form-radio-group v-model="plaignants.qualiteDepot"
                                                    :aria-describedby="ariaDescribedby">
                                                    <b-form-radio name="Personne_Implication" value="Victime">Victime
                                                    </b-form-radio><br>
                                                    <b-form-radio name="Personne_Implication" value="morale">
                                                        représentant légal d'une personne morale</b-form-radio><br>
                                                    <b-form-radio name="Personne_Implication" value="tuteur">
                                                        représentant légal d'une personne physique (mineure, sous
                                                        tutelle, ...)</b-form-radio>
                                                </b-form-radio-group>

                                            </b-form-group>
                                            <span class="validate">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                       

                                        <b-form-group label-class="bg-danger">
                                            <template v-slot:label>
                                                <label for=""
                                                    style="color:white;padding-top:7px ; marging:7px ;font-weight:bold; font-size: 18px;">
                                                    Etat Civil</label>
                                            </template>

                                            <div>
                                                <ValidationProvider name="Gender" rules="required" v-slot="{ errors }">
                                                    <b-form-group  label-for="sex" align="center">
                                                        <template v-slot:label>Vous êtes: <span
                                                                class="text-danger">*</span></template>
                                                        <b-form-radio-group v-model="plaignants.sexe"
                                                            :aria-describedby="ariaDescribedby">
                                                            <b-form-radio inline name="sexe" value="Mr">Mr
                                                            </b-form-radio>
                                                            <b-form-radio inline name="sexe" value="Mme">
                                                                Mme
                                                            </b-form-radio>
                                                        </b-form-radio-group>
                                                        <span class="validate">{{ errors[0] }}</span>
                                                    </b-form-group>

                                                </ValidationProvider>
                                            </div>
                                            <div>

                                                <ValidationProvider name="Last Name" rules="required|alpha"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label="Nom de naissance(*):"
                                                        label-for="name">
                                                        <template v-slot:label>
                                                            Nom Naissance <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="name" v-model="plaignants.nomNais"
                                                            placeholder="Enter name">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>

                                            </div>
                                            <div>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label="Nom d'époux(se)" label-for="nomEp">
                                                    <b-form-input id="nomEp" v-model="plaignants.nomEpoux"
                                                        placeholder="Enter nom epoux">
                                                    </b-form-input>
                                                </b-form-group>

                                            </div>
                                            <div>

                                                <ValidationProvider name="FirstName" rules="required|alpha"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="prenom">
                                                        <template v-slot:label>
                                                            Prenom(s) <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="prenom" v-model="plaignants.prenom"
                                                            placeholder="prenom">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>

                                            <div>

                                                <ValidationProvider name="Date Naissance" rules="date"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="nais"
                                                        description="(jj/mm/aaaa)">
                                                        <template v-slot:label>
                                                            Date de naissance <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="nais" v-model="plaignants.dateNais"
                                                            placeholder="date nais"
                                                            pattern="^(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/(19|20)[0-9]{2}$"
                                                            max="2020-11-17"></b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>

                                            </div>

                                            <h4>Lieu de naissance</h4>

                                            <div>

                                                <ValidationProvider name="Department" rules="required"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="dept">
                                                        <template v-slot:label>
                                                            Département <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="dept" v-model=" lieuNaisPlaignant.departement"
                                                            placeholder="departement">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </div>
                                            <div>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label-for="CP" label="Code postal">

                                                    <b-form-input id="CP" v-model=" lieuNaisPlaignant.codePostal"
                                                        placeholder="code postal">
                                                    </b-form-input>
                                                </b-form-group>




                                            </div>

                                            <div>

                                                <ValidationProvider name="Commune" rules="required"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="commune">
                                                        <template v-slot:label>
                                                            Commune: <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="" v-model=" lieuNaisPlaignant.commune"
                                                            placeholder="commune">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                                <p>

                                                    <p>

                                                        <ValidationProvider name="family situation" rules="required"
                                                            v-slot="{ errors }">
                                                            <b-form-group class="FG" label-cols-sm="4" label-cols-md="4"
                                                                label-align-md="left" label-for="SF">
                                                                <template v-slot:label> Situation familiale <span
                                                                        class="text-danger">*</span></template>
                                                                <b-form-select id="SF"
                                                                    v-model="plaignants.situaFamiliale"
                                                                    :options="options">
                                                                </b-form-select>
                                                            </b-form-group>
                                                            <span class="validate">{{ errors[0] }}</span>
                                                        </ValidationProvider>

                                                    </p>
                                                    <p>

                                                        <ValidationProvider name="Nationality" rules="required"
                                                            v-slot="{ errors }">
                                                            <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                                label-align-md="left" label-for="nationalite">
                                                                <template v-slot:label> Nationalité <span
                                                                        class="text-danger">*</span></template>
                                                                <b-form-input id="nationalite"
                                                                    v-model="plaignants.nationalite"
                                                                    placeholder="nationalite">
                                                                </b-form-input>
                                                            </b-form-group>
                                                            <span class="validate">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </p>
                                                    <!--Profession-->
                                                    <p>

                                                       <ValidationProvider name="Profession" rules="required"
                                                            v-slot="{ errors }">
                                                            <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                                label-align-md="left" label-for="nationalite">
                                                                <template v-slot:label>Profession <span
                                                                        class="text-danger">*</span></template>
                                                                <b-form-input id="profession"
                                                                    v-model="plaignants.profession"
                                                                    placeholder="profession">
                                                                </b-form-input>
                                                            </b-form-group>
                                                            <span class="validate">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                        

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


                                                <ValidationProvider name="Country" rules="required" v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="pays">
                                                        <template v-slot:label> Pays <span
                                                                class="text-danger">*</span></template>
                                                        <b-form-input id="pays" v-model="domicilePlaignant.pays"
                                                            placeholder="pays">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </p>

                                            <p>
                                                <ValidationProvider name="Department" rules="required"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="dept">
                                                        <template v-slot:label> Département <span
                                                                class="text-danger">*</span></template>
                                                        <b-form-input id="dept" v-model="domicilePlaignant.departement"
                                                            placeholder="departement">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </p>
                                            <p>

                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label="Code postal:" label-for="CP">
                                                    <b-form-input id="CP" v-model="domicilePlaignant.codePostal"
                                                        placeholder="code postal">
                                                    </b-form-input>
                                                </b-form-group>
                                            </p>

                                            <p>
                                                <ValidationProvider name="CP" rules="required" v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="commune">
                                                        <template v-slot:label> Commune <span
                                                                class="text-danger">*</span></template>
                                                        <b-form-input id="" v-model="domicilePlaignant.commune"
                                                            placeholder="commune">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                                <p>

                                                    <p>
                                                        <ValidationProvider name="Address" rules="required"
                                                            v-slot="{ errors }">
                                                            <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                                label-align-md="left" label-for="adresse">
                                                                <template v-slot:label> Adresse <span
                                                                        class="text-danger">*</span></template>
                                                                <b-form-input id="adresse"
                                                                    v-model="domicilePlaignant.adresse"
                                                                    placeholder="Adresse">
                                                                </b-form-input>
                                                            </b-form-group>
                                                            <span class="validate">{{ errors[0] }}</span>
                                                        </ValidationProvider>
                                                    </p>

                                        </b-form-group>

                                        <div align="right">


                                            <b-button type="submit" class="float-right" variant="primary"
                                                @click="onClickNext">
                                                Continuer >></b-button>

                                        </div>
                                </section>











                                <!--GESTION DES FAIT PART 1 v-if="current_step==2"-->

                                <section class="fait1" v-else-if="currentStep==2">
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
                                                <ValidationProvider name="facts" rules="required" v-slot="{ errors }">
                                                    <b-form-radio-group v-model="faits.typeFait">
                                                        <b-form-radio name="Personne_Implication" value="Victime">
                                                            Atteinte aux biens
                                                        </b-form-radio><br>
                                                        <b-form-radio name="Personne_Implication" value="morale">
                                                            Fait discriminatoire</b-form-radio>
                                                    </b-form-radio-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </b-form-group>

                                        </div>
                                        <div>

                                            <div>
                                                <font size="2" id="txtExpl_1">
                                                    <Strong>Motif:</Strong> Indiquez ici brièvement le motif de votre
                                                    plainte
                                                    (actes de discrimination, provocation
                                                    à la discrimination ou à la haine, injure ou diffamation
                                                    à caractère discriminatoire...). Une définition des infractions
                                                    les plus courantes et des exemples sont disponibles dans la rubrique
                                                    d'aide.</font>
                                            </div>

                                            <ValidationProvider name="reason for complaint" rules="required|alpha"
                                                v-slot="{ errors }">
                                                <b-form-group label-for="motif">
                                                    <b-form-textarea id="motif" v-model="faits.motif"
                                                        placeholder="Enter something..." rows="1" max-rows="1"
                                                        name="Faits_Expose" alt="Motif de la plainte">
                                                    </b-form-textarea>
                                                </b-form-group>
                                                <span class="validate">{{ errors[0] }}</span>
                                            </ValidationProvider>
                                        </div>
                                        <div>

                                            <p>
                                                <font size="2">
                                                    <strong>Description:</strong> Indiquez, le plus précisément
                                                    possible, de quelle façon
                                                    les
                                                    faits
                                                    se
                                                    sont produits ou comment vous pensez qu'ils se sont produits.
                                                    Indiquez
                                                    également
                                                    si vous avez subi des menaces au moment où ces faits se sont
                                                    produits.
                                                    Précisez
                                                    lesquelles.</font>
                                            </p>
                                            <ValidationProvider name="description" rules="required" v-slot="{ errors }">
                                                <b-form-group label-for="faits">
                                                    <template v-slot:label> <b>Décrivez les faits et comment vous en
                                                            avez
                                                            pris
                                                            connaissance.</b> <span
                                                            class="text-danger">*</span></template>
                                                    <b-form-textarea id="faits" v-model="faits.descriptionFait"
                                                        placeholder="Enter something..." rows="10" max-rows="15"
                                                        alt="Description des faits" name="Faits">
                                                    </b-form-textarea>
                                                </b-form-group>
                                                <span class="validate">{{ errors[0] }}</span>
                                            </ValidationProvider>

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
                                                <ValidationProvider name="country" rules="required" v-slot="{ errors }">


                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="pays">
                                                        <template v-slot:label>
                                                            Pays <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="pays" v-model="lieuFaits.pays"
                                                            placeholder="pays">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </p>

                                            <p>
                                                <ValidationProvider name="department" rules="required"
                                                    v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="dept">
                                                        <template v-slot:label>
                                                            Departement <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="dept" v-model="lieuFaits.departement"
                                                            placeholder="departement">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                            </p>
                                            <p>
                                                <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                    label-align-md="left" label="Code postal:" label-for="CP">
                                                    <b-form-input id="CP" v-model="lieuFaits.codePostal"
                                                        placeholder="code postal">
                                                    </b-form-input>
                                                </b-form-group>
                                            </p>

                                            <p>
                                                <ValidationProvider name="town" rules="required" v-slot="{ errors }">
                                                    <b-form-group class="FG" label-cols-sm="4" label-cols-md="3"
                                                        label-align-md="left" label-for="commune">
                                                        <template v-slot:label>
                                                            Commune <span class="text-danger">*</span>
                                                        </template>
                                                        <b-form-input id="" v-model="lieuFaits.commune"
                                                            placeholder="commune">
                                                        </b-form-input>
                                                    </b-form-group>
                                                    <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>
                                                <p>


                                                    <div width="100%">
                                                        <br>
                                                        <b> Où cela s'est-il passé ?</b> <br><br>
                                                        <b-form-group label-for="loc_faits" id="localisation_fait">
                                                            <template v-slot:label>
                                                                <i id="lieuInfra">
                                                                    <font size="2">
                                                                        <strong>Description detaillée du lieu des
                                                                            faits:</strong> Mentionner le lieu où les
                                                                        faits se
                                                                        sont
                                                                        produits […],
                                                                        voie publique, affichage dans un lieu public
                                                                        (préciser
                                                                        le lieu et le
                                                                        mode d’affichage), internet (préciser: réseau
                                                                        social,
                                                                        page
                                                                        privée ou accessible à tous
                                                                        (facebook,twitter,blog
                                                                        …) et
                                                                        copier le
                                                                        lien URL précis vers la publication.</font>
                                                                </i>
                                                                <span class="text-danger">*</span>
                                                            </template>
                                                            <b-form-textarea id="loc_faits" v-model="lieuFaits.lieu"
                                                                placeholder="Enter something..." rows="2" max-rows="5"
                                                                name="Faits_Expose" alt="Localisation des faits"
                                                                :disabled="disabled">
                                                            </b-form-textarea>

                                                            <div id="memo_" class="memoNb">
                                                                <br>

                                                                <b-form-checkbox id="" v-model="status"
                                                                    name="checkbox-1" value="accepted"
                                                                    unchecked-value="not_accepted">
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


                                        <b-button type="submit" class="float-right" variant="primary"
                                            @click="onClickNext">
                                            Continuer >></b-button>


                                    </div>

                                </section>





















                                <!--GESTION DES FAIT PART 2 v-if="current_step==3"-->

                                <section v-else-if="currentStep == 3">
                                    <h2>Informations relatives aux faits :</h2>
                                    <p>Les champs suivis de (*) sont obligatoires.</p>
                                    <p>cliquer sur
                                        <b-icon  icon="exclamation-triangle-fill" variant="danger"></b-icon>
                                         pour des informations complémentaires</p>
                                   
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
                                                    variant="danger" class="h3 mb-2"></b-icon> Les
                                                informations que vous nous communiquez ne peuvent servir de
                                                support à la désignation nominative de l'auteur présumé des faits. Si
                                                vous
                                                connaissez son identité,
                                                vous devez vous rendre directement dans une unité de gendarmerie ou un
                                                service
                                                de
                                                police. <br>
                                            </p>

                                        </div>
                                        <br>
                                        <div>
                                            <b>Avez-vous des éléments pouvant servir à l'identification du ou des
                                                auteurs de
                                                l'infraction ? (*)</b><br>

                                            <b-form-radio-group v-model="Rorientation">
                                                <b-form-radio name="orientation" value="oui"
                                                    id="Faits_Orientation_Aucune-0">
                                                    J'ai des éléments susceptibles d'orienter l'enquête. </b-form-radio>
                                                <br>
                                                <b-form-radio name="orientation" value="non">
                                                    Je n'ai pas d'élément susceptible d'orienter l'enquête.
                                                </b-form-radio>
                                            </b-form-radio-group>

                                            <!-- <ValidationProvider name="elements" rules="required" v-slot="{ errors }">
                                             <span class="validate">{{ errors[0] }}</span>
                                                </ValidationProvider>-->

                                            <b-form-group label-for="faits_orientaion">
                                                <template v-slot:label>
                                                    <p>Indiquez ici tous les renseignements susceptibles de faciliter
                                                        l’identification
                                                        des
                                                        auteurs: description, vêtements, faits similaires connus,
                                                        éléments
                                                        de
                                                        localisation, présence de caméra, pseudo utilisé, lien URL vers
                                                        une
                                                        publication
                                                        haineuse. Nous vous invitons par ailleurs à conserver les
                                                        éléments
                                                        de preuve
                                                        (support papier, SMS, capture d’écran, courriel, photo ou
                                                        vidéo…).
                                                        En cas de
                                                        présence de témoins, faites part de leurs coordonnées."</p>
                                                </template>
                                                <b-form-textarea id="faits_orientaion" placeholder="Enter something..."
                                                    rows="5" max-rows="15"
                                                    alt=" Eléments susceptibles d'orienter l'enquête " name="Faits"
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
                                            <span class="validate">{{ errors[0] }}</span>
                                        </ValidationProvider>-->


                                            <b-form-group label-for="faits_prejudice"
                                                label="Dans ce cas, veuillez le décrire ci-dessous.">
                                                <b-form-textarea id="faits_prejudice" placeholder="Enter something..."
                                                    rows="10" max-rows="15" alt="Description du préjudice autre."
                                                    name="faits_prejudice" v-model="plainteOrientation.prejudice"
                                                    :disabled="disabled3">
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





                                <!--CONFIRMATION v-if="current_step==4"-->
                                <section id="confirmPlainte" v-if="currentStep==4">
                                    <div class="confirm">
                                        <h3>Confirmer les informations mentionnées</h3>
                                    </div>



                                    <h1 class="caption">Informations du plaignant</h1>

                                    <dl>
                                        <dt>Vous deposez plainte en qualite de: </dt>
                                        <dd>{{plaignants.qualiteDepot}} </dd>

                                        <dt>Sexe: </dt>
                                        <dd>{{plaignants.sexe}} </dd>

                                        <dt> Nom Naissance: </dt>
                                        <dd>{{plaignants.nomNais}}</dd>

                                        <dt>Nom d'epoux(se): </dt>
                                        <dd>{{plaignants.nomEpoux}} </dd>

                                        <dt>Prenom: </dt>
                                        <dd>{{plaignants.prenom}} </dd>


                                        <dt>Date de Naissance: </dt>
                                        <dd>{{plaignants.dateNais}} </dd>
                                        <dt>Nationalite: </dt>
                                        <dd>{{plaignants.nationalite}} </dd>
                                        <dt>Profession: </dt>
                                        <dd>{{plaignants.profession}}</dd>
                                        <dt>Situation Familiale: </dt>
                                        <dd>{{plaignants.situaFamiliale}} </dd>

                                        <hr>

                                        <h4>Lieu de Naissance</h4>
                                        <dt>Departement: </dt>
                                        <dd>{{ lieuNaisPlaignant.departement}} </dd>
                                        <dt>Code Postal: </dt>
                                        <dd>{{ lieuNaisPlaignant.codePostal}} </dd>

                                        <dt>Commune: </dt>
                                        <dd>{{ lieuNaisPlaignant.commune}} </dd>
                                        <hr>

                                        <h4>Votre domicile actuel</h4>
                                        <dt>Pays: </dt>
                                        <dd>{{ domicilePlaignant.pays}} </dd>
                                        <dt>Departement: </dt>
                                        <dd>{{ domicilePlaignant.departement}} </dd>
                                        <dt>Code Postal: </dt>
                                        <dd>{{ domicilePlaignant.codePostal}} </dd>
                                        <dt>Commune: </dt>
                                        <dd>{{ domicilePlaignant.commune}} </dd>
                                        <dt>Adresse: </dt>
                                        <dd>{{ domicilePlaignant.adresse}} </dd>

                                    </dl>



                                    <h1 class="caption">Description des prejudices et faits</h1>
                                    <dl>
                                        <h4>Description des faits</h4>
                                        <dt>Prejudices subit: </dt>
                                        <dd>{{faits.typeFait}} </dd>
                                        <dt>Motif de votre plainte: </dt>
                                        <dd>{{faits.motif}} </dd>
                                        <dt>Description des faits: </dt>
                                        <dd>{{faits.descriptionFait}} </dd>
                                        <hr>
                                        <h4>Lieu des Faits</h4>
                                        <dt>Pays: </dt>
                                        <dd>{{ lieuFaits.pays}} </dd>
                                        <dt>Departement: </dt>
                                        <dd>{{ lieuFaits.departement}} </dd>
                                        <dt>Code Postal: </dt>
                                        <dd>{{ lieuFaits.codePostal}} </dd>
                                        <dt>Commune: </dt>
                                        <dd>{{ lieuFaits.commune}} </dd>
                                        <dt>Adresse: </dt>
                                        <dd>{{ lieuFaits.lieu}} </dd>
                                        <hr>

                                        <h4>Element susceptible d'orienter l'enquete</h4>
                                        <dt>Elements en votre disposition: </dt>
                                        <dd>{{plainteOrientation.element}} </dd>
                                        <dt>Description du prejudice: </dt>
                                        <dd>{{plainteOrientation.prejudice}} </dd>
                                    </dl>





                                   <!-- <b-button class="float-left" variant="secondary" @click="onClickBack"> Modifier
                                    </b-button>-->
                                    <b-button type="submit" class="float-right" variant="primary">
                                        Confirmer</b-button>

                                </section>

                                <div align="right">
                                   
                                    <b-button class="float-left" variant="secondary" @click="onClickBack"> Back
                                    </b-button>
                                   <!-- <b-button type="submit" variant="primary">Next >>></b-button>-->
                                </div>
                            </b-form>
                        </ValidationObserver>
                    </td>
                </tr>
            </tbody>
        </table>
        <div >


            <modal  :adaptative="true" :shiftX=0.8 :width="800" height="auto" 
            :scrollable="true" name="my_message">
                <h1 style="color:#ed3f4e; text-align:center">Informations liées aux plaintes</h1>
                <hr>
                <div >
                    <p  style="font-size:18px; padding-left:10px">
                        La mise en cause mensongère d'une personne,
                        dans le but de lui nuire, est susceptible
                        d'entraîner des poursuites pour dénonciation calomnieuse.</p>
                       <p style="font-size:18px; padding-left:10px"> Article 226-10 du code pénal :
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
                        d'emprisonnement et de 45000 euros d'amende.</p>
                        <p style="font-size:18px; padding-left:10px">La fausseté du fait dénoncé résulte nécessairement de la décision,
                        devenue définitive,
                        d'acquittement, de relaxe ou de non-lieu déclarant que la réalité du
                        fait n'est pas établie
                        ou que celui-ci n'est pas imputable à la personne dénoncée.
                        En tout autre cas, le tribunal saisi des poursuites contre le
                        dénonciateur apprécie la
                        pertinence des accusations portées par celui-ci.»</p>
                </div>
            </modal>


        </div>

    </section>
</template>
<script>
   
    import Axios from 'axios'

    export default {
        created() {

        },
        name: 'identite',
        computed: {
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


            progress: function () {
                return Math.round(100 / this.max_step) * this.currentStep;
            }
            /*...mapFields(
             { userFirstName: 'user.firstName',
              userLastName: 'user.lastName',
              // It's also possible to access
              // nested properties in arrays.
             // 'addresses[0].town',
             }
            ),*/
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

            onClickNext: function () {
                this.currentStep++;
            },
            onClickBack: function () {
                this.currentStep--;
            },
            onClickFirst: function () {
                this.currentStep = 1;
            },
            //FOR FAIT PART 1
            change() {
                if (this.status === "accepted") {
                    this.disabled = true
                    console.log(this.disabled);
                    return this.disabled

                } else {
                    return this.disabled = false
                }

            },
            //FOR FAIT PART 2
            openModal() {
                this.$modal.show('my_message');
            }
        },
        data() {
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
                   /* {
                        value: {
                            C: '3PO'
                        },
                        text: 'This is an option with object value'
                    },*/
                   /* {
                        value: 'd',
                        text: 'This one is disabled',
                        disabled: true
                    }*/
                ],
                ariaDescribedby:'',
                
            }
        }

    }
</script>
<style scoped src="@/assets/styles/plaintes.css">
    
    .card-style {
        width: 90%;
        margin: 0 auto;
    }


    /**/
</style>