<style type="text/css">

	.textaera-default {
		width: 100%;
		height: 100px;
	}

</style>

<div class="content-wrapper">
	<div class="container-fluid">

		<?php /* MIGRALHAS */ ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Home</a>
			</li>
			<li class="breadcrumb-item active">Produtos</li>
		</ol>
		<?php
		if($product) {
			echo("<h1>Alterar Produto - {$product->name}</h1>");
		} else {
			echo("<h1>Novo Produto</h1>");
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
			if($product) {
				echo(form_open("produto/alterar/{$product->id}"));
			} else {
				echo(form_open('produto/novo'));
			}

			?>
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Nome', 'name')); ?>
						<?php echo(form_input('name', ($product ? $product->name : ''), ['id' => 'name', 'class' => 'form-control'])); ?>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Preço', 'price')); ?>
						<?php echo(form_input('price', ($product ? $product->get_price() : ''), ['id' => 'price', 'class' => 'form-control input-decimal'])); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Categoria', 'category')); ?>
						<?php echo(form_dropdown('category', $list_category_select, ($product ? $product->category_id : ''), ['id' => 'category', 'class' => 'form-control'])); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<?php echo(form_label('Descrição', 'description')); ?>
						<?php echo(form_textarea('description', ($product ? $product->description : ''), ['id' => 'description', 'class' => 'form-control textaera-default'])); ?>
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
