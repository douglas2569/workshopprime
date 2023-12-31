<?php if($this->session-> permissions['users']['update'] == 0): ?>
      <?php 
        redirect('/');
        exit;      
      ?>
      
<?php endif ?>  

<main>
        <div class="container">
            
            <?php if(validation_errors() !== ''):             
                        echo renderMessage(array('type'=> 'error', 'content'=> validation_errors() ));
                   endif
            ?> 
            <div class="title-box">
                <h1>Cadastrar de Usuário</h1>
            </div>              
            <?php echo form_open('index.php/user/store' , array('class'=>'form-register-upload')); ?> 
            
                <div class="form-group"> 
                    <label for="auto-part" class="form-label"><strong>Funcionário*</strong></label>
                    <select name="employeeId" class="form-select form-select-md mb-3" aria-label="select">                
                        <?php foreach($employeeList as $employee): ?>
                            <?php if($employee['position_name'] != 'root'): ?>  
                                <option value="<?= $employee['id']?>">
                                    <?= $employee['name'] ?> - CPF: <?= $employee['cpf'] ?>                                
                                </option>
                            <?php endif ?>    
                        <?php endforeach ?>    
                    </select>   
                </div> 
                
                <div class="form-group">
                    <label for="username" class="form-label">Username*</label>
                    <input class="form-control" type="text" name='username' id="username" required/>
                <div>
                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input  type='password' class="form-control" name="password" id="password" cols="30" rows="10">
                </div>                                   
                                
                <div class="form-footer">
                    <button class="btn btn-primary" type='submit'>Cadastrar</button>              
                        <a class="btn btn-secondary" href="<?= site_url('index.php/user') ?>"> Voltar </a>             
                </div>            
            </form> 
                        
        </div>
    </main>


