<table id="desc_patient">
    <tr>
        <td colspan="2">
            <label for="name">Nom :</label>
            <input id="name" name="nom" type="text">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <label for="age">Age :</label>
            <input id="age" name="age" type="number" min="0">
        </td>            
    </tr>
    <tr>
        <td>
            <input class="sexe" id="homme" name="sexe" type="radio" value="homme">
            <label for="masc">Homme</label>
        </td>
        <td>
            <input class="sexe" id="femme" name="sexe" type="radio" value="femme">
            <label for="fem">Femme</label>
        </td>
    </tr>
    <tr>
        <td id="tab_imbrique" colspan="2">
            <table id="tab_sympt">
                <thead>
                    <tr>
                        <th colspan="2">Symptômes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input class="symptomes" id="S1" name="symptomes" type="checkbox" value="S1">
                            <label for="S1">S1</label>
                        </td>
                        <td>
                            <input class="symptomes" id="S2" name="symptomes" type="checkbox" value="S2">
                            <label for="S2">S2</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="symptomes" id="S3" name="symptomes" type="checkbox" value="S3">
                            <label for="S3">S3</label>
                        </td>
                        <td>
                            <input class="symptomes" id="S4" name="symptomes" type="checkbox" value="S4">
                            <label for="S4">S4</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="symptomes" id="S5" name="symptomes" type="checkbox" value="S5">
                            <label for="S5">S5</label>
                        </td>
                        <td>
                            <input class="symptomes" id="S6" name="symptomes" type="checkbox" value="S6">
                            <label for="S6">S6</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <input class="unite" id="UA" name="unite" type="radio" value="UA">
            <label for="UA">UA</label>
        </td>
        <td>
            <input class="unite" id="UR" name="unite" type="radio" value="UR">
            <label for="UR">UR</label>
        </td>
    </tr>
    <tr>
        <td>
            <input class="unite" id="CUMP" name="unite" type="radio" value="CUMP">
            <label for="CUMP">CUMP</label>
        </td>
        <td>
            <input class="unite" id="morgue" name="unite" type="radio" value="morgue">
            <label for="morgue">Morgue</label>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <input class="btn-formulaires" id="btn-valider" type="submit" value="Valider">
        </td>
    </tr>
</table>