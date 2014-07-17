

<div  class="inside"> 
<div class="asignaciones index">
    <h2><?php echo __('Agentes Oficinas'); ?></h2>


        <div class="menu_datatable">
            <ul>
                <li>
                
               
                <?php echo $this->Html->link(__('Exportar'), array('controller' => 'usuarios', 'action' => 'export_agentes_supervisor_xls'), array('class' => 'exportar_excel')); ?> 

                </li>   
             
                <div class="clear"></div>
            </ul>
    </div>



    <input type="hidden" name="url" id="url" value="<?= Router::url('/', true) ?>">

    <table id="data_table_agentes_supervisor" class="table table-bordered table-striped table_vam">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Perfil</th>
                <th>Oficina</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>


</div>
</div>




