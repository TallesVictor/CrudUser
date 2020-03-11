<?php $__env->startSection('content'); ?>

<div class=" container shadow p-3 mb-5 bg-white rounded">

    <div class="row">
        <div class="col-sm text-center">
            <label class="display-4"> Usuários</label>
        </div>
    </div>

    <div class="row pb-4 ">
        <div class="col-sm">
            <a class="btn btn-outline-success pl-3 pr-3 pt-1 pb-1 float-right" href="<?php echo e(url("Users/create")); ?>">Cadastrar
                &nbsp; <i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <?php echo csrf_field(); ?>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="22%">Email</th>
                            <th width="18%">Telefone</th>
                            <th width="8%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($users->nome); ?></td>
                            <td><?php echo e($users->email); ?></td>
                            <td><?php echo e($users->telefone); ?></td>
                            <td>
                                <a href="<?php echo e(url("Users/$users->id/edit")); ?>"><i class="fas fa-user-edit"
                                        title="Editar"></i></a>

                                <a href="<?php echo e(url("Users/$users->id")); ?>"><i
                                        class="fas fa-trash-alt  float-right text-danger js-del"
                                        title="Deletar"></i></a>&nbsp;&nbsp;
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(url("assets/js/javascript.js")); ?>"></script>


<script>
    $(document).ready(function() {
				$('#example').dataTable({
					"ordering": true,
					lengthMenu: [
						[10, 50, 100, -1],
						[10, 50, 100, "Tudo"]
					],
					language: {
						"sEmptyTable": "Nenhum registro encontrado",
						"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
						"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
						"sInfoFiltered": "(Filtrados de _MAX_ registros)",
						"sInfoPostFix": "",
						"sInfoThousands": ".",
						"sLengthMenu": "Resultados _MENU_ ",
						"sLoadingRecords": "Carregando...",
						"sProcessing": "Processando...",
						"sZeroRecords": "Nenhum registro encontrado",
						"sSearch": "Pesquisar",
						"oPaginate": {
							"sNext": "<i class='fas fa-step-forward'></i>",
							"sPrevious": "<i class='fas fa-step-backward'></i>",
							"sFirst": "Primeiro",
							"sLast": "Último"
						},
						
					}
				});
			});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\php\testeAdapte\resources\views/index.blade.php ENDPATH**/ ?>