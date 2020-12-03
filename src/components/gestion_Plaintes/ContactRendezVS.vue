<template>
    <section class="IContent">

        <table border="0" style="width: 750px;margin: 0 auto ;text-align: left ;" cellspacing="0" cellpadding="0">
            <tbody>

                <tr>
                    <td class="content">


                        <form name="contact" method="post" action="" id="contact">
                            <br>
                            <h1>Contact et prise de rendez-vous :</h1>
                            <fieldset>
                                <legend>Coordonnées</legend>
                                <p><i>Veuillez préciser comment nous pouvons vous contacter. <br>Vous devez renseigner
                                        une adresse de messagerie électronique et au moins un numéro de
                                        téléphone.</i><br>
                                </p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <b>Adresse de messagerie électronique(*)</b>
                                            </td>
                                            <td><input type="text" name="email" id="email" value="" size="45"
                                                    autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <b>Confirmez en resaisissant l'adresse(*)</b>
                                            </td>
                                            <td><input type="text" name="emailConfirm" id="emailConfirm" value=""
                                                    size="45" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <b>Vous devez renseigner au moins un numéro de téléphone. (*)</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                N° de téléphone du domicile
                                            </td>
                                            <td><input type="text" name="Domicile" id="Domicile" value="" size="11"
                                                    maxlength="16" autocomplete="off" pattern="\+?[0-9]{5,15}"><span
                                                    class="discreet">(ex :
                                                    0123456789 ou +33123456789)</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                N° de téléphone du bureau
                                            </td>
                                            <td><input type="text" name="Bureau" id="Bureau" value="" size="11"
                                                    maxlength="16" autocomplete="off" pattern="\+?[0-9]{5,15}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                N° de téléphone portable
                                            </td>
                                            <td>
                                                <input type="text" name="Portable" id="Portable" value="" size="11"
                                                    maxlength="16" autocomplete="off" pattern="\+?[0-9]{5,15}"> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <i></i><b>Voulez-vous connaitre les suites judiciaires données à votre pré-plainte ?
                                    (*)</b>
                                <label class="labelsimple">
                                    <input type="radio" value="Oui" class="noborder">oui</label>
                                <label class="labelsimple">
                                    <input type="radio" name="Demande_Suites_Judiciaires"
                                        id="Demande_Suites_Judiciaires-Non" value="Non" class="noborder">non
                                </label>

                                <p></p>
                            </fieldset>



                            <fieldset>
                                <legend>Rendez-vous</legend>
                                <div style="text-align:justify;">

                                    <i>Vous devez signer votre déclaration à la brigade de
                                        gendarmerie ou au service de police que vous avez choisi :<br>
                                        <b>, </b>.<br>
                                        Pour permettre de planifier au mieux votre prise en charge en tenant compte
                                        également des impératifs de service, indiquez dans le champ prévu à cet effet
                                        plusieurs dates et heures qui vous conviennent. Nous vous proposerons un
                                        rendez-vous dans les meilleurs délais.</i></div>
                                <br>
                                <label>Date(s) et heure(s) (*)</label>
                                <textarea name="Choix_Rendez_vous" id="Choix_Rendez_vous" alt="Précision contact"
                                    size="50" autocomplete="off" rows="2" cols="84">
                                   </textarea>
                                <div id="memo_Choix_Rendez_vous" class="memoNb"></div>
                                <i><br><br>Si vous avez communiqué une adresse électronique, un courriel de confirmation
                                    vous sera envoyé.</i>
                            </fieldset>










                            <fieldset>
                                <legend>Contact</legend>
                                <i>Veuillez indiquer à quel moment de la journée vous êtes joignable pour d'éventuelles
                                    précisions.</i><br><br>
                                <label>Créneau horaire</label>
                                <select name="Creneau_contact" id="Creneau_contact">
                                    <option value="-1">...</option>
                                    <option value="08H-12H">08H-12H</option>
                                    <option value="14H-18H">14H-18H</option>
                                </select><br>
                                <label>Commentaires</label>

                                <textarea name="Periode_contact" id="Periode_contact" alt="Informations complementaires"
                                    rows="5" cols="84"></textarea> <br>
                                <div id="memo_Periode_contact" class="memoNb"></div>
                                <br>
                                <div style="text-align:justify;">
                                    <i>Indiquez ici tous les éléments permettant de vous contacter aisément (n° de poste
                                        par exemple) afin qu'en cas de besoin la brigade de gendarmerie ou le service de
                                        police puisse vous joindre.</i><br>
                                </div>
                            </fieldset>



                            <div align="right"><input class="continuer" name="Button1" value="Continuer >>" id="Button1"
                                    type="submit"><br><br></div>
                        </form>
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
        }

    }
</script>
<style scoped src="@/assets/styles/plaintes.css">

</style>