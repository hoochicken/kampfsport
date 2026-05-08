So funktioniert es:

* Gib dein Gewicht und deine Grösse ein
* Gib Gewicht und Grösse deines Partners ein
* Klicke auf "Berechnen"

<table class="table table-striped partner1">
<thead>
  <th></th>
  <th>Partner 1 (du)</th>
  <th>Partner 2 (der andere)</th>
</thead>
<tbody>
  <tr>
    <th>Gewicht (kg)</th>
    <td class=""><input id="partner1Weight" type="number" value="63" /></td>
    <td class=""><input id="partner2Weight" type="number" value="80" /></td>
  </tr>
  <tr>
    <th>Grösse (cm)</th>
    <td class=""><input id="partner1Height" type="number" value="165" /></td>
    <td class=""><input id="partner2Height" type="number" value="185" /></td>
  </tr>
  <tr>
    <th></th>
    <td class=""></td>
    <td class=""><button onclick="calculate()" class="btn btn-primary float-right">Berechnen</button></td>
  </tr>
  <tr>
    <th>BMI</th>
    <td class="partner1 original bmi"></td>
    <td class="partner2 original bmi"></td>
  </tr>
  <tr>
    <th>Gewichts-Quotient</th>
    <td class="partner1 original weight-quotient"></td>
    <td class="partner2 original weight-quotient"></td>
  </tr>
  <tr>
    <th>Grösse-Quotient</th>
    <td class="partner1 original height-quotient"></td>
    <td class="partner2 original height-quotient"></td>
  </tr>
  <tr>
    <th>Imaginärer Partner</th>
    <th class="partner1 reverse">für dich</th>
    <th class="partner2 reverse">für den anderen</th>
  </tr>
  <tr>
    <th>Gewicht (kg)</th>
    <td class="partner1 reverse weight"></td>
    <td class="partner2 reverse weight"></td>
  </tr>
  <tr>
    <th>Grösse (cm)</th>
    <td class="partner1 reverse height"></td>
    <td class="partner2 reverse height"></td>
  </tr>
</tbody>
</table>

<div id="fazit-box" style="display:none;">
<p><strong>Fazit Partner 1</strong><br />Dein Partner wäre <span class="partner1 reverse weight"></span> kg schwer und wäre <span class="partner1 reverse height"></span> m gross, wenn man dieselben körperlichen Verhältnisse annimmt wie zwischen dir und Partner 2.
</p><p>
<strong>Fazit Partner 2</strong><br />Dein Partner wäre <span class="partner2 reverse weight"></span> kg schwer und wäre <span class="partner2 reverse height"></span> m gross, wenn man dieselben körperlichen Verhältnisse annimmt wie zwischen dir und Partner 1.
</p>
</div>

