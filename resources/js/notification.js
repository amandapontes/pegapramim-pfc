var tempo = window.setInterval(carrega, 1000);
function carrega()
{
$('#new_encomenda').load("encomenda_controller.php");
}