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
                                        <slot name="bandeau"></slot>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="globalFil">
                            <ul id="breadcrumbs">
                                <slot name="navListe"></slot>
                            </ul>
                            <div style="float:right;position:relative;top:-42px;">
                                <a href="/exit" title="Annuler ma démarche">
                                    <slot name="imageDeSortie"></slot>
                                </a>
                            </div>
                        </div>

                        <form name="identite" method="post" action="" id="identite">
                            <slot name="entete"></slot>

                            <p>
                                <slot name="infos0"></slot>
                            </p>
                            <p>
                                <slot name="sousQuellePersonneVsDeposerPlainte"></slot>
                            </p>


                            <fieldset>
                                <legend>
                                    <slot name="legend_fieldset"></slot>
                                </legend>

                                <p>
                                    <slot name="vs_etes"></slot>
                                </p>

                               
                                <p>
                                    <slot name="nom_nais"></slot>
                                </p>


                                <p>
                                    <slot name="nom_epoux"></slot>
                                </p>

                                <p>
                                    <slot name="prenom"></slot>
                                  
                                    <p>
                                        <slot name="date_nais"></slot>
                                        <!--mettre un contrôle pour exclure la période si un autre champ est utilisé-->
                                    </p>

                                    <p>
                                        <slot name="lieu_nais"></slot>
                                    </p>

                                    <p>
                                        <slot name="departement"></slot>

                                        <p>
                                            <slot name="code postal"></slot>
                                        </p>


                                        <p>
                                            <slot name="commune"></slot>
                                            <p>
                                                <slot name="situation _familiale"></slot>


                                                <p>
                                                    <slot name="nationalite"></slot>
                                                </p>


                                                <p>
                                                    <slot name="profession"></slot>
                                                </p>
                            </fieldset>

                            <fieldset>
                                <legend>
                                    <slot name="legend2"></slot>
                                </legend>

                                <p>
                                    <slot name="pays2"></slot>
                                </p>

                                <p>
                                    <slot name="departement2"></slot>


                                    <p>
                                        <slot name="codePostal2"></slot>
                                    </p>


                                    <p>
                                        <slot name="commune2"></slot>
                                    </p>
                                    <slot name="adresse2"></slot>
                            </fieldset>

                            <div align="right">
                                <input class="continuer" name="Button1" value="Continuer >>" id="Button1"
                                    type="submit"><br><br>
                            </div>
                        </form>
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

            }
        }

    }
</script>
<style scoped src="@/assets/styles/plaintes.css">

</style>