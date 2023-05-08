<?php

echo '<body style="background-color:#D6EAF8;">';
pazinojums($pazinojums);

echo'
<form method="post" action="" style="text-align: center">
	<p>
		Unikālais kods: <input type="text" name="unique_autorizeties" />
		<br />
		<button name="autorizeties">Autorizēties</button>
	</p>
</form>
</body>
';

?>