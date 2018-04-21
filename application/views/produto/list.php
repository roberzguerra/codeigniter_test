<div class="content-wrapper">
	<div class="container-fluid">

		<?php /* MIGRALHAS */ ?>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Home</a>
			</li>
			<li class="breadcrumb-item active">Produtos</li>
		</ol>
		<h1>Produtos</h1>
		<hr>
		<a class="btn btn-primary" href="/<?php echo($this->router->routes['produto_new']) ?>">Novo Produto</a>
		<hr>
	</div>

	<?php
	if ($message_success) {
		?>
		<div class="alert alert-success">
			Produto salvo com sucesso.
		</div>
		<?php
	}
	?>
	<?php
	if ($message_delete) {
		?>
		<div class="alert alert-success">
			Produto removido com sucesso.
		</div>
		<?php
	}
	?>
	<?php
	if ($message_update) {
		?>
		<div class="alert alert-success">
			Produto alterado com sucesso.
		</div>
		<?php
	}
	?>

	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th>Ações</th>
				<th>ID</th>
				<th>Nome</th>
				<th>Preço R$</th>
				<th>Criado em</th>
				<th>Alterado em</th>
				<th>Descrição</th>
				<th>Categoria</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if ($list_all && count($list_all) > 0) {

				foreach ($list_all as $item) {
					?>
					<tr id="table_tr_<?php echo($item->id); ?>">
						<td>
							<button class="btn btn-danger btn-remover" data-id="<?php echo($item->id); ?>"
									data-url="/<?php echo($this->router->routes['produto_delete']); ?>">Remover
							</button>
						</td>
						<td><?php echo($item->id); ?></td>
						<td class="table-item-name">
							<a href="/<?php echo("{$this->router->routes['produto_edit']}/{$item->id}"); ?>">
								<?php echo($item->name); ?>
							</a>
						</td>
						<td><?php echo($item->get_price()); ?></td>
						<td><?php echo($item->get_created_at()); ?></td>
						<td><?php echo($item->get_updated_at()); ?></td>
						<td><?php echo($item->description); ?></td>
						<td><?php echo($item->category_name); ?></td>
					</tr>
					<?php
				}
			} else {
				?>
				<tr>
					<td colspan="10">Nenhum registro encontrado.</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>

	</div>

</div>
