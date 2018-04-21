<style type="text/css">

	.textaera-default {
		width: 100%;
		height: 100px;
	}

	.checkbox-default label {
		cursor: pointer;
	}

</style>

<div class="content-wrapper">
	<div class="container-fluid">

		<?php /* MIGRALHAS */ ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Home</a>
			</li>
			<li class="breadcrumb-item active">Categorias</li>
		</ol>
		<?php
		if($category) {
			echo("<h1>Alterar Categoria - {$category->name}</h1>");
		} else {
			echo("<h1>Nova Categoria</h1>");
		}
		?>
		<hr>
	</div>


	<?php
	if (validation_errors()) {
		?>
		<div class="alert alert-danger">
			<?php echo(validation_errors()); ?>
		</div>
		<?php
	} ?>

	<!--<div class="card-header">Register an Account</div>-->

	<div class="card">

		<div class="card-body">

			<?php
			if($category) {
				echo(form_open("categoria/alterar/{$category->id}"));
			} else {
				echo(form_open('categoria/novo'));
			}

			?>
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Nome', 'name')); ?>
						<?php echo(form_input('name', ($category ? $category->name : ''), ['id' => 'name', 'class' => 'form-control'])); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Descrição', 'description')); ?>
						<?php echo(form_textarea('description', ($category ? $category->description : ''), ['id' => 'description', 'class' => 'form-control textaera-default'])); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="checkbox-default">
							<label for="status">
								<?php echo(form_checkbox('status', '1', ($category && $category->status == '1' ? true : false), ['class' => '', 'id' => 'status'])); ?> Ativo
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_submit('Salvar', "Salvar", ['class' => 'btn btn-success'])) ?>
					</div>
				</div>
			</div>


			<?php echo form_close(); ?>

		</div>

	</div>


</div>
