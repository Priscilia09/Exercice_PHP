<html>
<head>
     <meta charset="utf-8" />
	 <title>Mois</title>
</head>

<body>



	</form>
		<?php 
		
		
			if (isset($_POST['Francais']))
			{
				echo '<html> <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Mois</th>
      <th scope="col">Num</th>
      <th scope="col">Mois</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Janvier</td>
      <td>7</td>
      <td>Juillet</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Fevrier</td>
      <td>8</td>
      <td>Aout</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mars</td>
      <td>9</td>
      <td>Septembre</td>
    </tr>
  </tbody>
</table>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Mois</th>
      <th scope="col">Num</th>
      <th scope="col">Mois</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">4</th>
      <td>Avril</td>
      <td>10</td>
      <td>Octobre</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Mai</td>
      <td>11</td>
      <td>Novembre</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Juin</td>
      <td>12</td>
      <td>Decembre</td>
    </tr>
  </tbody>
</table>
</html>
' ;
			}
			
			
			
			else if (isset($_POST['Anglais']))
			{
				echo '<html>
				<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Month</th>
      <th scope="col">Num</th>
      <th scope="col">Month</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>January</td>
      <td>7</td>
      <td>July</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>February</td>
      <td>8</td>
      <td>August</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>March</td>
      <td>9</td>
      <td>September</td>
    </tr>
  </tbody>
</table>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Month</th>
      <th scope="col">Num</th>
      <th scope="col">Month</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">4</th>
      <td>April</td>
      <td>10</td>
      <td>October</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>May</td>
      <td>11</td>
      <td>November</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>June</td>
      <td>12</td>
      <td>December</td>
    </tr>
  </tbody>
</table>
				</html>';
			}
			
		
		?>
		
	</form>
	</body>
</html>