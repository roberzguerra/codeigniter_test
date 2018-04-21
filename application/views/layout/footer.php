

<footer class="sticky-footer">
	<div class="container">
		<div class="text-center">
			<small>Codeigniter test 2018</small>
		</div>
	</div>
</footer>

<!-- Modal -->
<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modalRemoverTitle">Remover registro</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<form method="post" class="modal-form" action="">
					<input type="hidden" name="id" class="input-id" value="" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger btn-remover">Sim, remover</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="/static/vendor/jquery/jquery.min.js"></script>
<script src="/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/static/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="/static/js/sb-admin.min.js"></script>

<script type="text/javascript">
	$('#toggleNavPosition').click(function () {
		$('body').toggleClass('fixed-nav');
		$('nav').toggleClass('fixed-top static-top');
	});

	$('#toggleNavColor').click(function () {
		$('nav').toggleClass('navbar-dark navbar-light');
		$('nav').toggleClass('bg-dark bg-light');
		$('body').toggleClass('bg-dark bg-light');
	});

	$(document).ready(function(){

		$('.table .btn-remover').on('click', function() {
			var $btn = $(this);
			var id = $btn.attr('data-id');
			var url = $btn.attr('data-url');

			var $modal = $('#modalRemover');
			var nome = $('.table #table_tr_' + id + ' .table-item-name').text();
			$modal.find('.modal-title').html("Remover registro");
			$modal.find('.modal-body').html("Deseja remover o registro <strong>" + nome +"</strong>?");
			$modal.find('.modal-form').attr('action', url);
			$modal.find('.input-id').val(id);

			$modal.modal('show');
		});


		var $price = $('.input-decimal');
		if ($price.length) {
			$price.mask("###0,00", {
				clearIfNotMatch: true,
				reverse: true,
			});
		}

	})

</script>
