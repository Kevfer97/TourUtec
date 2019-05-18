<div class="content-header">
	<div class="row">
		<div class="col-sm-12">
			<div class="col-md-12 col-sm-6 col-xs-12">
				<h1>Edificios&nbsp;<span class="ion ion-android-home"></span></h1>
			</div>
			<div class="col-md-12 col-sm-6 col-xs-12">
				<div class="row">
					<?php if ($this->session->flashdata('success_msg')) {
						?>
						<div class="container alert alert-success">
							<div class="col-sm-11">
								<?php echo $this->session->flashdata('success_msg'); ?>
							</div>
							<div class="col-sm-1">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						</div>
					<?php
				} else if ($this->session->flashdata('error_msg')) {
					?>
						<div class="container alert alert-danger">
							<div class="col-sm-11">
								<?php echo $this->session->flashdata('error_msg'); ?>
							</div>
							<div class="col-sm-1">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-success">
				<form method="POST" action="<?php echo base_url('/TourUtec_Admin/Seccion/Buscar') ?>" name="formFil">
					<div class="box-header with-border">
						<h4>Filtros</h4>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-3">
								<label for="txtNombreFil">Nombre:</label>
								<input id="txtNombreFil" name="txtNombreFil" type="text" class="form-control txtNombreFil" placeholder="Nombre">
							</div>
							<div class="col-sm-3">
								<label for="txtAcronimoFil">Acrónimo:</label>
								<input id="txtAcronimoFil" name="txtAcronimoFil" type="text" class="form-control txtAcronimoFil" placeholder="Acrónimo">
							</div>
						</div>
					</div>
					<div class="box-footer with-border">
						<div class="pull-right">
							<a role="button" onclick="javascript:return cleanFields();" href="<?php echo base_url('/TourUtec_Admin/Edificios') ?>" class="btn btn-danger">Limpiar</a>
							<button type="submit" class="btn btn-primary"><span class="ion ion-search"></span>&nbsp;Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header">
					<button id="btnNuevo" class="btn btn-success btnNuevo"><span class="ion ion-plus"></span>&nbsp;Agregar</button>
				</div>
				<div class="box-body">
					<form action="<?php echo base_url('lTourUtec_Admin/Edificios/Borrar'); ?>" method="post">
						<table class="table table-striped table-responsive">
							<thead>
								<tr>
									<th>Código</th>
									<th>Nombre</th>
									<th>Acrónimo</th>
									<th>Modificar</th>
									<th class="text-center">
										<button type="submit" name="btnBorrar" id="btnBorrar" class="btn btn-danger btn-xs btnBorrar" onclick="return confimar('borrar');">Borrar</button>
										<input type="checkbox" name="todo" id="todo" class="checkbox" />
									</th>
								</tr>
							</thead>
							<tbody>
								<!-- <tr>
								<td>Text1</td>
								<td>Text2</td>
								<td>Text3</td>
							</tr>
							<tr>
								<td>Text1</td>
								<td>Text2</td>
								<td>Text3</td>
							</tr>
							<tr>
								<td>Text1</td>
								<td>Text2</td>
								<td>Text3</td>
							</tr>
							<tr>
								<td>Text1</td>
								<td>Text2</td>
								<td>Text3</td>
							</tr>
							<tr>
								<td>Text1</td>
								<td>Text2</td>
								<td>Text3</td>
							</tr> -->
								<?php if (!empty($lstEdificios)) {
									foreach ($lstEdificios as $ed) { ?>
										<tr>
											<td><?php echo $ed->edf_codigo ?></td>
											<td><?php echo $ed->edf_nombre ?></td>
											<td><?php echo $ed->edf_acronimo ?></td>
											<td class="text-center">
												<a href="#" name="btnEditar" id="btnEditar" class="btn btn-info btn-xs" onclick="edit('<?php echo $ed->edf_codigo ?>','<?php echo $ed->edf_nombre ?>','<?php echo $ed->edf_orden ?>','<?php echo $ed->edf_latitud ?>','<?php echo $ed->edf_longitud ?>','<?php echo $ed->edf_acronimo ?>')">Modificar</a>
											</td>
											<td>
												<input type="checkbox" name="chkBorrar[]" class="checkbox" value="<?php echo $ed->edf_codigo; ?>" />
											</td>
										</tr>
									<?php }
							}	?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
		<div class="modal-dialog" role="document">
			<form method="POST" action="<?php echo base_url('/TourUtec_Admin/Edificios/Guardar') ?>">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Datos de la Persona</h4>
						<input type="hidden" id="codedf" name="codedf" class="codedf">
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-6">
									<label for="txtNombre" class="control-label">Nombre</label>
									<input type="text" id="txtNombre" name="txtNombre" class="form-control txtNombre" placeholder="Nombre" required="required">
								</div>
								<div class="col-sm-6">
									<label for="txtAcronimo" class="control-label">Acrónimo</label>
									<input type="text" id="txtAcronimo" name="txtAcronimo" class="form-control txtAcronimo" placeholder="Acrónimo" required="required">
								</div>
								<div class="col-sm-6">
									<label for="txtLatitud" class="control-label">Latitud</label>
									<input type="number" id="txtLatitud" name="txtLatitud" class="form-control txtLatitud" placeholder="Coordenada 1" required="required">
								</div>
								<div class="col-sm-6">
									<label for="txtLongitud" class="control-label">Longitud</label>
									<input type="number" id="txtLongitud" name="txtLongitud" class="form-control txtLongitud" placeholder="Coordenada 2" required="required">
								</div>
								<div class="col-sm-6">
									<label for="txtOrden" class="control-label">Orden</label>
									<input type="number" id="txtOrden" name="txtOrden" class="form-control txtOrden" placeholder="Número Orden" required="required">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function cleanFil() {
		$(".txtNombre").val("");
		$(".txtAcronimo").val("");
	}

	function mostrarModal() {
		$("#modalAdd").modal('show');
	};

	function cleanFields() {
		$('#codedf').val("0");
		$('.txtNombre').val('');
		$('.txtAcronimo').val('');
		$('.txtLatitud').val('0');
		$('.txtLongitud').val('0');
		$('.txtOrden').val('');
	};

	function edit(c, n, o, l, lo, a) {
		$('#codedf').val(c);
		$('.txtNombre').val(n);
		$('.txtAcronimo').val(a);
		$('.txtLatitud').val(l);
		$('.txtLongitud').val(lo);
		$('.txtOrden').val(o);
		mostrarModal();
	};

	function confimar(text) {
		return confirm("¿Esta seguro que desea: " + text + " los registros seleccionados?");
	};

	$(function() {

		$('.btnNuevo').click(function(e) {
			e.preventDefault();
			cleanFields();
			mostrarModal();
		});

		$('#todo').on('click', function() {
			if (this.checked) {
				$('.checkbox').each(function() {
					this.checked = true;
				});
			} else {
				$('.checkbox').each(function() {
					this.checked = false;
				});
			}
		});

		$('.checkbox').on('click', function() {
			if ($('.checkbox:checked').length == $('.checkbox').length) {
				$('#todo').prop('checked', true);
			} else {
				$('#todo').prop('checked', false);
			}
		});

	});
</script>