<main>
        <div class="container">
            
            <?php if(validation_errors() !== ''):             
                        echo renderMessage(array('type'=> 'error', 'content'=> validation_errors() ));
            endif;
                   
            ?> 
            <div class="title-box">
                <h1>Modificar Peça</h1>
            </div>              
            <?php echo form_open_multipart('index.php/inventory/edit/'.$part[0]['reference_number']); ?>
                    <div class="input-group mb-3">
                        <img src="<?= site_url('assets/images/'.$part[0]['image_address']) ?>" class="img-fluid" alt="">
                        <input type="hidden" name="imageInventoryPartOld" value="<?= $part[0]['image_address'] ?>">
                    </div>   
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="image-inventory-part">Upload Imagem</label>
                        <input type="file" class="form-control" id="image-inventory-part" name="imageInventoryPart">
                    </div>
                
                    <div class="form-group">
                        <label for="reference" class="form-label">Referência*</label>
                        <input class="form-control" type="text" name='reference' id="reference" value="<?= $part[0]['reference_number'] ?>" required/>
                    <div>
                    <div class="form-group">
                        <label class="form-label" for="name">Nome*</label>
                        <input class="form-control" type="text" name='name' id="name" value="<?= $part[0]['name'] ?>" required/> 
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="brand">Marca*</label>
                        <input class="form-control" type="text" name="brand" value="<?= $part[0]['brand'] ?>" required />
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="description">Descrição</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $part[0]['description'] ?></textarea>
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="unit-value" >Valor unitario*</label>
                        <input class="form-control" type="decimal" name='unitValue' id="unit-value" value="<?= $part[0]['unit_value'] ?>" required/>
                    <div>
                    <div class="form-group">
                        <label class="form-label" for="quantity">Quantidade*</label>
                        <input class="form-control" inputmode="numeric" pattern="\d*"  type="number" name='quantity' id="quantity" min="1" value="<?= $part[0]['quantity'] ?>" /> 
                    </div>

                    <button class="btn  btn-primary" type='submit'>Atualizar</button>              
            </form> 
            <a class="nav-link" href="<?= site_url() ?>">
                     <i class="bi bi-arrow-left  h2"></i>                     
            </a>             
        </div>
    </main>

