<!-- Header -->
          
          <div class="header_step">
            <div class="inside">
              
              <div class="step_box">
                
                <ul>
                  <li  <? if($this->request->params["action"]=="residente"){ ?>class="active" <?}?>><div class="box_num">1</div><div class="text">Buscar Residente</div></li>
                  <li <? if($this->request->params["action"]=="asignacion"){ ?>class="active" <?}?>><div class="box_num">2</div><div class="text">Información Vuelo</div></li>
                  <li  <? if($this->request->params["action"]=="autorizacion"){ ?>class="active" <?}?>><div class="box_num">3</div><div class="text">Código Autorización</div></li>
                </ul>
                
                
                
              </div>
              
            </div>
          </div>
          
          <!-- Fin Header -->