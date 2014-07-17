<h1>Acceso al Sistema<br>Descuentos a Residentes de Galápagos</h1>

<div class="asignaciones form">
    <?php echo $this->Form->create('Usuario', array("class"=>"default_form")); ?>
    
    
        <p>
        <?php echo __('Ingrese los datos entregados por el administrador'); ?>
        </p>
        
        
         <?php

              echo $this->Form->input('USU_EMAIL',array("label" => "Email"), array("class"=>"required email"));
              echo $this->Form->input('USU_PASSWORD',array("label" => "Password", "type" => "Password") , array("class"=>"required"));
            ?>
        
        <div class="actions">
            
            <div class="left">
                <p><a href="#"> ¿Tienes problemas para entrar ?</a></p>
            </div>
            
            <div class="right">
                <?php echo $this->Form->end(__('Entrar')); ?>
            </div>
    
        </div>
    
    
</div>

