	<script type="text/javascript">
		$(document).ready(function(){
			
			$(".menu-tema").click(function(){
				$.post("<?php echo site_url('ajax/ajax_cambiartema') ?>",
				{
					tema:$(this).attr('id')
				}
				,
				function(datos,status)
				{
					$("#tema").attr('href',datos);
				});
			});

			$(".btn-solve").click(function(){
				$.post("<?php echo site_url('ajax/ajax_resolver') ?>",
				{
					item:$(this).attr('id')
				}
				,
				function(datos,status)
				{	
					var hola = "<strong>Hola</strong>";
					alert(datos.lista_bugs);

					$("#lista_bugs").html(datos.lista_bugs);
					$("#lista_mejoras").html(datos.lista_mejoras);
					$("#lista_optimizaciones").html(datos.lista_optimizaciones);
				}
				,
				{
				dataType:'html'
				}
				);
			});
			
		});
	</script>
	</body>
</html>