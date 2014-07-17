<?php 
echo $this->Form->input("Usuario.OFI_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $oficinas,
                "label" => "Oficina"
                    )
               );
?>