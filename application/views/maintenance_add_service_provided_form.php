<main>
        <div class="container">
            
            <?php if(validation_errors() !== ''):             
                        echo renderMessage(array('type'=> 'error', 'content'=> validation_errors() ));
                   endif
            ?> 
            <div class="title-box">
                <h1>Adicionar Serviço </h1>
            </div>              
            <?php echo form_open_multipart('index.php/serviceprovided/store/'.$maintenance_id , array('class'=>'form-register-upload')); ?>
                <input type="hidden" name='employeesId' value='<?= $this->session->employees_id ?>'> 

                    <div class="form-group">
                        <label for="auto-part" class="form-label">
                            <strong>N° Manutenção:</strong> <?= $maintenance_id ?>
                        </label>
                    </div> 

                    <div class="form-group"> 
                        <label for="auto-part" class="form-label"><strong>Serviço*</strong></label>
                            <select name="serviceId" class="form-select form-select-md mb-3" aria-label="select">                
                                <?php foreach($serviceList as $service): ?>
                                    <option value="<?= $service['id']?>">
                                        <?= $service['name'] ?>
                                    </option>
                                <?php endforeach;  ?>    
                        </select>   
                    </div>  
                    
                    <div class="form-group">                        
                        <label class="form-label" for="quantity"><strong>Quantidade*</strong></label>
                        <input class="form-control" inputmode="numeric" pattern="\d*"  type="number" name='quantity' id="quantity" value='1' min="1" /> 
                    </div>                    
                   
                    <div class="form-footer">
                        <button class="btn  btn-primary" type='submit'>Adicionar</button>                
                        <a class="btn btn-secondary" href="<?= site_url("index.php/maintenance/workon/".$maintenance_id) ?>"> Voltar </a>             
                    </div>            
            </form>                        
        </div>
    </main>


