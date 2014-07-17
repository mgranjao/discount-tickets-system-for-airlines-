<?php 
echo $this->Form->input("DGAC.PERI_ID", array(
                "type" => "select", // también sirve "radio"
                "options" => $periodos,
                "label" => "Período:"
                    )
               );
?>